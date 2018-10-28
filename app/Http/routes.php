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
Route::get('services', 'PagesController@services') -> name('services');
Route::get('service-detail/{id}', 'PagesController@serviceLarge') -> name('service.large');


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

});

