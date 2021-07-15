<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//retorno de vistas
Route::get('/jsonSearch','SearchController@jsonSearch')->name('jsonSearch');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

//Rutas para obtenerlas vistas con los videos, en modo normal y modo Json.

Route::get('/verVideos','SearchController@videos')->name('vervideos');
Route::get('/verVideosApi','SearchController@getVideosApi')->name('getVideosApi');

