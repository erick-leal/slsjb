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

//PDF Matricula
Route::get('pdf/{id}','PDFController@pdfmatricula');

//Mostrar Asignaturas
Route::get('showasignaturas/{id}','ShowAsignaturaController@showAsignatura');

//Mostrar ALumnos
Route::get('showalumnos/{id}','ShowAlumnosController@showAlumnos');

//Registro y login de profesores
Route::get('profesores/login','Auth\AuthProfesorController@showLoginForm');
Route::post('profesores/login','Auth\AuthProfesorController@login');
Route::get('profesores/logout','Auth\AuthProfesorController@logout');
Route::get('profesores/register', 'Auth\AuthProfesorController@showRegistrationForm');
Route::post('profesores/register', 'Auth\AuthProfesorController@register');
Route::get('profesores/modificar', ['as' => 'profesores.modificar', 'uses' => 'EditarProfesorController@edit']);
Route::put('profesores', ['as' => 'profesores.update', 'uses' => 'EditarProfesorController@update']);
Route::patch('profesores', 'EditarProfesorController@update');
//Resetear Password Profesores
Route::post('profesor-auth/passwords/email',['as' => 'password.request','uses' => 'ProfesorAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('profesor-auth/passwords/reset','ProfesorAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('profesor-auth/passwords/reset',['as' => 'password.reset','uses'=>'ProfesorAuth\ResetPasswordController@reset']);
Route::get('profesor-auth/passwords/reset/{token}','ProfesorAuth\ResetPasswordController@showResetForm');

//Registro y login de apoderados
Route::get('apoderados/login','Auth\AuthApoderadoController@showLoginForm');
Route::post('apoderados/login','Auth\AuthApoderadoController@login');
Route::get('apoderados/logout','Auth\AuthApoderadoController@logout');
Route::get('apoderados/register', 'Auth\AuthApoderadoController@showRegistrationForm');
Route::post('apoderados/register', 'Auth\AuthApoderadoController@register');
Route::get('apoderados/modificar', ['as' => 'apoderados.modificar', 'uses' => 'EditarApoderadoController@edit']);
Route::put('apoderados', ['as' => 'apoderados.update', 'uses' => 'EditarApoderadoController@update']);
Route::patch('apoderados', 'EditarApoderadoController@update');
//Resetear Password Apoderados
Route::post('apoderado-auth/passwords/email',['as' => 'password.request','uses' => 'ApoderadoAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('apoderado-auth/passwords/reset','ApoderadoAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('apoderado-auth/passwords/reset',['as' => 'password.reset','uses'=>'ApoderadoAuth\ResetPasswordController@reset']);
Route::get('apoderado-auth/passwords/reset/{token}','ApoderadoAuth\ResetPasswordController@showResetForm');

//Registro y login de administrativos
Route::get('administrativos/login','Auth\AuthAdministrativoController@showLoginForm');
Route::post('administrativos/login','Auth\AuthAdministrativoController@login');
Route::get('administrativos/logout','Auth\AuthAdministrativoController@logout');
Route::get('administrativos/register', 'Auth\AuthAdministrativoController@showRegistrationForm');
Route::post('administrativos/register', 'Auth\AuthAdministrativoController@register');
Route::get('administrativos/modificar', ['as' => 'administrativos.modificar', 'uses' => 'EditarAdministrativoController@edit']);
Route::put('administrativos', ['as' => 'administrativos.update', 'uses' => 'EditarAdministrativoController@update']);
Route::patch('administrativos', 'EditarAdministrativoController@update');
//Resetear Password Administrativos
Route::post('administrativo-auth/passwords/email',['as' => 'password.request','uses' => 'AdministrativoAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('administrativo-auth/passwords/reset','AdministrativoAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('administrativo-auth/passwords/reset',['as' => 'password.reset','uses'=>'AdministrativoAuth\ResetPasswordController@reset']);
Route::get('administrativo-auth/passwords/reset/{token}','AdministrativoAuth\ResetPasswordController@showResetForm');

//Registro y login de administradores
Route::get('administradores/login','Auth\AuthAdministradorController@showLoginForm');
Route::post('administradores/login','Auth\AuthAdministradorController@login');
Route::get('administradores/logout','Auth\AuthAdministradorController@logout');
Route::get('administradores/register', 'Auth\AuthAdministradorController@showRegistrationForm');
Route::post('administradores/register', 'Auth\AuthAdministradorController@register');
Route::get('administradores/modificar', ['as' => 'administrador.modificar', 'uses' => 'EditarAdministradorController@edit']);
Route::put('administradores', ['as' => 'administrador.update', 'uses' => 'EditarAdministradorController@update']);
Route::patch('administradores', 'EditarAdministradorController@update');
//Resetear Password Administrativos
Route::post('administrador-auth/passwords/email',['as' => 'password.request','uses' => 'AdministradorAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('administrador-auth/passwords/reset','AdministradorAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('administrador-auth/passwords/reset',['as' => 'password.reset','uses'=>'AdministradorAuth\ResetPasswordController@reset']);
Route::get('administrador-auth/passwords/reset/{token}','AdministradorAuth\ResetPasswordController@showResetForm');

//Registro y login de alumnos
Route::get('alumnos/login','Auth\AuthAlumnoController@showLoginForm');
Route::post('alumnos/login','Auth\AuthAlumnoController@login');
Route::get('alumnos/logout','Auth\AuthAlumnoController@logout');
Route::get('alumnos/register', 'Auth\AuthAlumnoController@showRegistrationForm');
Route::post('alumnos/register', 'Auth\AuthAlumnoController@register');
Route::get('alumnos/modificar', ['as' => 'alumnos.modificar', 'uses' => 'EditarAlumnoController@edit']);
Route::put('alumnos', ['as' => 'alumnos.update', 'uses' => 'EditarAlumnoController@update']);
Route::patch('alumnos', 'EditarAlumnoController@update');
//Resetear Password Alumnos
Route::post('alumno-auth/passwords/email',['as' => 'password.request','uses' => 'AlumnoAuth\ForgotPasswordController@sendResetLinkEmail']);
Route::get('alumno-auth/passwords/reset','AlumnoAuth\ForgotPasswordController@showLinkRequestForm');
Route::post('alumno-auth/passwords/reset',['as' => 'password.reset','uses'=>'AlumnoAuth\ResetPasswordController@reset']);
Route::get('alumno-auth/passwords/reset/{token}','AlumnoAuth\ResetPasswordController@showResetForm');

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

//CRUD Matricula
Route::resource('matriculas','MatriculasController');
Route::delete('matriculas/{id}',['as'=>'matriculas.destroy','uses'=>'MatriculasController@destroy']);

//CRUD Asignatura
Route::resource('asignaturas','AsignaturasController');
Route::delete('asignaturas/{id}',['as'=>'asignaturas.destroy','uses'=>'AsignaturasController@destroy']);

//CRUD Conducta
Route::resource('conductas','ConductasController');
Route::delete('conductas/{id}',['as'=>'conductas.destroy','uses'=>'ConductasController@destroy']);