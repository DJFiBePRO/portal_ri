<?php

namespace App\Http\Controllers;

use Auth;
use App\authority;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class authorityController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$authorityTable = \App\authority::orderBy('authority_update','desc')->get();
		$authorityType =\App\authorityType::All();
		return view ('admin.authority')
		->withManagement($managementArea)
		->withTypes($authorityType)
		->withAuthority($authorityTable);
	}

	public function showInsert(){

		$managementArea = \App\managementArea::firstOrFail();
		$authorityTable = \App\authority::orderBy('authority_update','desc')->get();
		$authorityType =\App\authorityType::All();
		return view ('admin.authorityNew')
		->withManagement($managementArea)
		->withTypes($authorityType)
		->withAuthority($authorityTable);

	}
	public function store(Request $request){
		
		$this->validate($request,[
			'authorityName' => 'required|max:100',
			'authorityLastName' => 'required|max:100',
			'authorityType' => 'required',

			]);

		$authority = new authority();
		$authority->authority_name = $request->authorityName;
		$authority->authority_last_name = $request->authorityLastName;
		$authority->authority_management_area = 1;
		$authority->authority_type = $request->authorityType;

		$authority->save();

		unset($request);
		unset($authority);
		return redirect('admin/authority');

		
	}

	public function update (Request $request){

		$this->validate($request,[

			'authorityName' => 'required|max:100',
			'authorityLastName' => 'required|max:100',
			'authorityType' => 'required',
			'authorityPhoto' =>'mimes:jpeg,png|image',
			'authorityCv' => 'mimes:pdf,docx|file',

			]);


		$authority = authority::find($request->authorityId);
		$authority->authority_name = $request->authorityName; 
		$authority->authority_last_name = $request->authorityLastName; 
		$authority->authority_type = $request->authorityType; 

		if($request->hasFile('authorityPhoto')){
			$imagen = $authority->authority_photo;
			$authority->authority_photo =$request->file('authorityPhoto')->getClientOriginalName();
			$path = 'img/authority';
			$file = $request->file('authorityPhoto');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$imagen);
		}

		if($request->hasFile('authorityCv')){
			$docs = $authority->authority_cv;
			$authority->authority_cv =$request->file('authorityCv')->getClientOriginalName();
			$path = 'docs/authority';
			$file = $request->file('authorityCv');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$docs);
		}

		$authority->save();

		unset($request);
		unset($authority);
		return back()->withMensaje('Operación exitosa');

	}

}
