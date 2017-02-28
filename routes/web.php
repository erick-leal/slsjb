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
 
//Login general
Route::get('/', function(){
    return view('login');
});
Route::get('/home', function (){
	return view('home');
});


//Registro y login de profesores
Route::get('profesores/login','Auth\AuthProfesorController@showLoginForm');
Route::post('profesores/login','Auth\AuthProfesorController@login');
Route::get('profesores/logout','Auth\AuthProfesorController@logout');
Route::get('profesores/register', 'Auth\AuthProfesorController@showRegistrationForm');
Route::post('profesores/register', 'Auth\AuthProfesorController@register');
Route::get('profesores/modificar', ['as' => 'profesores.modificar', 'uses' => 'EditarProfesorController@edit']);
Route::put('profesores', ['as' => 'profesores.update', 'uses' => 'EditarProfesorController@update']);
Route::patch('profesores', 'EditarProfesorController@update');

//Registro y login de apoderados
Route::get('apoderados/login','Auth\AuthApoderadoController@showLoginForm');
Route::post('apoderados/login','Auth\AuthApoderadoController@login');
Route::get('apoderados/logout','Auth\AuthApoderadoController@logout');
Route::get('apoderados/register', 'Auth\AuthApoderadoController@showRegistrationForm');
Route::post('apoderados/register', 'Auth\AuthApoderadoController@register');
Route::get('apoderados/modificar', ['as' => 'apoderados.modificar', 'uses' => 'EditarApoderadoController@edit']);
Route::put('apoderados', ['as' => 'apoderados.update', 'uses' => 'EditarApoderadoController@update']);
Route::patch('apoderados', 'EditarApoderadoController@update');

//Registro y login de administrativos
Route::get('administrativos/login','Auth\AuthAdministrativoController@showLoginForm');
Route::post('administrativos/login','Auth\AuthAdministrativoController@login');
Route::get('administrativos/logout','Auth\AuthAdministrativoController@logout');
Route::get('administrativos/register', 'Auth\AuthAdministrativoController@showRegistrationForm');
Route::post('administrativos/register', 'Auth\AuthAdministrativoController@register');
Route::get('administrativos/modificar', ['as' => 'administrativos.modificar', 'uses' => 'EditarAdministrativoController@edit']);
Route::put('administrativos', ['as' => 'administrativos.update', 'uses' => 'EditarAdministrativoController@update']);
Route::patch('administrativos', 'EditarAdministrativoController@update');

//Registro y login de alumnos
Route::get('alumnos/login','Auth\AuthAlumnoController@showLoginForm');
Route::post('alumnos/login','Auth\AuthAlumnoController@login');
Route::get('alumnos/logout','Auth\AuthAlumnoController@logout');
Route::get('alumnos/register', 'Auth\AuthAlumnoController@showRegistrationForm');
Route::post('alumnos/register', 'Auth\AuthAlumnoController@register');
Route::get('alumnos/modificar', ['as' => 'alumnos.modificar', 'uses' => 'EditarAlumnoController@edit']);
Route::put('alumnos', ['as' => 'alumnos.update', 'uses' => 'EditarAlumnoController@update']);
Route::patch('alumnos', 'EditarAlumnoController@update');

//CRUD Curso
Route::resource('cursos','CursosController');
Route::delete('cursos/{id}',['as'=>'cursos.destroy','uses'=>'CursosController@destroy']);

//CRUD Profesor
Route::resource('profesores','ProfesoresController');
Route::delete('profesores/{id}',['as'=>'profesores.destroy','uses'=>'ProfesoresController@destroy']);

//CRUD Cargos
Route::resource('cargos','CargosController');
Route::delete('cargos/{id}',['as'=>'cargos.destroy','uses'=>'CargosController@destroy']);

//CRUD Apoderado
Route::resource('apoderados','ApoderadosController');
Route::delete('apoderados/{id}',['as'=>'apoderados.destroy','uses'=>'ApoderadosController@destroy']);

//CRUD Sala
Route::resource('salas','SalasController');
Route::delete('salas/{id}',['as'=>'salas.destroy','uses'=>'SalasController@destroy']);

//CRUD Administrativo
Route::resource('administrativos','AdministrativosController');
Route::delete('administrativos/{id}',['as'=>'administrativos.destroy','uses'=>'AdministrativosController@destroy']);
	
//CRUD Noticia
Route::resource('noticias','NoticiasController');
Route::delete('noticias/{id}',['as'=>'noticias.destroy','uses'=>'NoticiasController@destroy']);

//CRUD Alumno
Route::resource('alumnos','AlumnosController');
Route::delete('alumnos/{id}',['as'=>'alumnos.destroy','uses'=>'AlumnosController@destroy']);