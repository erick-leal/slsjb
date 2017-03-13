<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Asignatura;
use App\Calificacion;
use App\Alumno;

class ShowCalificacionesAsignaturaController extends Controller
{
	public function showCalificacionesAsignatura($id)
    {
    	$asignatura = Asignatura::find($id);
        $alumnos = Asignatura::find($id)->alumnos;
  		$mis_notas = $asignatura->calificaciones->all();
  		
               
        return view('showcalificacionesasignatura')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('mis_notas',$mis_notas);
    }    
}
