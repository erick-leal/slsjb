<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use Carbon\Carbon;

class DatosAlumnoController extends Controller
{


    public function conductas() 
    {  
        $alumno = Alumno::find(auth('alumno')->user()->id); 
        $mis_anotaciones = $alumno->conductas->all(); 
        return view('datos-alumno.conductas')->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones);
    }

    public function asignaturas()
    {	
    	 $alumno = Alumno::find(auth('alumno')->user()->id);
    	 $alumno->curso;
    	 $mis_asignaturas = $alumno->asignaturas->all();
    	 return view('datos-alumno.asignaturas')->with('alumno',$alumno)->with('mis_asignaturas',$mis_asignaturas);
    }

    public function personal()
    {
    	$alumno = Alumno::find(auth('alumno')->user()->id);
    	$alumno->apoderado;
        $alumno->curso;
    	return view('datos-alumno.personal')->with('alumno',$alumno);
    }

    public function calificaciones() 
    {  
        $alumno = Alumno::find(auth('alumno')->user()->id);
        $mis_calificaciones = $alumno->calificaciones->all();     
        return view('datos-alumno.calificaciones')->with('alumno',$alumno)->with('mis_calificaciones',$mis_calificaciones);
    }

    //public function eventos() 
    //{  
    //    $mis_eventos = $asignatura->eventos->all(); 
    //    return view('datos-alumno.eventos')->with('alumno',$alumno)->with('mis_eventoses',$mis_eventoses);
    //}

}
