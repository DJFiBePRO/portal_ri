<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authorityTypeController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$category = \App\authorityType::All();
		return view ('admin.authorityType')
		->withManagement($managementArea)
		->withCategory($category);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'authorityDescription' => 'required|max:100|unique:authority_type,authority_type_description',	

			]);

		\App\authorityType::create([
			'authority_type_description' => $request['authorityDescription'],
			]);
		unset($request);

		return back()->withMensaje('Operación Exitosa');

	}

	public function update (Request $request){

		$category= \App\authorityType::find($request['categoryId']);

		$this->validate($request,[

			'authorityDescription' => 'required|max:100|unique:authority_type,authority_type_description,'.$category->authority_type_id.',authority_type_id',	

			]);

		$category->authority_type_description   = $request['authorityDescription'];
		$category->save();	
		unset($request);
		unset($category);

		return back()->withMensaje('Operación Exitosa');

	}

}
