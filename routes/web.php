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

Route::get('/home', 'HomeController@index');

//Registro y login de profesores
Route::get('profesores/login','Auth\AuthProfesorController@showLoginForm');
Route::post('profesores/login','Auth\AuthProfesorController@login');
Route::get('profesores/logout','Auth\AuthProfesorController@logout');
Route::get('profesores/register', 'Auth\AuthProfesorController@showRegistrationForm');
Route::post('profesores/register', 'Auth\AuthProfesorController@register');
//Route::get('profesores/editar', [
//    'as' => 'profesores.edit', 'uses' => 'EditarApoderadoController@edit'
//]);
//Route::put('profesores', [
//    'as' => 'profesores.update', 'uses' => 'EditarApoderadoController@update'
//]);
//
//Route::patch('profesores', 'EditarApoderadoController@update');

//Login general
Route::get('login', function(){
    return view('login');
});

//CRUD Curso
Route::resource('cursos','CursosController');
Route::delete('cursos/{id}',['as'=>'cursos.destroy','uses'=>'CursosController@destroy']);

//CRUD Profesor
Route::resource('profesores','ProfesoresController');
Route::delete('profesores/{id}',['as'=>'profesores.destroy','uses'=>'ProfesoresController@destroy']);

//CRUD Cargos
Route::resource('cargos','CargosController');
Route::delete('cargos/{id}',['as'=>'cargos.destroy','uses'=>'CargosController@destroy']);


	
