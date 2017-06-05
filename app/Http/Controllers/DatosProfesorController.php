<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Profesor;
use App\Asignatura;
use App\Alumno;
use DB;

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
    	$mis_anotaciones = $alumno->conductas->all(); 
    	
    	return view('datos-profesor.veranotacion')->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones)->with('asignatura',$asignatura);
    }

    public function verCalificacion($id, $idasi)
    {
        $alumno = Alumno::find($id);
        $asignatura = Asignatura::find($idasi); 
        //$mis_notas = $alumno->calificaciones;

        $mis_notas = DB::table('calificaciones as cal')
            ->join('alumnos as a', 'cal.id_alumno', '=', 'a.id')
            ->join('asignaturas as asi', 'cal.id_asignatura', '=', 'asi.id')
            ->select('cal.id', 'cal.n1', 'cal.n2', 'cal.n3', 'cal.n4', 'cal.n5', 'cal.n6', 'cal.n7', 'cal.n8',  'cal.promedio', 'cal.examen', 'cal.final', 'cal.observacion', 'cal.id_alumno',  'cal.id_asignatura')
            ->where('cal.id','<>',null)
            ->where('cal.id_alumno',$id)
            ->where('cal.id_asignatura',$idasi)
            ->get();   

          
        
        return view('datos-profesor.vercalificacion', ["mis_notas" => $mis_notas, "alumno" => $alumno, "asignatura" => $asignatura]);
        
        //return view('datos-profesor.vercalificacion')->with('alumno',$alumno)->with('mis_notas',$mis_notas)->with('asignatura',$asignatura);
    }

}
