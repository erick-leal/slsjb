<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asignatura;
use App\Apoderado;
//use App\Http\Requests\CalificacionRequest; 
use App\Evaluacion;
use App\Profesor;   
use Carbon\Carbon;


class CalificacionMasivaController extends Controller
{
    public function agregarNota($id) 
    {
    	$asignatura = Asignatura::find($id);
        $alumnos = Asignatura::find($id)->alumnos;
        $evaluaciones = Asignatura::find($id)->evaluaciones;
        
        return view('calificaciones.agregar')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('evaluaciones',$evaluaciones);
    }
}
