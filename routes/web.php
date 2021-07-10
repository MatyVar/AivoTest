<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//retorno de vistas
Route::get('/jsonSearch','SearchController@jsonSearch')->name('jsonSearch');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//ruta de la api
Route::get('/api/youtube','SearchController@getVideos')->name('api');
Route::get('/verVideos','SearchController@videos')->name('vervideos');
Route::get('/verVideosApi','SearchController@getVideosApi')->name('getVideosApi');

