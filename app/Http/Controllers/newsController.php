<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use Auth;
use App\{news, newsTranslation, newsType, newsStatus};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class newsController extends Controller
{
	public function show()
	{
		$news=news::withTranslation()
		->translatedIn(app()->getLocale())
		 ->latest()
		 ->take(10)
		->get();
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		
		if ($userId!=1){
			$newsTable = news::
			where('news.news_status_id','1')
			->get();

		}else{
			$newsTable = news::All();
		}
		$newsTypeTable = \App\newsType::All();
		$multimediaTable = \App\multimediaType::All();

		return view ('admin.newsCreate')
		->withManagement($managementArea)
		->withNews($news)
		->withMultimedia($multimediaTable)
		->withTypes($newsTypeTable);
	}
	public function showNew()
	{
		$news=news::withTranslation()
		->translatedIn(app()->getLocale())
		 ->latest()
		 ->take(10)
		->get();
		$managementArea = \App\managementArea::firstOrFail();
		$userId = Auth::user()->user_id;
		
		if ($userId!=1){
			$newsTable = news::
			where('news.news_status_id','1')
			->get();

		}else{
			$newsTable = news::All();
		}
		$newsTypeTable = \App\newsType::All();
		$multimediaTable = \App\multimediaType::All();

		return view ('admin.news')
		->withManagement($managementArea)
		->withNews($news)
		->withMultimedia($multimediaTable)
		->withTypes($newsTypeTable);
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
		$datos = $request->validated();
		$news = new news();
		foreach (config('laravellocalization.supportedLocales') as $locale => $value) {
			$news->news_status_id = 1;
			$news->user_id = Auth::user()->user_id;
			$news->news_type_id = $request->newsType;
			$news->management_area_id = 1;
			$news->translateOrNew($locale)->news_translation_title = $datos[$locale]['newsTitle'];
			$news->translateOrNew($locale)->news_translation_content = $datos[$locale]['newsDescription'];
			$news->translateOrNew($locale)->news_translation_alias = $datos[$locale]['newsAlias'];
			$news->save();
		}
		return back()->withMensaje('Operación Exitosa');
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

			'newsTitle' => 'required|max:100|unique:news_translation,news_translation_title,' . $news->news_id . ',news_id',
			'newsAlias' => 'required|max:100|unique:news_translation,news_translation_alias,' . $news->news_id . ',news_id',
			'newsDescription' => 'required',
			'newsDate' => 'date|date_format:Y-m-d',	
		]);
		newsTranslation::where('news_id',$news->news_id)->where('locale',app()->getLocale())
						->update(['news_translation_title'=>$request['newsTitle'],
								'news_translation_content'=>$request['newsDescription'],
								'news_translation_alias'=>$request['newsAlias']]);
		$news->news_status_id   = $request['newsState'];

		$news->created_at = $request['newsDate'];
		$news->save();
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
