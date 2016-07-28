<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::resource('portfolio_photo', 'PortfolioPhotoController');

Route::get('/gallery', 'GalleryController@index');