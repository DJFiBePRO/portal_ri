<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class multimediaTypeController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$category = \App\multimediaType::All();
		return view ('admin.multimediaType')
		->withManagement($managementArea)
		->withCategory($category);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'multimediaDescription' => 'required|max:100|unique:multimedia_type,multimedia_type_description',

			]);

		\App\multimediaType::create([
			'multimedia_type_description' => $request['multimediaDescription'],
			]);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function update (Request $request){

		$category= \App\multimediaType::find($request['categoryId']);

		$this->validate($request,[

			'multimediaDescription' => 'required|max:100|unique:multimedia_type,multimedia_type_description,'.$category->multimedia_type_id.',multimedia_type_id',

			]);
		$category->multimedia_type_description   = $request['multimediaDescription'];
		$category->save();	
		unset($request);
		unset($category);

		return back()->withMensaje('Operación Exitosa');


	}
}
