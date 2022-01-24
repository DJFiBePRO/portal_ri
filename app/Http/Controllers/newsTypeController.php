<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newsTypeController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$category = \App\newsType::All();
		return view ('admin.newsType')
		->withManagement($managementArea)
		->withCategory($category);
	}

	public function store(Request $request)
	{
		$this->validate($request,[

			'newsDescription' => 'required|max:100|unique:news_type,news_type_description',

			]);

		\App\newsType::create([
			'news_type_description' => $request['newsDescription'],
			]);
		unset($request);

		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){

		$category= \App\newsType::find($request['categoryId']);

		$this->validate($request,[

			'newsDescription' => 'required|max:100|unique:news_type,news_type_description,'.$category->news_type_id.',news_type_id',

			]);
		$category->news_type_description   = $request['newsDescription'];
		$category->save();	
		unset($request);
		unset($category);

		return back()->withMensaje('Operación Exitosa');

	}
}
