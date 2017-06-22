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

//Vista Principal
Route::get('/home', [
	'as' => '/home',
	'uses' => 'HomeController@index'
]);

//Vista Apoderado//
Route::get('datos-apoderado/alumnos', [
	'as' => '/datos-apoderado/alumnos',
	'uses' => 'DatosApoderadoController@alumnos'
]);

Route::get('datos-apoderado/personal', [
	'as' => '/datos-apoderado/personal',
	'uses' => 'DatosApoderadoController@personal'
]);

Route::get('datos-apoderado/veranotacion/{id}','DatosApoderadoController@verAnotacion');
Route::get('datos-apoderado/asignaturas/{id}/{idalu}','DatosApoderadoController@asignaturas');
Route::get('datos-apoderado/vercalificacion/{id}/{idalu}','DatosApoderadoController@verCalificacion');
// FIN //

//Vista Alumno
Route::get('datos-alumno/conductas', [
	'as' => '/datos-alumno/conductas',
	'uses' => 'DatosAlumnoController@conductas'
]);

Route::get('datos-alumno/calificaciones/{id}','DatosAlumnoController@calificaciones');


Route::get('datos-alumno/asignaturas', [
	'as' => '/datos-alumno/asignaturas',
	'uses' => 'DatosAlumnoController@asignaturas'
]);

Route::get('datos-alumno/personal', [
	'as' => '/datos-alumno/personal',
	'uses' => 'DatosAlumnoController@personal'
]);
// FIN //

//Vista Profesor
Route::get('datos-profesor/asignaturas', [
	'as' => '/datos-alumno/asignaturas',
	'uses' => 'DatosProfesorController@asignaturas'
]); 

Route::get('datos-profesor/personal', [
	'as' => '/datos-profesor/personal',
	'uses' => 'DatosProfesorController@personal'
]);

Route::get('datos-profesor/veranotacion/{id}/{idasi}','DatosProfesorController@verAnotacion');
Route::get('datos-profesor/vercalificacion/{id}','DatosProfesorController@verCalificacion');
// FIN //

//Vista Administrativo
Route::get('datos-administrativo/personal', [
	'as' => '/datos-administrativo/personal',
	'uses' => 'DatosAdministrativoController@personal'
]);
//FIN //

//PDF Matricula 
Route::get('pdfmatricula/{id}','PDFController@pdfmatricula');
Route::get('pdfcalificaciones/{id}','PDFController@pdfCalificaciones');
Route::get('matriculas/reportes','MatriculasReportesController@reportes');


//Mostrar Asignaturas
Route::get('showasignaturascurso/{id}','ShowAsignaturaCursoController@showAsignaturaCurso');

//Mostrar ALumnos x Curso
Route::get('showalumnoscurso/{id}','ShowAlumnosCursoController@showAlumnosCurso');

//Mostrar ALumnos x Asignatura
Route::get('showalumnosasignatura/{id}','ShowAlumnosAsignaturaController@showAlumnosAsignatura');

//Mostrar Eventos x Asignatura
Route::get('showeventosasignatura/{id}','ShowEventosAsignaturaController@showEventosAsignatura');

//Mostrar Calificaciones x Asignatura
Route::get('showcalificacionesasignatura/{id}','ShowCalificacionesAsignaturaController@showCalificacionesAsignatura');
Route::post('savecalificacionesasignatura','ShowCalificacionesAsignaturaController@guardarNotas');

//Agregar anotacion
Route::get('agregar/anotacion/{id}/{idasi}','AgregarAnotacionController@agregarAnotacion');
Route::post('agregar/anotacion','AgregarAnotacionController@guardarAnotacion');

//Agregar calificacion
Route::get('agregar/calificacion/{id}/{idasi}','AgregarCalificacionController@agregarCalificacion');
Route::post('agregar/calificacion','AgregarCalificacionController@guardarCalificacion');

//Modificar calificacion
Route::get('modificar/calificacion/{id}/{idasi}/{idcal}','AgregarCalificacionController@modificarCalificacion');
Route::put('modificar/calificacion/{id}','AgregarCalificacionController@actualizarCalificacion');
Route::patch('modificar/calificacion','AgregarCalificacionController@actualizarCalificacion');

//Agregar calificacion masiva
Route::get('calificaciones/agregar/{id}','CalificacionMasivaController@agregarNota');
Route::post('calificaciones/agregar/{id}','CalificacionMasivaController@guardarNotas');
//Route::post('agregar/calificacion','AgregarCalificacionController@guardarCalificacion');

//Modificar calificacion masiva
//Route::get('modificar/calificacion/{id}/{idasi}/{idcal}','AgregarCalificacionController@modificarCalificacion');
//Route::put('modificar/calificacion/{id}','AgregarCalificacionController@actualizarCalificacion');
//Route::patch('modificar/calificacion','AgregarCalificacionController@actualizarCalificacion');

//Registro y login de profesores
Route::get('profesores/login','Auth\AuthProfesorController@showLoginForm');
Route::post('profesores/login','Auth\AuthProfesorController@login');
Route::get('profesores/logout','Auth\AuthProfesorController@logout');
Route::get('profesores/register', 'Auth\AuthProfesorController@showRegistrationForm');
Route::post('profesores/register', 'Auth\AuthProfesorController@register');
Route::get('profesores/modificar', ['as' => 'profesores.modificar', 'uses' => 'EditarProfesorController@edit']);
Route::put('profesores', ['as' => 'profesores.updateprofesor', 'uses' => 'EditarProfesorController@updateprofesor']);
Route::patch('profesores', 'EditarProfesorController@updateprofesor');
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
Route::put('apoderados', ['as' => 'apoderados.updateapoderado', 'uses' => 'EditarApoderadoController@updateapoderado']);
Route::patch('apoderados', 'EditarApoderadoController@updateapoderado');
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
Route::put('administrativos', ['as' => 'administrativos.updateadministrativo', 'uses' => 'EditarAdministrativoController@updateadministrativo']);
Route::patch('administrativos', 'EditarAdministrativoController@updateadministrativo');
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
Route::get('administradores/modificar', ['as' => 'administradores.modificar', 'uses' => 'EditarAdministradorController@edit']);
Route::put('administradores', ['as' => 'administradores.update', 'uses' => 'EditarAdministradorController@update']);
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
Route::put('alumnos', ['as' => 'alumnos.updatealumno', 'uses' => 'EditarAlumnoController@updatealumno']);
Route::patch('alumnos', 'EditarAlumnoController@updatealumno');
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



	//CRUD Conducta
	Route::resource('conductas','ConductasController');
	Route::delete('conductas/{id}',['as'=>'conductas.destroy','uses'=>'ConductasController@destroy']);

	//CRUD Calificacion
	Route::resource('calificaciones','CalificacionesController');
	Route::delete('calificaciones/{id}',['as'=>'calificaciones.destroy','uses'=>'CalificacionesController@destroy']);

	//CRUD Eventos
	Route::resource('eventos','EventosController');
	Route::delete('eventos/{id}',['as'=>'eventos.destroy','uses'=>'EventosController@destroy']);

	//CRUD Asignatura
	Route::resource('asignaturas','AsignaturasController');
	Route::delete('asignaturas/{id}',['as'=>'asignaturas.destroy','uses'=>'AsignaturasController@destroy']);

	//CRUD Evaluacion
	Route::resource('evaluaciones','EvaluacionesController');
	Route::delete('evaluaciones/{id}',['as'=>'evaluaciones.destroy','uses'=>'EvaluacionesController@destroy']);

	
