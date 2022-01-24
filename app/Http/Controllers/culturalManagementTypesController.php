<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class culturalManagementTypesController extends Controller
{
	public function show()
	{
		$management = \App\managementArea::firstOrFail();
		$culturalManagement = \App\culturalManagement::All();
		$multimediaTable = \App\multimediaType::All();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$culturalManagementTable = \App\culturalManagementTypes::select('cultural_management_types_id','cultural_management_types_name','cultural_management_types_state','cultural_management_types_description','cultural_management_types_area')
			->join('cultural_management','cultural_management.cultural_management_id','=','cultural_management_types.cultural_management_types_area')
			->where('cultural_management_state','=',1)
			->where('cultural_management_types_state','=',1)
			->get();
		}else{
			$culturalManagementTable = \App\culturalManagementTypes::orderBy('cultural_management_types_update', 'desc')->get();
		}

		return view ('admin.culturalManagementTypes')
		->withManagement($management)
		->withCultural($culturalManagement)
		->withMultimedia($multimediaTable)
		->withTypes($culturalManagementTable);


	}

	public function showData($culturalManagementTypesId)
	{
		$management = \App\managementArea::firstOrFail();
		$culturalManagementTypes =  \App\culturalManagementTypes::find($culturalManagementTypesId);
		$multimedia = \App\multimedia::where('multimedia_cultural_management_types',$culturalManagementTypesId)
		->orderBy('multimedia_type', 'asc')
		->orderBy('multimedia_create','desc')
		->get();
		
		return view ('admin.culturalManagementTypesData')
		->withManagement($management)
		->withMultimedia($multimedia)
		->withTypes($culturalManagementTypes);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'culturalManagementName' => 'required|max:100|unique:cultural_management_types,cultural_management_types_name',
			'culturalManagementType' => 'required',

			]);

		\App\culturalManagementTypes::create([
			'cultural_management_types_name' => $request['culturalManagementName'],
			'cultural_management_types_description' => $request['culturalManagementDescription'],
			'cultural_management_types_state'=>1,
			'cultural_management_types_management_area' => 1,
			'cultural_management_types_area' =>$request['culturalManagementType'],
			]);
		return back()->withMensaje('Operación Exitosa');
		
	}

	public function delete (Request $request){

		$culturalManagementId = $request->culturalManagementId;
		$culturalManagement = \App\culturalManagementTypes::find($culturalManagementId);
		$culturalManagement->cultural_management_types_state   = 0;
		$culturalManagement->save();
		unset($request);
		unset($culturalManagement);
		return back()->withMensaje('Operación Exitosa');
	}

	
	public function update (Request $request){

		$culturalManagement = \App\culturalManagementTypes::find($request['culturalManagementId']);

		$this->validate($request,[

			'culturalManagementType' => 'required',
			'culturalManagementTitle' => 'required|max:100|unique:cultural_management_types,cultural_management_types_name,'.$culturalManagement->cultural_management_types_id.',cultural_management_types_id',

			]);

		$culturalManagement->cultural_management_types_name  = $request['culturalManagementTitle'];
		$culturalManagement->cultural_management_types_description   = $request['culturalManagementDescription'];
		$culturalManagement->cultural_management_types_area =$request['culturalManagementType'];
		if (isset($request->culturalManagementState)){
			$culturalManagement->cultural_management_types_state   = $request['culturalManagementState'];
		}
		$culturalManagement->save();
		unset($request);
		unset($culturalManagement);	
		return back()->withMensaje('Operación Exitosa');

	}


	public function addResource(Request $request){

		$culturalManagementId = $request->culturalManagementCulturalId;

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
					'multimedia_cultural_management_types'=> $culturalManagementId,
					'multimedia_name'=> $fotografia->getClientOriginalName(),
					'multimedia_type'=> 1,
					]
					);

				$path = 'img/culturalManagementTypes';
				$filename = $fotografia->getClientOriginalName();
				$fotografia->move($path, $filename);
			}
		}

		if (isset($request->enlace)) {
			foreach ( $request->enlace as $enlace) {
				\App\multimedia::create(
					[
					'multimedia_cultural_management_types'=> $culturalManagementId,
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
					'multimedia_cultural_management_types'=> (int)$culturalManagementId,
					'multimedia_name'=> $file->getClientOriginalName(),
					'multimedia_type'=> 2,
					]
					);

				$path = 'docs/culturalManagementTypes';
				$filename = $file->getClientOriginalName();
				$file->move($path, $filename);
				
			}
		}
		unset($request);
		return redirect('admin/culturalManagementTypesData/'.$culturalManagementId);
	}


	public function deleteResource(Request $request){

		$multimediaData = \App\multimedia::find($request->multimediaId);
		if ($multimediaData->multimedia_type==1) {
			$path = 'img/culturalManagementTypes';
			\File::delete($path.'/'.$multimediaData->multimedia_name);
		}
		if ($multimediaData->multimedia_type==2) {
			$path = 'docs/culturalManagementTypes';
			\File::delete($path.'/'.$multimediaData->multimedia_name);
		}
		$multimediaData->delete();
		unset($multimediaData);
		unset($request);
		return back();
	}

}
