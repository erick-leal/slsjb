<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Asignatura;
use App\Alumno;
use App\Evaluacion;
use App\Matricula; 
use App\Nota;
use App\Http\Requests\NotaRequest; 
use DB;
use Validator;
 
class ShowCalificacionesAsignaturaController extends Controller
{
	public function showCalificacionesAsignatura($id) 
    {
    	$asignatura = Asignatura::find($id);
        //$matriculados = $asignatura->matriculas;
        $evaluaciones = $asignatura->evaluaciones;

        $matriculados = DB::table('matriculas')
        ->select('matriculas.*','alumnos.nombre','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->join( 'alumnos', 'matriculas.id_alumno', '=', 'alumnos.id' )
        ->join( 'asignatura_matricula', 'matriculas.id', '=', 'asignatura_matricula.matricula_id' )
        ->where('asignatura_matricula.asignatura_id', '=', $id )
        ->orderBy('alumnos.apellido_paterno', 'asc')
        ->get();

        

        $notas = array();
        foreach ($asignatura->notas as $nota) {
            if (!isset($notas[$nota->id_matricula])){
                $notas[$nota->id_matricula] = array();
            }

            $notas[$nota->id_matricula][$nota->id_evaluacion] = $nota->nota;
        }
  		              
        return view('showcalificacionesasignatura')
        ->with('matriculados',$matriculados)
        ->with('asignatura',$asignatura)
        ->with('evaluaciones',$evaluaciones)
        ->with('notas',$notas); 
    }

    public function guardarNotas(NotaRequest $request)
    {   

    	$notas = $request->input();

        
       
        foreach ($notas as $nota){
            $nota = Nota::updateOrCreate([
                'id_matricula' => $nota['idMatricula'],
                'id_evaluacion' => $nota['idEvaluacion']
                ], ['nota' => $nota['nota']]);
           
        }


        //responder true or false ? segun se guarda o devolver error
        return response()->json(array('success' => true));
        
    }    
}
