<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('twill-devtools');
Route::get('/assets/js', 'AssetsController@js')->name('twill-devtools.assets.js');