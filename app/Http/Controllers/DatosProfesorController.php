<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;
use App\Asignatura;
use App\Alumno;

class DatosProfesorController extends Controller
{
    public function asignaturas()
    {
    	$profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->all();
        return view('datos-profesor/asignaturas')->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

    public function personal()
    {
    	$profesor = Profesor::find(auth('profesor')->user()->id);
    	return view('datos-profesor.personal')->with('profesor',$profesor);
    }

    public function verAnotacion($id, $idasi)
    {
    	$alumno = Alumno::find($id);
    	$asignatura = Asignatura::find($idasi);
        
       
    	$mis_anotaciones = $asignatura->conductas->all(); 
    	
    	return view('datos-profesor.veranotacion')->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones)->with('asignatura',$asignatura);
    }

}
