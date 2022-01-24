<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userTypeController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$category = \App\userType::All();
		return view ('admin.userType')
		->withManagement($managementArea)
		->withCategory($category);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'userDescription' => 'required|max:100|unique:user_type,user_type_description',

			]);

		\App\userType::create([
			'user_type_description' => $request['userDescription'],
			]);
		unset($request);

		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){

		$category= \App\userType::find($request['categoryId']);

		$this->validate($request,[

			'userDescription' => 'required|max:100|unique:user_type,user_type_description,'.$category->user_type_id.',user_type_id',

			]);
		$category->user_type_description   = $request['userDescription'];
		$category->save();	
		unset($request);
		unset($category);

		return back()->withMensaje('Operación Exitosa');
	}
}
