<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Auth;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class newsController extends Controller
{
	public function show()
	{
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		$userType = Auth::user()->user_type;
		if ($userId != 1) { //Logueado y si no es administrador
			if ($userType == 4) { //si es empresa
				$newsTable = news::where('news_user', $userId)->orderBy('updated_at', 'desc')->get();
			} else {
				$newsTable = news::orderBy('updated_at', 'desc')->get();
			}
		} else { //No logueado
			$newsTable = news::orderBy('updated_at', 'desc')->get();
		}
		if ($userType != 4) {
			$newsTypeTable = \App\newsType::All();
		} else {
			$newsTypeTable = \App\newsType::where('news_type_id', 3)->get();
		}
		$multimediaTable = \App\multimediaType::All();

		$languages = LaravelLocalization::getSupportedLocales();
		$iterador = 1;
		foreach ($languages as $key => $value) {
			$locales[] = [
				'locale_id' => $iterador++,
				'locale_name' => $key,
			];
		}

		$encabezados_locale = [
			"es" => "Español",
			"en" => "Inglés",
			"fr" => "Francés",
			"de" => "Alemán",
			"it" => "Italiano",
			"pt" => "Portugués",
			"ru" => "Ruso",
			"ar" => "Árabe",
			"zh" => "Chino",
			"ja" => "Japonés",
			"ko" => "Coreano",
			"pl" => "Polaco",
			"sv" => "Sueco",
			"tr" => "Turco",
			"el" => "Griego",
			"hi" => "Hindi",
			"fa" => "Farsi",
			"vi" => "Vietnamita",
			"th" => "Tailandés",
			"id" => "Indonesio",
			"ms" => "Malayo",
			"tl" => "Tagalo",
			"no" => "Noruego",
			"fi" => "Finlandés",
			"hu" => "Húngaro",
			"cs" => "Checo",
			"ro" => "Rumano",
			"sk" => "Eslovaco",
			"uk" => "Ucraniano",
			"sl" => "Esloveno",
			"hr" => "Croata",
			"ca" => "Catalán",
			"eu" => "Euskera",
			"da" => "Danés",
			"he" => "Hebreo",
			"ur" => "Urdu",
		];
		//$locales=(object)$locales;
		//return dd($languages);
		$gh=config('laravellocalization.supportedLocales') ;
		return view('admin.news')
			->withManagement($managementArea)
			->withNews($newsTable)
			->withMultimedia($multimediaTable)
			->withTypes($newsTypeTable)
			->withLocales($locales)
			->withEncabezados($encabezados_locale);
	}

	public function showData($newsId)
	{
		$managementArea = \App\managementArea::firstOrFail();
		$news =  \App\news::find($newsId);
		$multimedia = \App\multimedia::where('multimedia_news', $newsId)
			->orderBy('multimedia_type', 'asc')
			->orderBy('multimedia_create', 'desc')
			->get();

		return view('admin.newsData')
			->withManagement($managementArea)
			->withNews($news)
			->withMultimedia($multimedia);
	}

	public function store(NewsRequest $request)
	{

		// $datos=[]
		// news::create([
		// 	'news_status_id' => 1,
		// 	'user_id'=> Auth::user()->user_id,
		// 	'news_type_id' => $request->newsType,
		// 	'management_area_id' => 1,
		// 	// $request->validated(
				
		// 	)
		// ]);
		
		//$news->newsRealizationDate =  $request['newsRealizationDate'];

		// $news->save();

		// for ($i = 0; $i < count($locales); $i++) {
		// 	$this->validate($request, [

		// 		"newsTitle-$i+1" => 'required',
		// 		"newsAlias-$i+1"   => 'required',
		// 		"newsDescription-$i+1"  => 'required',
		// 	]);
			// $news->translateOrNew($locales[$i]['locale_name'])->news_translation_title = $request->newsTitle-"$i+1;"
			// $news->translateOrNew($locales[$i]['locale_name'])->news_translation_content = $request->newsDescription";
			// $news->translateOrNew($locales[$i]['locale_name'])->news_translation_alias = $request->newsAlias-"$i+1";
		//}
		//$news->save();

		

		


		// $news->translateOrNew('en')->news_translation_title = $request->newsTitle;
		// $news->translateOrNew('en')->news_translation_content = $request->newsDescription;
		// $news->translateOrNew('en')->news_translation_alias = $request->newsAlias;

		// $news->translateOrNew('es')->news_translation_title = $request->newsTitle;
		// $news->translateOrNew('es')->news_translation_content = $request->newsDescription;
		// $news->translateOrNew('es')->news_translation_alias = $request->newsAlias;


		// $news->save();

		// $news = new news();
		// /*Controlar segun tipo de usuario*/
		// $userId = Auth::user()->user_id;
		// $userType = Auth::user()->user_type;
		// if ($userType == 4) {
		// 	$news->news_user = $userId;
		// 	$news->news_state = 0;
		// } else {
		// 	$news->news_state = 1;
		// }
		// $news->news_title = $request['newsTitle'];
		// $news->news_content = $request['newsDescription'];

		// $news->news_author = Auth::user()->user_id;
		// $news->news_alias = $request['newsAlias'];
		// $news->news_type = $request['newsType'];
		// $news->news_management_area = 1;

		// $news->save();

		// unset($request);
		// unset($news);

		//return back()->withMensaje('Operación Exitosa');
		return dd($request);
	}

	public function delete(Request $request)
	{
		try {
			$news = news::find($request['newsId']);
			$news->news_state   = 0;
			$news->save();
			unset($request);
			unset($news);
			return back()->withMensaje('Operación Exitosa');
		} catch (\Exception $e) {
			return back()->withMensaje('Error en la operación');
		}
	}

	public function update(Request $request)
	{

		$news = news::find($request['newsId']);

		$this->validate($request, [

			'newsTitle' => 'required|max:100|unique:news,news_title,' . $news->news_id . ',news_id',
			'newsAlias' => 'required|max:100|unique:news,news_alias,' . $news->news_id . ',news_id',
			'newsDescription' => 'required',
			'newsDate' => 'date|date_format:Y-m-d',

		]);


		$news->news_title   = $request['newsTitle'];
		$news->news_content   = $request['newsDescription'];
		$news->news_alias   = $request['newsAlias'];
		if (isset($request->newsState)) {
			$news->news_state   = $request['newsState'];
		}
		$news->news_create = $request['newsDate'];

		$news->save();
		unset($request);
		unset($news);
		return back()->withMensaje('Operación Exitosa');
	}


	public function addResource(Request $request)
	{

		$newsId = $request->newsId;

		$this->validate($request, [

			'multimediaType' => 'required',
			'foto.*' => 'mimes:jpg,jpeg,png|image',
			'archivo.*' => 'mimes:pdf,docx|file',
			'enlace.*' => 'url',
		]);

		if (isset($request->foto)) {

			foreach ($request->foto as $fotografia) {

				\App\multimedia::create([
					'multimedia_news' => $newsId,
					'multimedia_name' => str_replace(" ", "_", strtolower($fotografia->getClientOriginalName())),
					'multimedia_type' => 1,
				]);

				$path = 'img/noticias';
				$filename = str_replace(" ", "_", strtolower($fotografia->getClientOriginalName()));
				$fotografia->move($path, $filename);
			}
		}

		if (isset($request->enlace)) {
			foreach ($request->enlace as $enlace) {
				\App\multimedia::create(
					[
						'multimedia_news' => $newsId,
						'multimedia_name' => $enlace,
						'multimedia_url' => $enlace,
						'multimedia_type' => 3,
					]
				);
			}
		}

		if (isset($request->archivo)) {
			foreach ($request->archivo as $file) {

				\App\multimedia::create(
					[
						'multimedia_news' => $newsId,
						'multimedia_name' => $file->getClientOriginalName(),
						'multimedia_type' => 2,
					]
				);

				$path = 'docs/noticias';
				$filename = $file->getClientOriginalName();
				$file->move($path, $filename);
			}
		}
		unset($request);
		return redirect('admin/newsData/' . $newsId);
	}

	public function deleteResource(Request $request)
	{

		$multimediaData = \App\multimedia::find($request->multimediaId);
		if ($multimediaData->multimedia_type == 1) {
			$path = 'img/noticias';
			\File::delete($path . '/' . $multimediaData->multimedia_name);
		}
		if ($multimediaData->multimedia_type == 2) {
			$path = 'docs/noticias';
			\File::delete($path . '/' . $multimediaData->multimedia_name);
		}
		$multimediaData->delete();
		unset($multimediaData);
		unset($request);
		return back();
	}
}
