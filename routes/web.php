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

Route::get('/admin_categoria', function () {
    return view('admin/categoria');
});

// Rutas API categoria
Route::get('/api/categoria/{id?}', 'CategoriaController@index');
Route::post('/api/categoria', 'CategoriaController@store');
Route::post('/api/categoria/{id}', 'CategoriaController@update');
Route::delete('/api/categoria/{id}', 'CategoriaController@destroy');