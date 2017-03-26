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

Route::get('/admin_categorias', function () {
    return view('admin/categoria');
});

Route::get('/admin_productos', function () {
    return view('admin/producto');
});

// Rutas API categoria
Route::get('/api/categoria/{id?}', 'CategoriaController@index');
Route::post('/api/categoria', 'CategoriaController@store');
Route::post('/api/categoria/{id}', 'CategoriaController@update');
Route::delete('/api/categoria/{id}', 'CategoriaController@destroy');

// Rutas API Producto
Route::get('/api/producto/{id?}', 'ProductoController@index');
Route::post('/api/producto', 'ProductoController@store');
Route::post('/api/producto/{id}', 'ProductoController@update');
Route::delete('/api/producto/{id}', 'ProductoController@destroy');