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

Route::name('pruebas.')->prefix('quizzes/')->group(function (){
  Route::post('{cuento}/store', 'PruebaController@crearPrueba')->name('store');
  Route::post('evaluar/{prueba}', 'PruebaController@evaluar')->name('evaluar');
  Route::post('{prueba}/pr', 'PruebaController@storePreguntaRespuestas')->name('pregunta.store');
  Route::get('nuevo/{prueba}', 'PruebaController@nuevaPrueba')->name('create');
  Route::get('{cuento}', 'PruebaController@misPruebas')->name('show');
});

Route::resource('cuentos', 'CuentoController');
Route::name('cuentos.')->prefix('cuento/')->group(function (){
  Route::get('{cuento}/vista-previa', 'CuentoController@preview')->name('preview');
  Route::get('inspeccionar/{cuento}', 'CuentoController@inspeccionar')->name('inspeccionar');
  Route::get('reportes/{cuento}', 'CuentoController@reportes')->name('reportes');
  Route::put('publicar/{id}', 'CuentoController@publicar')->name('publicar');
  Route::post('reportar/{cuento}', 'CuentoController@reportar')->name('reportar');
});

Route::name('paginas.')->prefix('pagina/')->group(function () {
  Route::get('leer/{cuento}/','PaginaController@leer')->name('read');
  Route::get('nueva/{cuento}', 'PaginaController@create')->name('create');
  Route::get('editar/{pagina}', 'PaginaController@edit')->name('edit');
  Route::get('vista-previa/{cuento}', 'PaginaController@preview')->name('preview');
  Route::get('{cuento}/listo', 'PaginaController@ready')->name('ready');
  Route::put('{pagina}','PaginaController@update')->name('update');
  Route::post('{cuento}', 'PaginaController@store')->name('store');
  Route::delete('{pagina}','PaginaController@destroy')->name('delete');
});

Route::name('user.')->prefix('usuario/')->group(function () {
  Route::post('registrar', 'UserController@registro')->name('registro');
  Route::post('cambiarNombre', 'UserController@cambiarNombre')->name('cambiar.nombre');
  Route::post('cambiarEmail', 'UserController@cambiarEmail')->name('cambiar.email');
  Route::post('cambiarPass', 'UserController@cambiarPass')->name('cambiar.pass');
  Route::post('cambiarAvatar', 'UserController@cambiarAvatar')->name('cambiar.avatar');
  Route::post('cambiarUsername', 'UserController@cambiarUsername')->name('cambiar.username');
  Route::post('peticionRol', 'SolicitudRolController@solicitar')->name('solicitar.rol');
  Route::get('promoverA/escritor/{id}', 'SolicitudRolController@escritor')->name('promover.escritor');
});

Route::name('admin.')->prefix('administrador/')->group(function () {
  Route::get('/dashboard', 'AdministracionController@dashboard')->name('dashboard');
  Route::post('asignarPermiso','AdministracionController@asignarPermiso')->name('asignar.permiso');
  Route::post('nuevoRol', 'AdministracionController@nuevoRol')->name('store.rol');
  Route::post('asignarRol', 'AdministracionController@asignarRol')->name('asignar.rol');
  Route::post('nuevoPermiso', 'AdministracionController@nuevoPermiso')->name('store.permiso');
  Route::delete('borrarPermiso/{id}', 'AdministracionController@borrarPermiso')->name('delete.permiso');
  Route::delete('borrarRol/{id}', 'AdministracionController@borrarRol')->name('delete.rol');
});
