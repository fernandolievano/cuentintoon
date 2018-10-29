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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('cuentos', 'CuentoController');
Route::get('cuentos/{cuento}/vistaPrevia', 'CuentoController@preview')->name('cuentos.preview');
Route::put('publicar/{id}', 'CuentoController@revision')->name('cuentos.publicar');

Route::name('paginas.')->prefix('pagina')->group(function () {
  Route::get('/leer/{cuento}/','PaginaController@leer')->name('read');
  Route::get('/nueva/{cuento}', 'PaginaController@create')->name('create');
  Route::get('/editar/{pagina}', 'PaginaController@edit')->name('edit');
  Route::get('/miCuento/{cuento}', 'PaginaController@preview')->name('preview');
  Route::get('/listo', 'PaginaController@ready')->name('ready');
  Route::post('/{cuento}', 'PaginaController@store')->name('store');
  Route::put('/{pagina}','PaginaController@update')->name('update');
  Route::delete('/{pagina}','PaginaController@destroy')->name('delete');
});

Route::name('user.')->prefix('usuario')->group(function () {
  Route::post('/registrar', 'UserController@registro')->name('registro');
  Route::post('/actualizar/{id}', 'UserController@actualizar')->name('actualizar');
});

Route::name('admin.')->prefix('administrador')->group(function () {
  Route::get('/dashboard', 'AdministracionController@dashboard')->name('dashboard');
  Route::post('/nuevoRol', 'AdministracionController@nuevoRol')->name('store.rol');
  Route::delete('/borrarRol/{id}', 'AdministracionController@borrarRol')->name('delete.rol');
  Route::post('/asignarRol', 'AdministracionController@asignarRol')->name('asignar.rol');
  Route::post('/nuevoPermiso', 'AdministracionController@nuevoPermiso')->name('store.permiso');
  Route::delete('/borrarPermiso/{id}', 'AdministracionController@borrarPermiso')->name('delete.permiso');
  Route::post('/asignarPermiso','AdministracionController@asignarPermiso')->name('asignar.permiso');
});
