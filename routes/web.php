<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
	],
	function () {
		Route::get('/convenio', 'CovenantController@vista');
		//  Route::get('/covenant/create', 'CovenantController@create')->name('covenant.create');
		//  Route::post('/covenant/store', 'CovenantController@store')->name('covenant.store');
		//Route::post('/covenant/delete/{id}', 'CovenantController@destroy')->name('covenant.destroy');
		// Route::get('/covenant/edit/{id}', 'CovenantController@edit')->name('covenant.edit');
		//Route::get('covenant', ['as'=>'covenant','uses'=>'CovenantController@show']);
		// Route::resource('covenant', 'CovenantController', ['only' => [
		//     'index', 'show'
		// ]]);

		//guest routes
		//creacion grupo de rutas, con middleware por peticion, para instalación,
		Route::group(['middleware' => ['guest', 'install']], function () {

			Route::get('acceso', ['as' => 'login', 'uses' => 'Auth\loginController@showLoginForm']);
			Route::post('acceso', ['as' => 'login', 'uses' => 'Auth\loginController@login']);
		});

		Route::group(['middleware' => 'register'], function () {

			Route::get('register', ['as' => 'register', 'uses' => 'Auth\loginController@showRegisterForm']);
			Route::post('register', ['as' => 'register', 'uses' => 'userController@store']);
		});
		//end guest routes

		//routes for all users

		Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

			Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\loginController@logout']);


			//news routes
			Route::get('news', ['as' => 'news', 'uses' => 'newsController@show']);
			Route::get('newsData/{news}', ['as' => 'newsData', 'uses' => 'newsController@showData']);
			Route::Post('news', ['as' => 'news', 'uses' => 'newsController@store']);
			Route::post('deleteNews', ['as' => 'deleteNews', 'uses' => 'newsController@delete']);
			Route::post('updateNews', ['as' => 'updateNews', 'uses' => 'newsController@update']);
			Route::post('addResourcesNews', ['as' => 'addResourcesNews', 'uses' => 'newsController@addResource']);
			Route::post('deleteResourcesNews', ['as' => 'deleteResourcesNews', 'uses' => 'newsController@deleteResource']);
			Route::resource('covenant', 'CovenantController');
			Route::get('countrys/bycontinent', 'CountryController@getCountrys')->name('admin.countrys.bycontinent');
			//end news routes

			//gallery routes
			Route::get('gallery', ['as' => 'gallery', 'uses' => 'galleryController@show']);
			Route::get('galleryData/{gallery}', ['as' => 'galleryData', 'uses' => 'galleryController@showData']);
			Route::Post('gallery', ['as' => 'gallery', 'uses' => 'galleryController@store']);
			Route::post('deleteGallery', ['as' => 'deleteGallery', 'uses' => 'galleryController@delete']);
			Route::post('updateGallery', ['as' => 'updateGallery', 'uses' => 'galleryController@update']);
			Route::post('addResourcesGallery', ['as' => 'addResourcesGallery', 'uses' => 'galleryController@addResource']);
			Route::post('deleteResourcesGallery', ['as' => 'deleteResourcesGallery', 'uses' => 'galleryController@deleteResource']);
			//end gallery routes

			//authority routes
			Route::get('user', ['as' => 'user', 'uses' => 'userController@show']);
			Route::get('newUser', ['as' => 'newUser', 'uses' => 'userController@showInsertForm']);
			Route::post('insertUser', ['as' => 'insertUser', 'uses' => 'userController@create']);
			Route::post('updateUser', ['as' => 'updateUser', 'uses' => 'userController@update']);
			Route::post('updatePassword', ['as' => 'updatePassword', 'uses' => 'userController@updatePassword']);
			//end authority routes

		});
		// end routes for all users

		//routes for user cimogsys and vinculacion

		Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'vin']], function () {

			//category routes
			Route::get('category', ['as' => 'category', 'uses' => 'categoryController@show']);
			Route::Post('category', ['as' => 'category', 'uses' => 'categoryController@store']);
			Route::post('deleteCategory', ['as' => 'deleteCategory', 'uses' => 'categoryController@delete']);
			Route::post('updateCategory', ['as' => 'updateCategory', 'uses' => 'categoryController@update']);
			//end category routes

			//category routes
			Route::get('link', ['as' => 'link', 'uses' => 'linkController@show']);
			Route::Post('link', ['as' => 'link', 'uses' => 'linkController@store']);
			Route::post('deleteLink', ['as' => 'deleteLink', 'uses' => 'linkController@delete']);
			Route::post('updateLink', ['as' => 'updateLink', 'uses' => 'linkController@update']);
			//end category routes

			//faculty routes
			Route::get('faculty', ['as' => 'axes', 'uses' => 'axesController@showFaculty']);
			Route::Post('faculty', ['as' => 'faculty', 'uses' => 'axesController@storeFaculty']);
			Route::post('deleteFaculty', ['as' => 'deleteFaculty', 'uses' => 'axesController@deleteFaculty']);
			Route::post('updateFaculty', ['as' => 'updateFaculty', 'uses' => 'axesController@updateFaculty']);

			//end faculty routes

			//conventions routes
			Route::get('conventions', ['as' => 'conventions', 'uses' => 'axesController@showConventions']);
			Route::Post('conventions', ['as' => 'conventions', 'uses' => 'axesController@storeConventions']);
			Route::post('deleteConventions', ['as' => 'deleteConventions', 'uses' => 'axesController@deleteConventions']);
			Route::post('updateConventions', ['as' => 'updateConventions', 'uses' => 'axesController@updateConventions']);

			//end conventions routes

			//facultyNews routes
			Route::get('facultyNews', ['as' => 'facultyNews', 'uses' => 'axesController@showFacultyNews']);
			Route::Post('facultyNews', ['as' => 'facultyNews', 'uses' => 'axesController@storeFacultyNews']);
			Route::post('deleteFacultyNews', ['as' => 'deleteFacultyNews', 'uses' => 'axesController@deleteFacultyNews']);
			Route::post('updateFacultyNews', ['as' => 'updateFacultyNews', 'uses' => 'axesController@updateFacultyNews']);
			Route::get('facultyData/{faculty}', ['as' => 'facultyData', 'uses' => 'axesController@showData']);


			//end facultyNews routes

			// culturalManagement routes
			Route::get('culturalManagement', ['as' => 'culturalManagement', 'uses' => 'culturalManagementController@show']);
			Route::get('culturalManagementData/{culturalManagement}', ['as' => 'culturalManagementData', 'uses' => 'culturalManagementController@showData']);
			Route::Post('culturalManagement', ['as' => 'culturalManagement', 'uses' => 'culturalManagementController@store']);
			Route::post('deleteCulturalManagement', ['as' => 'deleteCulturalManagement', 'uses' => 'culturalManagementController@delete']);
			Route::post('updateCulturalManagement', ['as' => 'updateCulturalManagement', 'uses' => 'culturalManagementController@update']);
			//end culturalManagement routes

			// culturalManagementTypes routes
			Route::get('culturalManagementTypes', ['as' => 'culturalManagementTypes', 'uses' => 'culturalManagementTypesController@show']);
			Route::get('culturalManagementTypesData/{culturalManagement}', ['as' => 'culturalManagementTypesData', 'uses' => 'culturalManagementTypesController@showData']);
			Route::Post('culturalManagementTypes', ['as' => 'culturalManagementTypes', 'uses' => 'culturalManagementTypesController@store']);
			Route::post('deleteCulturalManagementTypes', ['as' => 'deleteCulturalManagementTypes', 'uses' => 'culturalManagementTypesController@delete']);
			Route::post('updateCulturalManagementTypes', ['as' => 'updateCulturalManagementTypes', 'uses' => 'culturalManagementTypesController@update']);
			Route::post('addResourcesCulturalManagementTypes', ['as' => 'addResourcesCulturalManagementTypes', 'uses' => 'culturalManagementTypesController@addResource']);
			Route::post('deleteResourcesCulturalManagementTypes', ['as' => 'deleteResourcesCulturalManagementTypes', 'uses' => 'culturalManagementTypesController@deleteResource']);
			//end culturalManagement routes

			//download routes
			Route::get('download', ['as' => 'download', 'uses' => 'downloadController@show']);
			Route::get('downloadData/{download}', ['as' => 'downloadData', 'uses' => 'downloadController@showData']);
			Route::Post('download', ['as' => 'download', 'uses' => 'downloadController@store']);
			Route::post('deleteDownload', ['as' => 'deleteDownload', 'uses' => 'downloadController@delete']);
			Route::post('updateDownload', ['as' => 'updateDownload', 'uses' => 'downloadController@update']);
			Route::post('addResourceDownload', ['as' => 'addResourceDownload', 'uses' => 'downloadController@addResource']);
			Route::post('deleteResourcesDownload', ['as' => 'deleteResourcesDownload', 'uses' => 'downloadController@deleteResource']);
			//end download routes

			//socialNetworks routes
			Route::get('socialNetwork', ['as' => 'socialNetwork', 'uses' => 'socialNetworkController@show']);
			Route::get('socialNetworkData/{socialNetwork}', ['as' => 'socialNetworkData', 'uses' => 'socialNetworkController@showData']);
			Route::Post('socialNetwork', ['as' => 'socialNetwork', 'uses' => 'socialNetworkController@store']);
			Route::post('deleteSocialNetwork', ['as' => 'deleteSocialNetwork', 'uses' => 'socialNetworkController@delete']);
			Route::post('updateSocialNetwork', ['as' => 'updateSocialNetwork', 'uses' => 'socialNetworkController@update']);

			//magazine routes
			Route::get('magazines', ['as' => 'magazines', 'uses' => 'magazineController@show']);
			Route::get('magazineData/{magazine}', ['as' => 'magazineData', 'uses' => 'magazineController@showData']);
			Route::Post('magazine', ['as' => 'magazine', 'uses' => 'magazineController@store']);
			Route::post('deleteMagazine', ['as' => 'deleteMagazine', 'uses' => 'magazineController@delete']);
			Route::post('updateMagazine', ['as' => 'updateMagazine', 'uses' => 'magazineController@update']);
			//end magazine routes

			//authority routes
			Route::get('authority', ['as' => 'authority', 'uses' => 'authorityController@show']);
			Route::get('newAuthority', ['as' => 'newAuthority', 'uses' => 'authorityController@showInsert']);
			Route::post('insertAuthority', ['as' => 'insertAuthority', 'uses' => 'authorityController@store']);
			Route::post('updateAuthority', ['as' => 'updateAuthority', 'uses' => 'authorityController@update']);
			//end authority routes

			//managementArea routes
			Route::get('mission', ['as' => 'mission', 'uses' => 'adminController@showMission']);
			Route::post('mission', ['as' => 'mission', 'uses' => 'adminController@updateMission']);
			Route::get('objective', ['as' => 'objective', 'uses' => 'adminController@showObjective']);
			Route::post('objective', ['as' => 'objective', 'uses' => 'adminController@updateObjective']);
			Route::get('direction', ['as' => 'direction', 'uses' => 'adminController@showDirection']);
			Route::post('direction', ['as' => 'direction', 'uses' => 'adminController@updateDirection']);
			Route::get('functions', ['as' => 'functions', 'uses' => 'adminController@showFunctions']);
			Route::post('functions', ['as' => 'functions', 'uses' => 'adminController@updateFunctions']);
			//end managementArea routes



		});
		//end routes for user cimogsys and vinculacion

		//routes for user cimogsys

		Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'root']], function () {

			//home routes
			Route::get('inicio', ['as' => 'inicio', 'uses' => 'adminController@show']);
			Route::post('inicio', ['as' => 'inicio', 'uses' => 'adminController@update']);
			Route::get('parameterization', ['as' => 'parameterization', 'uses' => 'adminController@showParameterization']);
			//end home routes


			//parameterization routes
			Route::get('userType', ['as' => 'userType', 'uses' => 'userTypeController@show']);
			Route::post('userType', ['as' => 'userType', 'uses' => 'userTypeController@store']);
			Route::post('updateUserType', ['as' => 'updateUserType', 'uses' => 'userTypeController@update']);

			Route::get('authorityType', ['as' => 'authorityType', 'uses' => 'authorityTypeController@show']);
			Route::post('authorityType', ['as' => 'authorityType', 'uses' => 'authorityTypeController@store']);
			Route::post('updateAuthorityType', ['as' => 'updateAuthorityType', 'uses' => 'authorityTypeController@update']);


			Route::get('multimediaType', ['as' => 'multimediaType', 'uses' => 'multimediaTypeController@show']);
			Route::post('multimediaType', ['as' => 'multimediaType', 'uses' => 'multimediaTypeController@store']);
			Route::post('updateMultimediaType', ['as' => 'updateMultimediaType', 'uses' => 'multimediaTypeController@update']);


			Route::get('newsType', ['as' => 'newsType', 'uses' => 'newsTypeController@show']);
			Route::post('newsType', ['as' => 'newsType', 'uses' => 'newsTypeController@store']);
			Route::post('updateNewsType', ['as' => 'updateNewsType', 'uses' => 'newsTypeController@update']);
			//end parameterization routes

		});
		//end routes for user cimogsys



		Route::get('/', function () {
			//cambie a que se muestren noticias, no eventos
			$managementArea = DB::table('management_area')
				->first();

			$news = DB::table('news')
				->join('multimedia', 'news.news_id', '=', 'multimedia.multimedia_news')
				->join('news_translation', 'news.news_id', '=', 'news_translation.news_id')
				->select('news.news_id', 'news.news_status_id', 'news_translation.news_translation_title', 'news_translation.news_translation_content', 'multimedia.multimedia_name', 'news_translation.news_translation_alias')
				->where('news.news_status_id', 1)
				->where('news.news_type_id', 2)
				//esta linea agrupa
				->groupBy('multimedia.multimedia_news')
				->orderBy('news.news_id', 'desc')
				->paginate(5);


			$authoritys = DB::table('authority')
				->leftJoin('authority_type', 'authority.authority_type', '=', 'authority_type.authority_type_id')
				->select('authority.authority_id', 'authority.authority_name', 'authority.authority_last_name', 'authority.authority_cv', 'authority.authority_photo', 'authority_type.authority_type_description')
				->orderBy('authority.authority_id', 'asc')
				->get();

			$downloads = App\download::where('download_state', 1)
				->get();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();

			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			$covenants = DB::table('covenants')->get();

			return view('inicio')
				->withManagement($managementArea)
				->withAuthoritys($authoritys)
				->withDownloads($downloads)
				->withSocial($social)
				->withCategory($category)
				->withCovenant($covenants)
				->withNews($news);
		});

		Route::get('/mision', function () {

			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			return view('mision')
				->withSocial($social)
				->withCategory($category)
				->withManagement($managementArea);
		});

		Route::get('/facultad', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();

			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			$faculty = DB::table('faculty')
				->where('faculty_state', 1)
				->get();

			return view('facultades')
				->withSocial($social)
				->withFaculty($faculty)
				->withCategory($category)
				->withManagement($managementArea);
		});

		Route::get('/facultad/{id}', function ($id) {


			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();

			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			$facultyNews = App\facultyNews::where('faculty_news_faculty', $id)
				->where('faculty_news_state', 1)
				->paginate(5);

			$faculty = DB::table('faculty')
				->where('faculty_id', $id)
				->get();

			return view('facultadProyectos')
				->withSocial($social)
				->withNews($facultyNews)
				->withFaculty($faculty)
				->withCategory($category)
				->withManagement($managementArea);
		});

		Route::get('/facultad/proyecto/{id}', function ($id) {

			if (isset($id)) {
				$managementArea = DB::table('management_area')
					->first();

				$social = DB::table('social_network')
					->where('social_network_state', 1)
					->get();

				$category = DB::table('link')
					->leftJoin('category', 'category_id', '=', 'link.link_category')
					->where('link_state', 1)
					->orderBy('link.link_id', 'asc')
					->get();

				$facultyNews = App\facultyNews::where('faculty_news_id', $id)
					->where('faculty_news_state', 1)
					->first();

				return view('facultadProyecto')
					->withSocial($social)
					->withNews($facultyNews)
					->withCategory($category)
					->withManagement($managementArea);
			} else {
				abort(404);
			}
		});

		Route::get('/informes/anuales', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			$conventions = App\conventions::where('conventions_state', 1)
				->where('conventions_type', '=', 'Informe Anual')
				->get();


			return view('informesAnuales')
				->withSocial($social)
				->withCategory($category)
				->withConventios($conventions)
				->withManagement($managementArea);
		});

		Route::get('/informes/convenios', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();

			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			$conventions = App\conventions::where('conventions_state', 1)
				->where('conventions_type', '=', 'Convenio')
				->paginate(8);


			return view('informesConvenios')
				->withSocial($social)
				->withCategory($category)
				->withConventios($conventions)
				->withManagement($managementArea);
		});

		Route::get('/reglamentos-formatos', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();

			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			$conventions = App\conventions::where('conventions_state', 1)
				->where('conventions_type', '=', 'Reglamento y Formato')
				->get();


			return view('reglamentosFormatos')
				->withSocial($social)
				->withCategory($category)
				->withConventios($conventions)
				->withManagement($managementArea);
		});



		Route::get('/objetivos', function () {

			$managementArea = DB::table('management_area')
				->first();
			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			return view('objetivos')
				->withSocial($social)->withCategory($category)

				->withManagement($managementArea);
		});

		Route::get('/funciones', function () {

			$managementArea = DB::table('management_area')
				->first();
			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			return view('funciones')
				->withSocial($social)->withCategory($category)

				->withManagement($managementArea);
		});

		Route::get('/proyectos', function () {
			//aqui realice cambio 1 es notiia y 2 es eventos
			//se ordene descendentemente
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'desc')
				->get();
				$news =DB::table('news')
				->join('multimedia','news.news_id','=','multimedia.multimedia_news')
				->join('news_translation','news.news_id','=','news_translation.news_id')
				->select('news.news_id','news.news_status_id', 'news_translation.news_translation_title','news_translation.news_translation_content', 'multimedia.multimedia_name','news_translation.news_translation_alias')
				->where('news.news_status_id',1)
			  ->where('news.news_type_id',2)
				//esta linea agrupa
				->groupBy('multimedia.multimedia_news')
				->orderBy('news.news_id','desc')
				->paginate(5);
			

			return view('proyecto')
				->withManagement($managementArea)
				->withSocial($social)
				->withCategory($category)
				->withProjects($news);
		});

		Route::get('/proyecto/{id}', function () {
			//se muestre descendentemente
			if (isset($id)) {
				$projects = App\projects::where('projects_id', $id)->first();

				$managementArea = DB::table('management_area')
					->first();
				$category = DB::table('link')
					->leftJoin('category', 'category_id', '=', 'link.link_category')
					->where('link_state', 1)
					->orderBy('link.link_id', 'desc')
					->get();
				$social = DB::table('social_network')
					->where('social_network_state', 1)
					->get();

				return view('proyecto')
					->withGallery($projects)
					->withSocial($social)->withCategory($category)

					->withManagement($managementArea);
			} else {
				abort(404);
			}
		});

		Route::get('/formacion-grupos', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			$culturalManagement = DB::table('cultural_management')
				->where('cultural_management_state', 1)
				->get();
			return view('formacion')
				->withManagement($managementArea)
				->withSocial($social)->withCategory($category)

				->withCultural($culturalManagement);
		});
		Route::get('/quienes-somos', function () {
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();
			$culturalManagement = DB::table('cultural_management')
				->where('cultural_management_state', 1)
				->get();
			return view('quienesSomos')
				->withManagement($managementArea)
				->withSocial($social)->withCategory($category)

				->withCultural($culturalManagement);
		});

		Route::get('/formacion/{id}', function ($id) {

			if (isset($id)) {

				$culturalManagement = DB::table('cultural_management_types')
					->leftJoin('multimedia', 'cultural_management_types.cultural_management_types_id', '=', 'multimedia.multimedia_cultural_management_types')
					->select('cultural_management_types.cultural_management_types_id', 'cultural_management_types.cultural_management_types_state', 'cultural_management_types.cultural_management_types_name', 'cultural_management_types.cultural_management_types_description', 'multimedia.multimedia_name')
					->where('cultural_management_types_area', $id)
					->where('cultural_management_types.cultural_management_types_state', 1)
					->groupBy('multimedia.multimedia_cultural_management_types')
					->orderBy('cultural_management_types.cultural_management_types_id', 'desc')
					->paginate(3);

				$name = DB::table('cultural_management')
					->where('cultural_management_id', $id)
					->first();

				$managementArea = DB::table('management_area')
					->first();
				$category = DB::table('link')
					->leftJoin('category', 'category_id', '=', 'link.link_category')
					->where('link_state', 1)
					->orderBy('link.link_id', 'asc')
					->get();
				$social = DB::table('social_network')
					->where('social_network_state', 1)
					->get();

				return view('formaciones')
					->withCultural($culturalManagement)
					->withName($name)
					->withSocial($social)->withCategory($category)

					->withManagement($managementArea);
			} else {
				abort(404);
			}
		});

		Route::get('/noticias', function () {
			//cambio el tipo de noticia de 1 que es evento a 2 que es noticia
			//se muestre descendentemente
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'desc')
				->get();

			$news = DB::table('news')
				->join('multimedia', 'news.news_id', '=', 'multimedia.multimedia_news')
				->join('news_translation', 'news.news_id', '=', 'news_translation.news_id')
				->select('news.news_id', 'news.news_status_id', 'news_translation.news_translation_title', 'news_translation.news_translation_content', 'multimedia.multimedia_name', 'news_translation.news_translation_alias')
				->where('news.news_status_id', 1)
				->where('news.news_type_id', 2)
				//esta linea agrupa
				->groupBy('multimedia.multimedia_news')
				->orderBy('news.news_id', 'desc')
				->paginate(5);

			return view('noticias')
				->withManagement($managementArea)
				->withSocial($social)
				->withCategory($category)
				->withPrincipal($news[0])
				->withNews($news);
		});

		Route::get('/noticia/{id}', function ($id) {

			if (isset($id)) {
				$news = App\news::where('news_id', $id)->first();
				$multimedia = App\multimedia::where('multimedia_news', $news->news_id)
					->orderBy('multimedia_type', 'desc')
					->get();
				$image = "";
				foreach ($multimedia as $data) {
					if ($data->multimedia_type == 1) {
						$image = $data->multimedia_name;
					}
				}

				$managementArea = DB::table('management_area')
					->first();

				$social = DB::table('social_network')
					->where('social_network_state', 1)
					->get();
				$category = DB::table('link')
					->leftJoin('category', 'category_id', '=', 'link.link_category')
					->where('link_state', 1)
					//cambio asc por desc
					->orderBy('link.link_id', 'desc')
					->get();
				return view('noticia')
					->withNews($news)
					->withMultimedia($multimedia)
					->withSocial($social)
					->withCategory($category)
					->withImage($image)
					->withManagement($managementArea);
			} else {
				abort(404);
			}
		});


		Route::get('/galerias', function () {

			$managementArea = DB::table('management_area')
				->first();

			$gallery = DB::table('gallery')
				->leftJoin('multimedia', 'gallery.gallery_id', '=', 'multimedia.multimedia_gallery')
				->select('gallery.gallery_id', 'gallery.gallery_state', 'gallery.gallery_name', 'multimedia.multimedia_name')
				->where('gallery.gallery_state', 1)
				->groupBy('multimedia.multimedia_gallery')
				->orderBy('gallery.gallery_id', 'desc')
				->paginate(2);
			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();


			return view('galerias')
				->withManagement($managementArea)
				->withSocial($social)
				->withCategory($category)
				->withGallery($gallery);
		});

		Route::get('/galeria/{id}', function ($id) {

			if (isset($id)) {
				$gallery = App\gallery::where('gallery_id', $id)->first();
				$multimedia = App\multimedia::where('multimedia_gallery', $gallery->gallery_id)
					->orderBy('multimedia_type', 'desc')
					->get();
				$managementArea = DB::table('management_area')
					->first();

				$social = DB::table('social_network')
					->where('social_network_state', 1)
					->get();
				$category = DB::table('link')
					->leftJoin('category', 'category_id', '=', 'link.link_category')
					->where('link_state', 1)
					->orderBy('link.link_id', 'asc')
					->get();
				return view('galeria')
					->withGallery($gallery)
					->withMultimedia($multimedia)
					->withSocial($social)->withCategory($category)

					->withManagement($managementArea);
			} else {
				abort(404);
			}
		});


		Route::get('/contactos', function () {
			$managementArea = DB::table('management_area')
				->first();
			$socialNetwork = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			return view('contactos')
				->withManagement($managementArea)->withCategory($category)

				->withSocial($socialNetwork);
		});
		//añadi para mostrar descargas
		Route::get('/descargas', function () {
			$managementArea = DB::table('management_area')
				->first();

			/*$downloads = DB::table('download')
    ->where('download_state',1)
    ->get()*/
			$downloads = App\download::where('download_state', 1)
				->get();
			$socialNetwork = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'asc')
				->get();

			return view('download')
				->withManagement($managementArea)
				->withCategory($category)
				->withDownloads($downloads)
				->withSocial($socialNetwork);
		});
		Route::get('/modelos', function () {
			return view('modelos');
		});
		Route::get('/modelos-descargas', function () {
			return view('modelos-descargas');
		});
		Route::get('/revistas', function () {
			$magazines = \App\magazine::orderBy('magazine_id', 'asc')->get();
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'desc')
				->get();
			return view('revistas')
				->withMagazines($magazines)
				->withManagement($managementArea)
				->withSocial($social)
				->withCategory($category);
		});

		Route::get('/revista/{id}', function ($id) {
			$managementArea = DB::table('management_area')
				->first();
			$magazine = DB::table('magazine')->first();
			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'desc')
				->get();
			return view('revista')
				->withMagazine($magazine)
				->withManagement($managementArea)
				->withSocial($social)
				->withCategory($category);
		});

		Route::get('/ofertas', function () {
			//aqui realice cambio 1 es notiia y 2 es eventos
			//se ordene descendentemente
			$managementArea = DB::table('management_area')
				->first();

			$social = DB::table('social_network')
				->where('social_network_state', 1)
				->get();
			$category = DB::table('link')
				->leftJoin('category', 'category_id', '=', 'link.link_category')
				->where('link_state', 1)
				->orderBy('link.link_id', 'desc')
				->get();
			$news = DB::table('news')
				->leftJoin('multimedia', 'news.news_id', '=', 'multimedia.multimedia_news')
				->select('news.news_id', 'news.news_state', 'news.news_title', 'news.news_content', 'multimedia.multimedia_name', 'news.news_alias')
				->where('news.news_state', 1)
				->where('news.news_type', 3)
				->groupBy('multimedia.multimedia_news')
				->orderBy('news.news_id', 'desc')
				->paginate(2);

			return view('ofertas')
				->withManagement($managementArea)
				->withSocial($social)->withCategory($category)

				->withProjects($news);
		});
	}
);
