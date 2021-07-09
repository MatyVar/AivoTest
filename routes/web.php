<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//rutas que reciben datos de los Form, para luego ser trabajados en el controller, y generar la url a la api.
Route::post('/search','SearchController@search')->name('search');
Route::post('/json','SearchController@json')->name('json');

//redirecciones para evitar que el usuario realice un get de la ruta post.
Route::get('/json',function(){
    return redirect(route('home'));
});
Route::get('/search',function(){
    return redirect(route('home'));
});
//retorno de vistas
Route::get('/jsonSearch','SearchController@jsonSearch')->name('jsonSearch');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

