<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asignatura;
use App\Evalucacion;
use DB;

class EvaluacionController extends Controller
{
    public function agregarEvaluacion($id, Request $request)
    {	
    	//$asignatura = Asignatura::find($id);
        //$alumnos = Asignatura::find($id)->alumnos;
    	
        $asignatura		= Asignatura::find($id);
		$alumnos 		= $asignatura->alumnos; 
		
		if( count($alumnos) > 0 )
		{
			$data = [];
			foreach( $alumnos as $alumno)
			{
				$data[] =[
					'id_asignatura'	=> $id,
					'id_alumno'		=> $alumno->id,
					'nota'			=> $request->nota
				];
			}
		}
		
		if(count($data) > 0 )
		{
			\DB::table('evaluaciones')->insert($data);
		}

		dd($data);

	//return view('agregar/calificacion')->with('alumno',$alumno)->with('asignatura',$asignatura);
    return view('calificaciones.agregar');
	}

    
}
