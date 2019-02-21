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
Auth::routes();

Route::get('/', 'TestController@welcome');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/products', 'ProductController@index');           // Listado de productos, devuelve un listado
# Crear Productos
Route::get('/admin/products/create', 'ProductController@create');  // Creacion de nuevos productos, devueeve un form
Route::post('/admin/products', 'ProductController@store');         // Registra los datos
# Actualizar Productos
Route::get('/admin/products/{id}/edit', 'ProductController@edit');  // Creacion de nuevos productos, devueeve un form
Route::post('/admin/products{id}/edit', 'ProductController@update');         // Registra los datos
#Eliminar Productos
Route::delete('/admin/products/{id}', 'ProductController@destroy');