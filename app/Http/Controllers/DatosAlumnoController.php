<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use Carbon\Carbon;
use App\Matricula;
use App\Asignatura;
use DB;
use App\Nota;
use App\Conducta;

class DatosAlumnoController extends Controller
{

 
    public function conductas() 
    {  
        $alumno = Alumno::find(auth('alumno')->user()->id); 

        $conductas = Conducta::where('id_alumno',$alumno->id)->orderBy('created_at','DSC')->get();
        
        //$mis_anotaciones = $alumno->conductas->all(); 
        return view('datos-alumno.conductas')->with('alumno',$alumno)->with('conductas',$conductas);
    }

    public function asignaturas()
    {	
    	$alumno = Alumno::find(auth('alumno')->user()->id);
        
        $matricula = Matricula::where('id_alumno','=',$alumno->id)->get()->last();
        
    	$mis_asignaturas = $matricula->asignaturas->all();
    	return view('datos-alumno.asignaturas')->with('alumno',$alumno)->with('mis_asignaturas',$mis_asignaturas)->with('matricula',$matricula);
    }

    public function personal()
    {
    	$alumno = Alumno::find(auth('alumno')->user()->id);
    	$alumno->apoderado;
        $alumno->curso;
    	return view('datos-alumno.personal')->with('alumno',$alumno);
    }

    public function calificaciones($id) 
    {  
        $alumno = Alumno::find(auth('alumno')->user()->id);
        $asignatura = Asignatura::find($id);
        $evaluaciones = $asignatura->evaluaciones;
        $matricula = Matricula::where('id_alumno','=',$alumno->id)->get()->last();

        $notas = array();
        
        foreach ($asignatura->notas as $nota) 
        {
            if (!isset($notas[$nota->id_matricula]))
            {
                $notas[$nota->id_matricula] = array();
            }

            $notas[$nota->id_matricula][$nota->id_evaluacion] = $nota->nota;
        }
       


        return view('datos-alumno.calificaciones')->with('alumno',$alumno)->with('matricula',$matricula)->with('asignatura',$asignatura)->with('evaluaciones',$evaluaciones)->with('notas',$notas);
    }

    //public function eventos() 
    //{  
    //    $mis_eventos = $asignatura->eventos->all(); 
    //    return view('datos-alumno.eventos')->with('alumno',$alumno)->with('mis_eventoses',$mis_eventoses);
    //}

}
