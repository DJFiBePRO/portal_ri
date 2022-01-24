<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class downloadController extends Controller
{
	public function show()
	{
		
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$downloadTable = \App\download::where('download_state',1)->orderBy('download_update', 'desc')->get();
		}else{
			$downloadTable = \App\download::orderBy('download_update', 'desc')->get();
		}

		return view ('admin.download')
		->withManagement($managementArea)
		->withDownload($downloadTable);

	}

	public function showData($downloadId)
	{
		$managementArea = \App\managementArea::firstOrFail();
		$download =  \App\download::find($downloadId);
		return view ('admin.downloadData')
		->withManagement($managementArea)
		->withDownload($download);
		
	}

	public function store(Request $request)
	{
		$this->validate($request,[

			'downloadName' => 'required|max:100|unique:download,download_name',
			'downloadDescription' => 'required',
			'downloadFile' => 'required|mimes:pdf,docx|file',

			]);

		$docs = $request->downloadFile;
		\App\download::create([
			'download_name' => $request['downloadName'],
			'download_description' => $request['downloadDescription'],
			'download_state'=>1,
			'download_file'=> $docs->getClientOriginalName(),
			'download_management_area' => 1,
			]);

		$path = 'download';
		$filename =$docs->getClientOriginalName();
		$docs->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function delete (Request $request){

		$download = \App\download::find($request['downloadId']);
		$download->download_state   = 0;
		$download->save();
		unset($request);
		unset($download);
		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){		

		$download= \App\download::find($request['downloadId']);

		$this->validate($request,[

			'downloadName' => 'required|max:100|unique:download,download_name,'.$download->download_id.',download_id',
			'downloadDescription' => 'required',
			'downloadFile' => 'mimes:pdf,docx|file',

			]);

		$download->download_name   = $request['downloadName'];
		$download->download_description   = $request['downloadDescription'];
		if($request->hasFile('downloadFile')){
			$docs = $download->download_file;
			$download->download_file =$request->file('downloadFile')->getClientOriginalName();
			$path = 'download';
			$file = $request->file('downloadFile');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$docs);
		}
		if (isset($request->downloadState)){
			$download->download_state   = $request['downloadState'];
		}
		$download->save();
		unset($request);
		unset($download);
		return back()->withMensaje('Operación Exitosa');

	}
}