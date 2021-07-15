<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Ruta de la api para youtube.
Route::get('/youtube','SearchController@getVideos')->name('api');