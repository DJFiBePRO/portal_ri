<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
	public function store(Request $request){
		try {

			\App\userType::create([
				'user_type_description'=>'Cimogsys',

				]);

			\App\user::create([
				'user_name'=> $request->userName,
				'user_last_name'=> $request->userLastName,
				'user_mail'=> $request->userMail,
				'password'=> bcrypt($request->userPassword),
				'user_type'=>1,
				]);

			\App\managementArea::create([

				'management_area_name' => 'Comisión de Vinculación',
				]);

			unset($request);
			return redirect('acceso');

		} catch (Exception $e) {
			return back();
		}
	}

	public function show(){

		$managementArea = \App\managementArea::firstOrFail();
		if (Auth::user()->user_type == 1){
			$user = \App\user::All();
		}else{
			$user = \App\user::where('user_id' ,'=',(Auth::user()->user_id))->get();
		}
		$types = \App\userType::All();
		return view ('admin.user')
		->withManagement($managementArea)
		->withTypes($types)
		->withUser($user);

	}

	public function create(Request $request){

		$this->validate($request,[

			'userName' => 'required|max:100',
			'userLastName' => 'required|max:100',
			'userMail' => 'required|email|unique:user,user_mail|max:100',
			'userPassword' => 'required|min:8',
			'userType' => 'required',
			'userPhone' => 'required|max:100',

			]);

			\App\user::create([
				'user_name'=> $request->userName,
				'user_last_name'=> $request->userLastName,
				'user_mail'=> $request->userMail,
				'password'=> bcrypt($request->userPassword),
				'user_phone' => $request->userPhone,
				'user_type' => $request->userType,
				]);
			unset($request);
			return redirect('admin/user');

	}

	public function update (Request $request){

		$user = \App\user::find($request->userId);

		$this->validate($request,[

			'userName' => 'required|max:100',
			'userLastName' => 'required|max:100',
			'userType' => 'required',
			'userMail' => 'required|max:100|email|unique:user,user_mail,'.$user->user_id.',user_id',
			'userPhone' => 'max:100',
			'userPhoto' => 'mimes:jpeg,png|image',

			]);

		$user->user_name = $request->userName;
		$user->user_last_name = $request->userLastName;
		$user->user_phone = $request->userPhone;
		$user->user_type = $request->userType;
		$user->user_mail = $request->userMail;
		if($request->hasfile('userPhoto')){
			$photo = $user->user_photo;
			$user->user_photo = $request->file('userPhoto')->getClientOriginalName();

			$path = 'img/user';
			$file = $request->file('userPhoto');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$photo);
		}
		if (isset($request->userNewPassword)){
			$user->password = bcrypt($request->userNewPassword);
		}

		$user->save();
		unset($request);
		unset($user);
		return back()->withMensaje('Operación exitosa');

	}

	public function showInsertForm (){

		$managementArea = \App\managementArea::firstOrFail();
		$types = \App\userType::All();
		return view ('admin.userNew')
		->withManagement($managementArea)
		->withTypes($types);

	}

	public function updatePassword(Request $request){

		$this->validate($request,[

			'userNewPassword' => 'min:8',

			]);
		$user = \App\user::find($request->userId);

		if (Hash::check($request->userPassword , $user->password)){			
			$user->password = bcrypt($request->userNewPassword);
			$user->save();
			unset($request);
			unset($user);
			return redirect ('admin/logout');

		}else{
			unset($user);
			return back()->withMensaje('Contraseña Incorrecta');
		}

	}	
}

