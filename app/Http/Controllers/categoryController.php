<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		$categoryTable = \App\category::orderBy('category_update', 'desc')->get();
		$categoryParent = DB::table('category')->select('category.*', 'padre.category_description as parent')->join(DB::raw('(select * from category) padre'), function($join){
			$join->on('padre.category_id', '=', 'category.category_parent');
		})->orderBy('padre.category_update', 'DESC')->get();
		return view ('admin.category')
		->withManagement($managementArea)
		->withCategory($categoryTable)
		->withParent($categoryParent);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'categoryDescription' => 'required|max:100|unique:category,category_description',

			]);

		\App\category::create([
			'category_description' => $request['categoryDescription'],
			'category_parent' => $request['categoryParent'],
			'category_state'=>1,
			]);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function delete (Request $request){

		$category = \App\category::find($request['categoryId']);
		$category->category_state = 0;
		$category->save();
		unset($request);
		unset($category);
		return back()->withMensaje('Operación Exitosa');

	}

	public function update (Request $request){

		$category= \App\category::find($request['categoryId']);

		$this->validate($request,[

			'categoryDescription' => 'required|max:100|unique:category,category_description,'.$category->category_id.',category_id',

			]);

		$category->category_description   = $request['categoryDescription'];
		$category->category_parent   = $request['categoryParent'];
		$category->category_state   = $request['categoryState'];
		$category->save();	
		unset($request);
		unset($category);
		return back()->withMensaje('Operación Exitosa');
	}
}
