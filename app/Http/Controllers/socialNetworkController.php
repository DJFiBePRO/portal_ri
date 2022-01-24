<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class socialNetworkController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$socialNetworkTable = \App\socialNetworks::where('social_network_state',1)->orderBy('social_network_update', 'desc')->get();
		}else{
			$socialNetworkTable = \App\socialNetworks::orderBy('social_network_update', 'desc')->get();
		}

		return view ('admin.socialNetwork')
		->withManagement($managementArea)
		->withSocial($socialNetworkTable);

	}

	public function showData($socialNetworkId)
	{

		$managementArea = \App\managementArea::firstOrFail();
		$socialNetwork =  \App\socialNetworks::find($socialNetworkId);

		return view ('admin.socialNetworkData')
		->withManagement($managementArea)
		->withSocial($socialNetwork);
	}

	public function store(Request $request)
	{

		$this->validate($request,[

			'socialNetworkName' => 'required|max:100|unique:social_network,social_network_name',
			'socialNetworkUrl' => 'required|url',
			'socialNetworkImage' => 'required|mimes:svg,jpg,jpeg,png|max:10000',

			]);

		$image = $request->socialNetworkImage;
		\App\socialNetworks::create([
			'social_network_name' => $request['socialNetworkName'],
			'social_network_url' => $request['socialNetworkUrl'],
			'social_network_state'=>1,
			'social_network_image'=> $image->getClientOriginalName(),
			'social_network_management_area' => 1,
			]);

		$path = 'socialNetwork';
		$filename =$image->getClientOriginalName();
		$image->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');
	}

	public function delete (Request $request){

		$socialNetwork = \App\socialNetworks::find($request['socialNetworkId']);
		$socialNetwork->social_network_state   = 0;
		$socialNetwork->save();

		unset($request);
		unset($download);
		return back()->withMensaje('Operación Exitosa');

	}

	public function update (Request $request){

		$socialNetwork= \App\socialNetworks::find($request['socialNetworkId']);


		$this->validate($request,[

			'socialNetworkName' => 'required|max:100|unique:social_network,social_network_name,'.$socialNetwork->social_network_id.',social_network_id',
			'socialNetworkUrl' => 'required|url',
			'socialNetworkImage' => 'mimes:jpeg,png,svg|image|max:100',

			]);

		$socialNetwork->social_network_name   = $request['socialNetworkTitles'];
		$socialNetwork->social_network_url   = $request['socialNetworkUrl'];
		if($request->hasFile('socialNetworkImage')){
			$imagen = $socialNetwork->social_network_image;
			$socialNetwork->social_network_image = $request->file('socialNetworkImage')->getClientOriginalName();
			$path = 'socialNetwork';
			$file = $request->file('socialNetworkImage');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$imagen);
		}
		if (isset($request->socialNetworkState)){
			$socialNetwork->social_network_state   = $request['socialNetworkState'];
		}
		$socialNetwork->save();
		unset($request);
		unset($socialNetwork);
		return back()->withMensaje('Operación Exitosa');
	}
}
