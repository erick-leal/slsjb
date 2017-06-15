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
use App\Matricula;


class CalificacionMasivaController extends Controller
{
    public function agregarNota($id) 
    {
    	$asignatura = Asignatura::find($id);
        //$evaluaciones = Asignatura::find($id)->evaluaciones;

        $alumnos = $asignatura->matriculas;
        
        return view('calificaciones.agregar')->with('alumnos',$alumnos)->with('asignatura',$asignatura);
    }

    public function guardarNotas(Request $request)
    {
    	$listaAlumnos = $request->input('alumnos');
    	$prueba = array();
    	// iterar sobre la lista de alumnos
    	for ($i = 0; $i < count($listaAlumnos); $i++){
    		// array de notas
    		$notas = $request->input('notaalumno' . $listaAlumnos[$i]);
    		// nota del examen
    		//$examen = $request->input('examen' . $listaAlumnos[$i]);
    		// aqui agregar a la base de datos
    		$prueba[] = array(
    			'id_alumno' => $listaAlumnos[$i], 
    			'nota' => $notas,
    			//'examen' => $examen
    			);
    		dd($prueba);
    	}
    	// responder true o false ? segun se guarda o devolver los errores
    	
    }
}
