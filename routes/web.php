<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/form', 'SiteController@form');
Route::post('/form', 'SiteController@insert');
Route::get('/lists/indexnome','ListaController@indexnome', function(){
    return view('listas.indexnome');
});

Route::resource('atores', 'AtorController');
Route::resource('filmes', 'FilmeController');
Route::resource('generos', 'GeneroController');
Route::resource('listas', 'ListaController');
Route::resource('flistas', 'FilmeListaController');