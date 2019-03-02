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

#Ruta para obtener los productos en la busqueda predictiva
Route::get('/products/json','SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
#Ruta para todos los productos
Route::get('/products','ProductController@index');
# Ruta para un producto
Route::get('/products/{id}','ProductController@show');
#Ruta para mostrar todas las categorias de productos
Route::get('/categories','CategoryController@index');
#Ruta para mostrar una categoria
Route::get('/categories/{category}','CategoryController@show');
#Ruta para hacer una busqueda
Route::get('/search','SearchController@show');

#Ruta para agregar un elemento al carrito
Route::post('/cart','CartDetailController@store');
#Ruta para eliminar un elemento al carrito
Route::delete('/cart','CartDetailController@destroy');
# Ruta para convertir el carrito en un pedido
Route::post('/order','CartController@update');
#Ruta para eliminar un pedido
Route::delete('/order','CartController@destroy');
#Ruta para cambiar el status de un pedido
Route::post('/order/status','CartController@updateStatus');
#Ruta para enviar un mensage de consulta al admin
Route::post('/message/new','MessageController@store');


// Definiendo un grupo de rutas para usuarios administradores
Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){

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
  Route::post('/products/{id}/images', 'ImageController@store');
  Route::delete('/products/{id}/images', 'ImageController@destroy');
  # Permite destacar una imagen
  Route::get('/products/{id}/images/select/{image}', 'ImageController@select');  

  /* ADMINSITRACION DE CATEGORIAS */

  # Listar categorias
  Route::get('/categories', 'CategoryController@index');           // Listado de productos, devuelve un listado
  # Crear y registrar
  Route::get('/categories/create', 'CategoryController@create');  // Creacion de nuevos productos, devueeve un form
  Route::post('/categories', 'CategoryController@store');         // Registra los datos
  
  # Actualizar y editar
  Route::get('/categories/{category}/edit', 'CategoryController@edit');
  Route::post('/categories/{category}/edit', 'CategoryController@update');
  #Eliminar
  Route::delete('/categories/{category}', 'CategoryController@destroy');



});
