<?php

//Initalize on production
// Route::get('/', ['as' => 'home', function () {

// 	\App\Role::create(['name' => 'admin']);
// 	$role1 = \App\Role::whereName('admin')->first();
// 	$user = \App\User::create([
// 		'first_name' => 'Istvan',
// 		'last_name' => 'Lovas',
// 		'email' => 'loleves@gmail.com',
// 		'password' => Hash::make('secret')
// 	]);
// 	$user = \App\User::first();
// 	$user->roles()->attach($role1);
// 	return \App\User::with('roles')->find(1);
// }]);

//Admin
Route::group(['middleware' => 'admin'], function()
{
	// Admin Dashboard
    Route::get('admin',['as' => 'dashboard','uses' => 'Admin\AdminController@dashboard']);
	Route::get('admin/clients', ['as' => 'clients', 'uses' => 'Admin\AdminController@clients']);

	// ================
	// Portfolio Photos
	// ================

	// Add portfolio photos
    Route::post('admin/portfolio_photos/{category}',[
		'as' => 'store_photo',
		'uses' => 'Admin\AdminController@addPhoto'
	]);
	// Delete Portfolio Photo
	Route::delete('portfoliophoto/{id}', 'PortfolioPhotoController@destroy' );
	
	// =============
	// PhotoSessions
	// =============

	// Add background image to photosession
	Route::post('admin/photosessions/{id}/background-image',[
		'as' => 'add_bg_to_gallery',
		'uses' => 'Admin\PhotoSessionController@addBackgroundImage'
	]);
	// Add photos to photosession
	Route::post('admin/photosessions/{id}/photos',[
		'as' => 'add_photos_to_gallery',
		'uses' => 'Admin\PhotoSessionController@addPhoto'
	]);

	// Update title
	Route::patch('admin/photosessions/{id}/title',[
		'as' => 'update-title',
		'uses' => 'Admin\PhotoSessionController@updateTitle'
	]);

	// Enable and Disable to download photos from gallery
	Route::patch('admin/photosessions/{id}/enableAndDisableToDownloadPhotos',[
		'as' => 'enableAndDisableToDownloadPhotos',
		'uses' => 'Admin\PhotoSessionController@enableAndDisableToDownloadPhotos'
	]);

	// Publish Gallery
	Route::get('admin/photosessions/{id}/publish',[
		'as' => 'publish-gallery',
		'uses' => 'Admin\PhotoSessionController@publish'
	]);

	// Mark Photosession as purchased
	Route::get('admin/photosessions/{id}/mark-as-purchased',[
		'as' => 'mark-as-purchased',
		'uses' => 'Admin\PhotoSessionController@markAsPurchased'
	]);

	// Delete photos from photosession
	Route::delete('photos/{id}', 'Admin\PhotosessionPhotoController@destroy' );

	// Photosession Resource controller
	Route::resource('admin/photosessions','Admin\PhotoSessionController', ['except' => ['create','update']]);

	// Refresh page
	Route::get('refresh',[ 'as' => 'refresh-page', function(){
		return back();
	}]);
	
	//Register user
	Route::post('register', 'App\Http\Controllers\Auth\AuthController@register');

});

Route::group(['middleware' => 'web'], function()
{
	Route::get('/', ['as' => 'home', function () { return view('pages.home'); }]);
	Route::get('about', ['as' => 'about', function () { return view('pages.about'); }]);
	Route::get('contact', ['as' => 'contact', function () { return view('pages.contact'); }]);
	Route::get('services', ['as' => 'services', function () { return view('pages.services'); }]);
	Route::get('portfolio', ['as' => 'portfolio', 'uses' => 'PortfolioPhotoController@showAll']);

	Route::get('/language/{lang}', [
		'as' => 'language-chooser',
		'uses' => 'LanguageController@chooser'
	]);
});

//Authentication
Route::auth();

// Client Gallery
Route::get('client/{id}', [
	'as'		=> 'client-dashboard',
	'uses'		=> 'GalleryController@showClientDashboard'
]);

Route::patch('photoRequest', [
	'as'		=> 'sendPhotoRequest',
	'uses'		=> 'GalleryController@sendPhotoRequest'
]);

Route::get('client/{id}/photosession/{photosession}', [
	'as'		=> 'client-gallery',
	'uses'		=> 'GalleryController@showGallery'
]);




