<?php

//Admin
Route::group(['middleware' => 'web'], function()
{
    Route::get('admin', function () { return view('admin/pages/dashboard'); });
    Route::post('/admin/portfolio_photos/{category}',[
		'as' => 'store_photo',
		'uses' => 'AdminPortfolioController@addPhoto'
	]);

});

//Public
Route::get('/', ['as' => 'home', function () { return view('pages.home'); }]);
Route::get('about', ['as' => 'about', function () { return view('pages.about'); }]);
Route::get('contact', ['as' => 'contact', function () { return view('pages.contact'); }]);
Route::get('my-offer', ['as' => 'services', function () { return view('pages.services'); }]);
Route::get('portfolio', [
	'as' => 'portfolio',
	'uses' => 'PortfolioPhotoController@showAll',
]);

//Authentication
Route::auth();

// Client Gallery

Route::get('gallery/{id}', ['before' => 'auth'], function ($id) {
    return view('client/pages/gallery')->with('id');
});