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

// Definiendo un grupo de rutas para usuarios administradores
Route::middleware(['auth','admin'])->prefix('admin')->group(function(){

  Route::get('/products', 'ProductController@index');           // Listado de productos, devuelve un listado
  # Crear Productos
  Route::get('/products/create', 'ProductController@create');  // Creacion de nuevos productos, devueeve un form
  Route::post('/products', 'ProductController@store');         // Registra los datos
  # Actualizar Productos
  Route::get('/products/{id}/edit', 'ProductController@edit');
  Route::post('/products{id}/edit', 'ProductController@update');
  #Eliminar Productos
  Route::delete('/products/{id}', 'ProductController@destroy');

  #Imagenes 
  Route::get('/products/{id}/images', 'ImageController@index'); 
  Route::post('/products{id}/images', 'ImageController@store');
  Route::delete('/products{id}/images', 'ImageController@destroy'); 
});
