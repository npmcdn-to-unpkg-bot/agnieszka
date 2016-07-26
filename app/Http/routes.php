<?php

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/gallery', 'GalleryController@index');