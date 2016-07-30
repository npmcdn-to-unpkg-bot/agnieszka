<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::post('/portfolio_photos/{category}', 'PortfolioPhotoController@addPhoto');
Route::resource('/portfolio_photos', 'PortfolioPhotoController');

Route::get('/gallery', 'GalleryController@index');