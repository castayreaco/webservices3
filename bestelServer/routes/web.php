<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/instellingen', 'instellingenController@index');
Route::get('/instellingen/{id}', 'instellingenController@show');
Route::post('/instellingen/{id}/winkelItems', 'winkelItemController@store');
Route::post('/instellingen/{id}/removeWinkelItems', 'winkelItemController@remove');
Route::post('/instellingen/winkelToevoegen', 'instellingenController@addWinkel');
Route::post('/instellingen/winkelVerwijderen', 'instellingenController@removeWinkel');
Route::get('/instellingen/{id}/bewerken', 'instellingenController@editWinkel');
Route::patch('/instellingen/{id}/bewerken', 'instellingenController@updateWinkel');
Route::get('/instellingen/product/{id}/bewerken', 'instellingenController@editProduct');
Route::patch('/instellingen/product/{id}/bewerken', 'instellingenController@updateProduct');

Route::get('/klanten', 'klantenController@index');
Route::get('/klanten/{id}', 'klantenController@show');
Route::post('/klanten/{id}/bestellen', 'klantenController@store');

Route::get('/home/{id}', 'bestellingenController@show');