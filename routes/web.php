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

Route::get('/cuentos', 'CuentoController@index')->name('cuentos.index');
Route::get('/top', 'UserController@topUsuarios');
Route::get('cuento/{cuento}/leer', 'CuentoController@leer');
Route::get('get-pages/{cuento}', 'CuentoController@leerCuento');
Route::get('/leer/{cuento}/','PaginaController@leer')->name('paginas.read');
Route::post('registrar', 'UserController@registro')->name('user.registro');

Route::group(['middleware' => 'auth'], function(){
  Route::name('pruebas.')->prefix('quizzes/')->group(function (){
    Route::post('{cuento}/store', 'PruebaController@crearPrueba')->name('store');
    Route::post('evaluar/{prueba}', 'PruebaController@evaluar')->name('evaluar');
    Route::post('{prueba}/pr', 'PruebaController@storePreguntaRespuestas')->name('pregunta.store');
    Route::get('nuevo/{prueba}', 'PruebaController@nuevaPrueba')->name('create');
    Route::get('{cuento}', 'PruebaController@misPruebas')->name('show');
    Route::get('random/{cuento}', 'PruebaController@pruebaRandom');
  });

  Route::resource('cuentos', 'CuentoController')->except('index');
  Route::name('cuentos.')->prefix('cuento/')->group(function (){
    Route::get('{cuento}/vista-previa', 'CuentoController@preview')->name('preview');
    Route::get('inspeccionar/{cuento}', 'CuentoController@inspeccionar')->name('inspeccionar');
    Route::get('reportes/{cuento}', 'CuentoController@reportes')->name('reportes');
    Route::put('publicar/{id}', 'CuentoController@publicar')->name('publicar');
    Route::post('reportar/{cuento}', 'CuentoController@reportar')->name('reportar');
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

  Route::name('paginas.')->prefix('pagina/')->group(function () {
    Route::get('nueva/{cuento}', 'PaginaController@create')->name('create');
    Route::get('editar/{pagina}', 'PaginaController@edit')->name('edit');
    Route::get('vista-previa/{cuento}', 'PaginaController@preview')->name('preview');
    Route::get('{cuento}/listo', 'PaginaController@ready')->name('ready');
    Route::put('{pagina}','PaginaController@update')->name('update');
    Route::post('{cuento}', 'PaginaController@store')->name('store');
    Route::delete('{pagina}','PaginaController@destroy')->name('delete');
  });

  Route::name('user.')->prefix('usuario/')->group(function () {
    Route::put('cambiarNombre', 'UserController@cambiarNombre')->name('cambiar.nombre');
    Route::put('cambiarEmail', 'UserController@cambiarEmail')->name('cambiar.email');
    Route::put('cambiarPass', 'UserController@cambiarPass')->name('cambiar.pass');
    Route::put('cambiarAvatar', 'UserController@cambiarAvatar')->name('cambiar.avatar');
    Route::put('cambiarUsuario', 'UserController@cambiarUsername')->name('cambiar.username');
    Route::post('peticionRol', 'SolicitudRolController@solicitar')->name('solicitar.rol');
    Route::get('promoverA/escritor/{id}', 'SolicitudRolController@escritor')->name('promover.escritor');
    Route::get('mi-info', 'UserController@informacion');
  });
});

//Cuentos con vue
Route::get('todosLosCuentos', 'CuentoController@cuentos');
