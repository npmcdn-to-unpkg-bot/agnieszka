<?php

// Initalize on production
// Route::get('/', ['as' => 'home', function () {

// 	\App\Role::create(['name' => 'admin']);
// 	$role = \App\Role::whereName('admin')->first();
// 	$user = \App\User::create([
// 		'first_name' => 'Istvan',
// 		'last_name' => 'Lovas',
// 		'email' => 'loleves@gmail.com',
// 		'password' => Hash::make('secret')
// 	]);
// 	$user = \App\User::first();
// 	$user->roles()->attach($role);
// 	return \App\User::with('roles')->find(1);
// }]);

//Admin
Route::group(['middleware' => 'admin'], function()
{
	// Admin Dashboard
    Route::get('admin', function() { return view('admin/pages/dashboard'); });
    // Register new user
    Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');
    // Add portfolio photos
    Route::post('admin/portfolio_photos/{category}',[
		'as' => 'store_photo',
		'uses' => 'AdminPortfolioController@addPhoto'
	]);

	// Add background image to photosession
	Route::post('admin/photosessions/{id}/background-image',[
		'as' => 'add_bg_to_gallery',
		'uses' => 'PhotoSessionController@addBackgroundImage'
	]);
	// Add photos to photosession
	Route::post('admin/photosessions/{id}/photos',[
		'as' => 'add_photos_to_gallery',
		'uses' => 'PhotoSessionController@addPhoto'
	]);
	
	// Photo Sessions
	Route::resource('admin/photosessions','PhotoSessionController', ['except' => ['create']]);
});

Route::group(['middleware' => 'web'], function()
{
	Route::get('/', ['as' => 'home', function () { return view('pages.home'); }]);
	Route::get('about', ['as' => 'about', function () { return view('pages.about'); }]);
	Route::get('contact', ['as' => 'contact', function () { return view('pages.contact'); }]);
	Route::get('my-offer', ['as' => 'services', function () { return view('pages.services'); }]);
	Route::get('portfolio', ['as' => 'portfolio', 'uses' => 'PortfolioPhotoController@showAll']);

	//Authentication
	Route::auth();
});

// Client Gallery
Route::get('gallery/{id}', [
	'before'	=> 'auth',
	'as'		=> 'gallery',
	'uses'		=> 'GalleryController@show'
]);






