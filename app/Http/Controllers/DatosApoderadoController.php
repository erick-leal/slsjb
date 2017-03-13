<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use Carbon\Carbon;
use App\Apoderado;

class DatosApoderadoController extends Controller
{

	public function personal()
    {
    	$apoderado = Apoderado::find(auth('apoderado')->user()->id);
    	return view('datos-apoderado.personal')->with('apoderado',$apoderado);
    }

    public function alumnos()
    {	
    	 $alumnos = Alumno::where('id_apoderado',auth('apoderado')->user()->id)->get();	 
    	 return view('datos-apoderado.alumnos')->with('alumnos',$alumnos);
    }

    public function verAnotacion($id)
    {
    	$alumno = Alumno::find($id);
    	$mis_anotaciones = $alumno->conductas->all(); 
    	return view('datos-apoderado.veranotacion')->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones);
    }

    public function verCalificacion($id)
    {
    	$alumno = Alumno::find($id);
    	$mis_calificaciones = $alumno->calificaciones->all(); 
    	return view('datos-apoderado.vercalificacion')->with('alumno',$alumno)->with('mis_calificaciones',$mis_calificaciones);
    }

}
