<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use Carbon\Carbon;
use App\Apoderado;
use DB;
use App\Matricula;
use App\Conducta;
use App\Asignatura;

class DatosApoderadoController extends Controller
{

	public function personal()
    {
    	$apoderado = Apoderado::find(auth('apoderado')->user()->id);
    	return view('datos-apoderado.personal')->with('apoderado',$apoderado);
    }

    public function alumnos(Request $request)
    {	
    	//$alumnos = Alumno::where('id_apoderado',auth('apoderado')->user()->id)->get();	
        $apoderado = Apoderado::find(auth('apoderado')->user()->id);  

        $alumnos = DB::table('alumnos')
        ->select('alumnos.*','matriculas.*','cursos.nombre as curso','cursos.tipo as tipo')
        ->join( 'matriculas', 'alumnos.id', '=', 'matriculas.id_alumno')
        ->join('cursos','matriculas.id_curso','=','cursos.id')
        ->where('alumnos.id_apoderado', '=', $apoderado->id )
        ->get();

    	return view('datos-apoderado.alumnos')->with('alumnos',$alumnos)->with('apoderado',$apoderado)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function verAnotacion($id)
    {
    	$matricula = Matricula::find($id);
        $alumno = $matricula->alumno;
    	$mis_anotaciones = Conducta::where('id_alumno',$alumno->id)->whereYear('created_at', '=', date('Y'))->get(); 

    	return view('datos-apoderado.veranotacion')->with('matricula',$matricula)->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones);
    }

    public function asignaturas($id, $idalu)
    {   
        $alumno = Alumno::find($idalu);    
        $matricula = Matricula::find($id); 
        $mis_asignaturas = $matricula->asignaturas->all();   
        return view('datos-apoderado.asignaturas')->with('alumno',$alumno)->with('mis_asignaturas',$mis_asignaturas)->with('matricula',$matricula);
    }

    public function verCalificacion($id, $idalu)
    {

        $apoderado = Apoderado::find(auth('apoderado')->user()->id);  
        $alumno = Alumno::find($idalu);    
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
       
     

        return view('datos-apoderado.vercalificacion')->with('alumno',$alumno)->with('matricula',$matricula)->with('asignatura',$asignatura)->with('evaluaciones',$evaluaciones)->with('notas',$notas)->with('apoderado',$apoderado);
    }

}
