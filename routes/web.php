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
    return view('login');
});

Route::get('/index', function () {
    return view('index');
});

Route::group(['prefix' => 'admin'], function()
{

	Route::get('categories', function () {
	    return view('admin.categoria');
	});

	Route::get('products', function () {
	    return view('admin.producto');
	});

	Route::get('usuario_producto', function () {
	    return view('admin.usuario_producto');
	});

});

Route::group(['middleware' => 'cors'], function () {
    Route::post("api/signin", 'UsuarioPortalController@login');    
});

Route::group(['prefix' => 'api'], function()
{
	// Rutas API categoria
	Route::get('categoria/{id?}', 'CategoriaController@index');
	Route::post('categoria', 'CategoriaController@store');
	Route::post('categoria/{id}', 'CategoriaController@update');
	Route::delete('categoria/{id}', 'CategoriaController@destroy');

	// Rutas API Producto
	Route::get('producto/{id?}', 'ProductoController@index');
	Route::post('producto', 'ProductoController@store');
	Route::post('producto/{id}', 'ProductoController@update');
	Route::delete('producto/{id}', 'ProductoController@destroy');

	// Rutas API Usuario Producto
	Route::get('usuario_producto/{id?}', 'UsuarioProductoController@index');
	Route::post('usuario_producto', 'UsuarioProductoController@store');
	Route::post('usuario_producto/{id}', 'UsuarioProductoController@update');
	Route::delete('usuario_producto/{id}', 'UsuarioProductoController@destroy');


	// Rutas API Usuario Portal
	Route::get("signin/usuario_portal", 'UsuarioPortalController@getAuthenticatedUser');

});

