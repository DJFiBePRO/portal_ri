<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class axesController extends Controller
{
	public function showFaculty()
	{

		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$facultyTable = \App\faculty::where('faculty_state',1)->orderBy('faculty_update', 'desc')->get();
		}else{
			$facultyTable = \App\faculty::orderBy('faculty_update', 'desc')->get();
		}

		return view ('admin.faculty')
		->withManagement($managementArea)
		->withFaculty($facultyTable);

	}


	public function showConventions()
	{

		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$conventionsTable = \App\conventions::where('conventions_state',1)->orderBy('conventions_update', 'desc')->get();
		}else{
			$conventionsTable = \App\conventions::orderBy('conventions_update', 'desc')->get();
		}

		return view ('admin.conventions')
		->withManagement($managementArea)
		->withConventions($conventionsTable);

	}

	public function showFacultyNews()
	{

		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		if ($userId!=1){
			$facultyNewsTable = \App\facultyNews::select('faculty_news_id','faculty_news_description','faculty_news_faculty','faculty_news_state','faculty_news_name')
			->join('faculty','faculty.faculty_id','=','faculty_news.faculty_news_faculty')
			->where('faculty_state' ,'=' , 1)
			->where('faculty_news_state','=',1)
			->get();
		}else{
			$facultyNewsTable = \App\facultyNews::orderBy('faculty_news_update', 'desc')->get();
		}
		$facultyTable = \App\faculty::all();

		return view ('admin.facultyNews')
		->withManagement($managementArea)
		->withTypes($facultyTable)
		->withNews($facultyNewsTable);

	}


	public function showData($facultyId)
	{
		$managementArea = \App\managementArea::firstOrFail();
		$facultyNews =  \App\facultyNews::find($facultyId);
		return view ('admin.facultyNewsData')
		->withManagement($managementArea)
		->withFaculty($facultyNews);

	}

	public function storeFaculty(Request $request)
	{
		$this->validate($request,[

			'facultyName' => 'required|max:150|unique:faculty,faculty_name',
			'facultyImage' => 'required|mimes:jpeg,png|image',

			]);

		$docs = $request->facultyImage;
		\App\faculty::create([
			'faculty_name' => $request['facultyName'],
			'faculty_state'=>1,
			'faculty_image'=> $docs->getClientOriginalName(),
			'faculty_management_area' => 1,
			]);

		$path = 'img/faculty';
		$filename =$docs->getClientOriginalName();
		$docs->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function storeFacultyNews(Request $request)
	{
		$this->validate($request,[

			'facultyNewsName' => 'required|max:100|unique:faculty_news,faculty_news_name',
			'facultyNewsImage' => 'required|mimes:jpeg,png|image',
			'facultyNewsDescription' => 'required',
			'facultyNewsFaculty' => 'required',

			]);

		$docs = $request->facultyNewsImage;
		\App\facultyNews::create([
			'faculty_news_name' => $request['facultyNewsName'],
			'faculty_news_description' => $request['facultyNewsDescription'],
			'faculty_news_faculty' => $request['facultyNewsFaculty'],
			'faculty_news_state'=>1,
			'faculty_news_image'=> $docs->getClientOriginalName(),
			]);

		$path = 'img/facultyNews';
		$filename =$docs->getClientOriginalName();
		$docs->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

/* Agregar convencion con archivo
public function storeConventions(Request $request)
	{
		$this->validate($request,[

			'conventionsName' => 'required|max:500|unique:conventions,conventions_name',
			'conventionsFile' => 'required|mimes:pdf,docx|file',
			'conventionsType' => 'required',

			]);

		$docs = $request->conventionsFile;
		\App\conventions::create([
			'conventions_name' => $request['conventionsName'],
			'conventions_type' => $request['conventionsType'],
			'conventions_state'=>1,
			'conventions_file'=> $docs->getClientOriginalName(),
			'conventions_management_area' => 1,
			]);

		$path = 'docs/conventions';
		$filename =$docs->getClientOriginalName();
		$docs->move($path, $filename);
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}
*/
/* Agregar convencion sin archivo*/
	public function storeConventions(Request $request)
	{
		$this->validate($request,[

			'conventionsName' => 'required|max:1000|unique:conventions,conventions_name',
			// 'conventionsFile' => 'required|mimes:pdf,docx|file',
			'conventionsType' => 'required',

			]);

		$docs = $request->conventionsFile;
		if(!empty($docs)){
		\App\conventions::create([
			'conventions_name' => $request['conventionsName'],
			'conventions_type' => $request['conventionsType'],
			'conventions_state'=>1,
			'conventions_file'=> $docs->getClientOriginalName(),
			'conventions_management_area' => 1,
			]);

		$path = 'docs/conventions';
		$filename =$docs->getClientOriginalName();
		$docs->move($path, $filename);
	}else{
		\App\conventions::create([
			'conventions_name' => $request['conventionsName'],
			'conventions_type' => $request['conventionsType'],
			'conventions_state'=>1,
			'conventions_file'=> "",
			'conventions_management_area' => 1,
			]);
	}
		unset($request);
		return back()->withMensaje('Operación Exitosa');

	}

	public function deleteFaculty (Request $request){

		$faculty = \App\faculty::find($request['facultyId']);
		$faculty->faculty_state   = 0;
		$faculty->save();
		unset($request);
		unset($faculty);
		return back()->withMensaje('Operación Exitosa');
	}

	public function deleteFacultyNews (Request $request){

		$faculty = \App\facultyNews::find($request['facultyNewsId']);
		$faculty->faculty_news_state   = 0;
		$faculty->save();
		unset($request);
		unset($faculty);
		return back()->withMensaje('Operación Exitosa');
	}


	public function deleteConventions (Request $request){

		$conventions = \App\conventions::find($request['conventionsId']);
		$conventions->conventions_state   = 0;
		$conventions->save();
		unset($request);
		unset($conventions);
		return back()->withMensaje('Operación Exitosa');
	}

	public function updateFaculty (Request $request){

		$faculty= \App\faculty::find($request['facultyId']);

		$this->validate($request,[

			'facultyName' => 'required|max:100|unique:faculty,faculty_name,'.$faculty->faculty_id.',faculty_id',
			'facultyImage' => 'mimes:jpeg,png|image',
			]);

		$faculty->faculty_name   = $request['facultyName'];

		if($request->hasFile('facultyImage')){
			$imagen = $faculty->faculty_image;
			$faculty->faculty_image =$request->file('facultyImage')->getClientOriginalName();
			$path = 'img/faculty';
			$file = $request->file('facultyImage');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$imagen);
		}
		if (isset($request->facultyState)){
			$faculty->faculty_state   = $request['facultyState'];
		}
		$faculty->save();
		unset($request);
		unset($faculty);
		return back()->withMensaje('Operación Exitosa');

	}

	public function updateFacultyNews (Request $request){

		$faculty= \App\facultyNews::find($request['facultyNewsId']);

		$this->validate($request,[

			'facultyNewsName' => 'required|max:100|unique:faculty_news,faculty_news_name,'.$faculty->faculty_news_id.',faculty_news_id',
			'facultyNewsImage' => 'mimes:jpeg,png|image',
			'facultyNewsDescription' => 'required',
			'facultyNewsFaculty' => 'required',
			]);

		$faculty->faculty_news_name   = $request['facultyNewsName'];

		if($request->hasFile('facultyNewsImage')){
			$imagen = $faculty->faculty_news_image;
			$faculty->faculty_news_image =$request->file('facultyNewsImage')->getClientOriginalName();
			$path = 'img/facultyNews';
			$file = $request->file('facultyNewsImage');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$imagen);
		}
		if (isset($request->facultyNewsState)){
			$faculty->faculty_news_state   = $request['facultyNewsState'];
		}
		$faculty->faculty_news_description   = $request['facultyNewsDescription'];

		$faculty->save();
		unset($request);
		unset($faculty);
		return back()->withMensaje('Operación Exitosa');

	}

	public function updateConventions (Request $request){

		$conventions= \App\conventions::find($request['conventionsId']);

		$this->validate($request,[

			'conventionsName' => 'required|max:1000|unique:conventions,conventions_name,'.$conventions->conventions_id.',conventions_id',
			'conventionsFile' => 'mimes:pdf,docx|file',
			'conventionsType' => 'required',
			]);

		$conventions->conventions_name   = $request['conventionsName'];
		$conventions->conventions_type   = $request['conventionsType'];

		if($request->hasFile('conventionsFile')){
			$docs = $conventions->conventions_file;
			$conventions->conventions_file =$request->file('conventionsFile')->getClientOriginalName();
			$path = 'docs/conventions';
			$file = $request->file('conventionsFile');
			$filename = $file->getClientOriginalName();
			$file->move($path, $filename);
			\File::delete($path.'/'.$docs);
		}
		if (isset($request->convetionsState)){
			$conventions->conventions_state   = $request['conventionsState'];
		}
		$conventions->save();
		unset($request);
		unset($conventions);
		return back()->withMensaje('Operación Exitosa');

	}
}
