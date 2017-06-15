<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Asignatura;
use App\Alumno;
use App\Evaluacion;
use App\Matricula;

class ShowCalificacionesAsignaturaController extends Controller
{
	public function showCalificacionesAsignatura($id)
    {
    	$asignatura = Asignatura::find($id);
        $alumnos = $asignatura->matriculas;
        $evaluaciones = $asignatura->evaluaciones;
  		
              
        return view('showcalificacionesasignatura')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('evaluaciones',$evaluaciones);
    }    
}
