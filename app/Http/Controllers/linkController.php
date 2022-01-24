<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class linkController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$linkTable = \App\link::orderBy('link_update', 'desc')->get();
		$category = \App\category::where('category_parent','!=',null)->get();
		return view ('admin.link')
		->withManagement($managementArea)
		->withlink($linkTable)
		->withCategory($category);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'linkName' => 'required|max:100|unique:link,link_name',
			'linkCategory' => 'required',
			'linkUrl' => 'required|unique:link,link_url|url',

			]);

		\App\link::create([
			'link_name' => $request['linkName'],
			'link_description' => $request['linkDescription'],
			'link_category' => $request['linkCategory'],
			'link_url' => $request['linkUrl'],
			'link_state'=>1,
			'link_management_area' => 1,
			]);
		unset($request);	
		return back()->withMensaje('Operación Exitosa');
	}

	public function delete (Request $request){

		$link = \App\link::find($request['linkId']);
		$link->link_state = 0;
		$link->save();
		unset($request);
		unset($link);
		return back()->withMensaje('Operación Exitosa');
	}

	public function update (Request $request){

		$link= \App\link::find($request['linkId']);

		$this->validate($request,[
			'linkName' => 'required|max:100|unique:link,link_name,'.$link->link_id.',link_id',
			'linkCategory' => 'required',
			'linkUrl' => 'required|url|unique:link,link_url,'.$link->link_id.',link_id',

			]);

		$link->link_name   = $request['linkName'];
		$link->link_description   = $request['linkDescription'];
		$link->link_url   = $request['linkUrl'];
		$link->link_category   = $request['linkCategory'];
		$link->link_state   = $request['linkState'];
		$link->save();	
		unset($request);
		unset($link);
		return back()->withMensaje('Operación Exitosa');

	}
}
