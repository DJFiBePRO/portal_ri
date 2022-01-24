<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class culturalManagementController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$culturalManagementTable = \App\culturalManagement::where('cultural_management_state',1)->orderBy('cultural_management_update', 'desc')->get();
		}else{
			$culturalManagementTable = \App\culturalManagement::orderBy('cultural_management_update', 'desc')->get();
		}

		return view ('admin.culturalManagement')
		->withManagement($managementArea)
		->withCultural($culturalManagementTable);

	}

	public function showData($culturalManagementId)
	{
		$managementArea = \App\managementArea::firstOrFail();
		$culturalManagement =  \App\culturalManagement::find($culturalManagementId);
		return view ('admin.culturalManagementData')
		->withManagement($managementArea)
		->withCultural($culturalManagement);

	}

	public function store(Request $request){

		$this->validate($request,[

			'culturalManagementName' => 'required|max:100|unique:cultural_management,cultural_management_name',
			'culturalManagementImage' => 'required|mimes:jpeg,png|image',

			]);
		$imagen = $request->culturalManagementImage;
		\App\culturalManagement::create([
			'cultural_management_name' => $request['culturalManagementName'],
			'cultural_management_description' => $request['culturalManagementDescription'],
			'cultural_management_state'=>1,
			'cultural_management_image'=> $imagen->getClientOriginalName(),
			'cultural_management_management_area' => 1,
			]);

		$path = 'img/culturalManagements';
		$filename =$imagen->getClientOriginalName();
		$imagen->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function delete (Request $request){
		
		$culturalManagementId = $request->culturalManagementId;
		$culturalManagement = \App\culturalManagement::find($culturalManagementId);
		$culturalManagement->cultural_management_state   = 0;
		$culturalManagement->save();
		unset($request);
		unset($culturalManagement);
		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){

		$culturalManagement= \App\culturalManagement::find($request['culturalManagementId']);

		$this->validate($request,[

			'culturalManagementTitle' => 'required|max:100|unique:cultural_management,cultural_management_name,'.$culturalManagement->cultural_management_id.',cultural_management_id',
			'culturalManagementImage' => 'max:100|mimes:jpeg,png|image',

			]);
		
		$culturalManagement= \App\culturalManagement::find($request['culturalManagementId']);
		$culturalManagement->cultural_management_name   = $request['culturalManagementTitle'];
		$culturalManagement->cultural_management_description   = $request['culturalManagementDescription'];
		if($request->hasFile('culturalManagementImage')){
			$imagen = $culturalManagement->cultural_management_image;
			$culturalManagement->cultural_management_image =$request->file('culturalManagementImage')->getClientOriginalName();
			$path = 'img/culturalManagements';
			$file = $request->file('culturalManagementImage');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$imagen);
		}
		if (isset($request->culturalManagementState)){
			$culturalManagement->cultural_management_state   = $request['culturalManagementState'];
		}
		$culturalManagement->save();
		unset($request);
		unset($culturalManagement);
		return back()->withMensaje('Operación Exitosa');	
	}


}
