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

Route::get('/Admin/Usuarios','usuariosController@index');
Route::get('/Admin/Alumnos','AlumnosController@index');
Route::get('/Admin/Semestre','SemestreController@index');
Route::get('/Admin/Reportes','ReportesController@index');

Route::get('/Admin/Alumnos/Alta','AlumnosController@formulario');
Route::post('/Altas/Alumnos/altaAlumno','AlumnosController@store');
Route::get('/Admin/Alumnos/ModBaja','AlumnosController@busqueda');
Route::get('/Admin/Alumnos/Editar/{id_alumno}','AlumnosController@editar');
Route::post('/Modificar/Alumnos/editarAlumno','AlumnosController@editarAlumno');
Route::get('/Admin/Alumnos/Eliminar/{id_alumno}','AlumnosController@eliminar');

Route::get('/Admin/Usuario/Administrativo/Alta','usuariosController@formulario');
Route::get('/Admin/Usuario/Padre/Alta','usuariosController@formularioP');
Route::post('/Altas/Usuario/altaAlumnoAdmin','usuariosController@storeA');
Route::post('/Altas/Usuario/altaAlumnoPadre','usuariosController@storeP');
Route::post('/Altas/Usuario/altaUsuarioHijo','usuariosController@storeH');
Route::get('/Admin/Usuario/ModBaja','usuariosController@busquedaA');
Route::get('/Admin/Usuario/Padre/ModBaja','usuariosController@busquedaP');
Route::get('/Admin/Usuario/Administracion/Editar/{id_usuario}','usuariosController@editarA');
Route::get('/Admin/Usuario/Padre/Editar/{id_usuario}','usuariosController@editarP');
Route::post('/Modificar/Usuario/editarUsuarioA','usuariosController@editarUsuarioA');
Route::post('/Modificar/Usuario/editarUsuarioP','usuariosController@editarUsuarioP');
Route::get('/Admin/Usuario/Administracion/Eliminar/{id_alumno}','usuariosController@eliminarA');

Route::get('/Admin/Semestre/Alta','SemestreController@formulario');
Route::post('/Altas/Semestre/altaSemestre','SemestreController@store');
Route::get('/Admin/Semestre/Baja','SemestreController@finalizar');