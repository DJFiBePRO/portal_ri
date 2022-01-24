<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class galleryController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$galleryTable = \App\gallery::where('gallery_state',1)->orderBy('gallery_update', 'desc')->get();
		}else{
			$galleryTable = \App\gallery::orderBy('gallery_update', 'desc')->get();
		}		
		$multimediaTable = \App\multimediaType::All();

		return view ('admin.gallery')
		->withManagement($managementArea)
		->withGallery($galleryTable)
		->withMultimedia($multimediaTable);
	}

	public function showData($galleryId)
	{
		$gallery =  \App\gallery::find($galleryId);
		$managementArea = \App\managementArea::firstOrFail();
		$multimedia = \App\multimedia::where('multimedia_gallery',$galleryId)
		->orderBy('multimedia_type', 'asc')
		->orderBy('multimedia_create','desc')
		->get();

		return view ('admin.galleryData')
		->withManagement($managementArea)
		->withGallery($gallery)
		->withMultimedia($multimedia);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'galleryName' => 'required|max:100|unique:gallery,gallery_name',
			
			]);

		\App\gallery::create([
			'gallery_name' => $request['galleryName'],
			'gallery_description' => $request['galleryDescription'],
			'gallery_state'=>1,
			'gallery_management_area' => 1,
			]);
		unset($request);
		return back()->withMensaje('Operación Exitosa');
		
	}

	public function delete (Request $request){
		
		$gallery = \App\gallery::find($request['galleryId']);
		$gallery->gallery_state   = 0;
		$gallery->save();
		unset($request);
		unset($gallery);
		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){
		
		$gallery = \App\gallery::find($request['galleryId']);

		$this->validate($request,[

			'galleryName' => 'required|max:100|unique:gallery,gallery_name,'.$gallery->gallery_id.',gallery_id',
			]);
		
		$gallery->gallery_name   = $request['galleryName'];
		$gallery->gallery_description   = $request['galleryDescription'];
		if (isset($request->galleryState)){
			$gallery->gallery_state   = $request['galleryState'];
		}
		$gallery->save();
		unset($request);
		unset($gallery);
		return back()->withMensaje('Operación Exitosa');
	}


	public function addResource(Request $request){
		
		$galleryId = $request->galleryId;

		$this->validate($request,[

			'multimediaType' => 'required',
			'foto.*'=>'mimes:jpeg,png|image',
			'archivo.*'=>'mimes:pdf,docx|file',
			'enlace.*'=>'url',
			]);
		if (isset($request->foto)) {
			foreach ( $request->foto as $fotografia) {

				\App\multimedia::create(
					[
					'multimedia_gallery'=> $galleryId,
					'multimedia_name'=> $fotografia->getClientOriginalName(),
					'multimedia_type'=> 1,
					]
					);

				$path = 'img/galerias';
				$filename = $fotografia->getClientOriginalName();
				$fotografia->move($path, $filename);
			}
		};

		if (isset($request->enlace)) {
			foreach ( $request->enlace as $enlace) {
				\App\multimedia::create(
					[
					'multimedia_gallery'=> $galleryId,
					'multimedia_name'=> $enlace,
					'multimedia_url' => $enlace,
					'multimedia_type'=> 3,
					]
					);
			}
		}

		if (isset($request->archivo)) {
			foreach ( $request->archivo as $file) {

				\App\multimedia::create(
					[
					'multimedia_gallery'=> $galleryId,
					'multimedia_name'=> $file->getClientOriginalName(),
					'multimedia_type'=> 2,
					]
					);

				$path = 'docs/galerias';
				$filename = $file->getClientOriginalName();
				$file->move($path, $filename);
			}
		}        
		unset($request);
		return redirect('admin/galleryData/'.$galleryId);
		
	}


	public function deleteResource(Request $request){

		$multimediaData = \App\multimedia::find($request->multimediaId);
		if ($multimediaData->multimedia_type==1) {
			$path = 'img/galerias';
			\File::delete($path.'/'.$multimediaData->multimedia_name);
		}
		if ($multimediaData->multimedia_type==2) {
			$path = 'docs/galerias';
			\File::delete($path.'/'.$multimediaData->multimedia_name);
		}
		$multimediaData->delete();
		unset($multimediaData);
		unset($request);
		return back();

	}
}
