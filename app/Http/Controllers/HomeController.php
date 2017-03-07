<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Noticia;
use App\Alumno;
use App\Profesor;
use App\Apoderado;
use App\Administrativo;

class HomeController extends Controller
{
    
    public function index()
    {  
        $cantidadAlumnos = Alumno::count();
        $cantidadApoderados = Apoderado::count();
        $cantidadAdministrativos = Administrativo::count();
        $cantidadProfesores = Profesor::count();

        $noticias = Noticia::orderBy('id','DSC')->paginate(4);
        $noticias->each(function($noticias){
            $noticias->administrativo;
        });
        return view('home')->with('noticias',$noticias)->with('cantidadAlumnos',$cantidadAlumnos)->with('cantidadApoderados',$cantidadApoderados)->with('cantidadAdministrativos',$cantidadAdministrativos)->with('cantidadProfesores',$cantidadProfesores);
    }
}
