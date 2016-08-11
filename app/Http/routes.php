<?php

Route::get('/', ['as' => 'home', function () { return view('pages.home'); }]);
Route::get('about', ['as' => 'about', function () { return view('pages.about'); }]);
Route::get('contact', ['as' => 'contact', function () { return view('pages.contact'); }]);
Route::get('my-offer', ['as' => 'services', function () { return view('pages.services'); }]);
Route::get('portfolio', [
	'as' => 'portfolio',
	'uses' => 'PortfolioPhotoController@showAll',
]);

Route::auth();

Route::get('admin', function () {
    return view('admin/pages/dashboard');
});

Route::post('/admin/portfolio_photos/{category}', 'PortfolioPhotoController@addPhoto');