<?php


//front-end routes
Route::get('/', 'PagesController@index') -> name('index');
Route::get('about-us', 'PagesController@aboutUs') -> name('aboutus');
Route::get('about-us/{id}', 'PagesController@aboutTab') -> name('about.tab');
Route::get('apply-job/{id}', 'PagesController@jobApply') -> name('job.apply');
Route::get('career', 'PagesController@career') -> name('career');
Route::get('certificates', 'PagesController@certificates') -> name('certificates');
Route::get('clients', 'PagesController@clients') -> name('clients');
Route::get('contact-us', 'PagesController@contactUs') -> name('contactus');
Route::get('inquiry', 'PagesController@inquiry') -> name('inquiry');
Route::get('news', 'PagesController@news') -> name('news');
Route::get('our-team', 'PagesController@ourTeam') -> name('ourteam');
Route::get('projects', 'PagesController@projects') -> name('projects');
Route::get('project-detail/{id}', 'PagesController@projectLarge') -> name('project.large');
Route::get('project-detail/main/{id}', 'PagesController@projectMainLarge') -> name('project.large.main');
Route::get('sub/projects/{id}', 'PagesController@subProjects') -> name('projects.sub');
Route::get('main/projects/{id}', 'PagesController@mainProjects') -> name('projects.main');
Route::get('services', 'PagesController@services') -> name('services');
Route::get('service-detail/{id}', 'PagesController@serviceLarge') -> name('service.large');

//front end email routes
Route::post('email/contact', 'EmailController@contact') -> name('email.contact');
Route::post('email/inquiry', 'EmailController@inquiry') -> name('email.inquiry');
Route::post('email/apply', 'EmailController@apply') -> name('email.apply');



//auth routes
Route::auth();

//admin routes
Route::group(['middeware' => 'auth', 'prefix' => 'admin'], function(){

	Route::get('/', 'HomeController@index') -> name('home');
	Route::get('/dashboard', 'HomeController@index') -> name('home');
	//admin careers routes
	Route::resource('careers', 'CareerController',['except' => ['show']]);
	Route::delete('delete-multiple-careers', 'CareerController@deleteMultiple');
	//admin clients routes
	Route::resource('clients', 'ClientController',['except' => ['show']]);
	Route::delete('delete-multiple-clients', 'ClientController@deleteMultiple');
	//admin accounts routes
	Route::get('settings/accounts', 'AccountsController@getAccountSettings') -> name('account.index');
	Route::put('settings/accounts/{id}', 'AccountsController@updateAccountSettings') -> name('account.update');
	//admin settings routes
	Route::resource('settings', 'SettingsController', ['only' => ['index', 'update']]);
	Route::put('social-links/{id}/update', 'SocialIconController@update') -> name('socialicons.update');
	//admin news routes
	Route::resource('news', 'NewsController', ['except' => ['show']]);
	Route::delete('delete-multiple-news', 'NewsController@deleteMultiple');
	//admin home banner routes
	Route::resource('home-banners', 'HomeBannerController', ['except' => ['show']]);
	Route::delete('delete-multiple-home-banners', 'HomeBannerController@deleteMultiple');
	//admin banners routes
	Route::resource('banners', 'BannerController',['only' => ['show', 'update']]);
	//admin certificates routes
	Route::resource('certificates', 'CertificateController', ['except' => ['show']]);
	Route::delete('delete-multiple-certificates', 'CertificateController@deleteMultiple');
	//admin team routes
	Route::resource('teams', 'TeamController', ['except' => ['show']]);
	Route::delete('delete-multiple-teams', 'TeamController@deleteMultiple');
	//admin about_us routes
	Route::resource('about', 'AboutController', ['except' => ['show']]);
	Route::delete('delete-multiple-about', 'AboutController@deleteMultiple');
	//admin offices routes
	Route::resource('offices', 'OfficeController', ['except' => ['show']]);
	Route::delete('delete-multiple-offices', 'OfficeController@deleteMultiple');
	//admin home about routes
	Route::get('short-about', 'HomeAboutController@shortAbout') -> name('admin.home-about');
	Route::put('short-about/{id}', 'HomeAboutController@updateShortAbout') -> name('admin.short-about.update');
	Route::get('chairman-info', 'HomeAboutController@chairmanInfo') -> name('admin.chairman-info');
	Route::put('chairman-info/{id}', 'HomeAboutController@updateChairmanInfo') -> name('admin.chairman-info.update');
	//admin home quotes routes
	Route::resource('quotes', 'HomeQuoteController', ['only' => ['index', 'update']]);
	//admin home advertisement routes
	Route::resource('advertisements', 'HomeAdvertisementController', ['except' => ['show']]);
	Route::delete('delete-multiple-advertisements', 'HomeAdvertisementController@deleteMultiple');
	//admin home bg routes
	Route::resource('bg', 'HomeBgController', ['only' => ['index', 'update']]);
	//admin services controller
	Route::resource('services', 'ServiceController', ['except' => ['show']]);
	Route::delete('delete-multiple-services', 'ServiceController@deleteMultiple');
	Route::get('change-status/{id}', 'ServiceController@changeFeatured') -> name('admin.services.featured');
	//admin nationality routes
	Route::resource('nationality','NationalityController', ['except' => ['show']]);
	Route::delete('delete-multiple-nationalities', 'NationalityController@deleteMultiple');
	//admin main categories routes
	Route::resource('main-categories', 'MainCategoryController', ['except' => ['show']]);
	//admin sub categories routes
	Route::resource('sub-categories', 'SubCategoryController', ['except' => ['show']]);
	Route::get('sub-categories/{id}', 'SubCategoryController@getCategories') -> name('admin.sub-categories.get');
	Route::get('sub-categories/{id}/create', 'SubCategoryController@createCategory') -> name('admin.sub-category.create');
	Route::post('sub-categories/{id}/store', 'SubCategoryController@storeCategory') -> name('admin.sub-category.store');

	//admin sub projects routes
	Route::get('sub-category/{id}/projects', 'SubProjectController@index') -> name('admin.sub-projects.index');
	Route::get('sub-category/{id}/projects/create', 'SubProjectController@create') -> name('admin.sub-projects.create');
	Route::post('sub-category/{id}/projects/store', 'SubProjectController@store') -> name('admin.sub-projects.store');
	Route::get('sub-category/{id}/projects/edit', 'SubProjectController@edit') -> name('admin.sub-projects.edit');
	Route::put('sub-category/projects/{id}/edit', 'SubProjectController@update') -> name('admin.sub-projects.update');
	Route::delete('sub-category/projects/{id}/destroy', 'SubProjectController@destroy') -> name('admin.sub-projects.destroy');
	//status routes for sub projects
	Route::get('sub-category/projects/{id}/change-visibility', 'StatusController@changeSubVisibility') -> name('admin.sub-projects.visibility');
	Route::get('sub-category/projects/{id}/change-featured', 'StatusController@changeSubFeatured') -> name('admin.sub-projects.featured');

	//admin route for deleting multiple projects through ajax
	Route::delete('delete-multiple-sprojects', 'SubProjectController@deleteMultiple') -> name('delete-multiple-sub-projects');


	//admin routes for main categories projects
	Route::get('main-categories/{id}/projects', 'MainProjectController@index') -> name('admin.main-projects.index');
	Route::get('main-categories/{id}/projects/create', 'MainProjectController@create') -> name('admin.main-projects.create');
	Route::post('main-category/{id}/projects/store', 'MainProjectController@store') -> name('admin.main-projects.store');
	Route::get('main-category/{id}/projects/edit', 'MainProjectController@edit') -> name('admin.main-projects.edit');
	Route::put('main-category/projects/{id}/edit', 'MainProjectController@update') -> name('admin.main-projects.update');
	Route::delete('main-category/projects/{id}/destroy', 'MainProjectController@destroy') -> name('admin.main-projects.destroy');
	//status routes for main projects
	Route::get('main-category/projects/{id}/change-visibility', 'StatusController@changeMainVisibility') -> name('admin.main-projects.visibility');
	Route::get('main-category/projects/{id}/change-featured', 'StatusController@changeMainFeatured') -> name('admin.main-projects.featured');

	//admin route for deleting multiple projects through ajax
	Route::delete('delete-multiple-mprojects', 'MainProjectController@deleteMultiple') -> name('delete-multiple-main-projects');

});

