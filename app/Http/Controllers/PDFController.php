<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Matricula;
use App\Alumno;
use App\Http\Requests\MatriculaRequest; 
use Carbon\Carbon;
use App\Calificacion;
use App\Asignatura;
use DB;
use App\Curso;

class PDFController extends Controller
{
    public function pdfmatricula($id)
    {	
    	$matricula = Matricula::find($id);
    	$pdf = PDF::loadView('pdfmatricula',compact('matricula'));
    	return $pdf->download('matricula.pdf');
    }

    public function pdfCalificaciones($id)
    {	
        $asignatura = Asignatura::find($id);
        $evaluaciones = $asignatura->evaluaciones;

        $alumnos = DB::table('matriculas')
        ->select('matriculas.*','alumnos.nombre','alumnos.apellido_paterno','alumnos.apellido_materno')
        ->join( 'alumnos', 'matriculas.id_alumno', '=', 'alumnos.id' )
        ->join( 'asignatura_matricula', 'matriculas.id', '=', 'asignatura_matricula.matricula_id' )
        ->where('asignatura_matricula.asignatura_id', '=', $id )
        ->orderBy('alumnos.apellido_paterno', 'asc')
        ->get();

        $notas = array();
        $promedios = array();
        foreach ($asignatura->notas as $nota) {
            if (!isset($notas[$nota->id_matricula])){
                $notas[$nota->id_matricula] = array();
            }

            $notas[$nota->id_matricula][$nota->id_evaluacion] = $nota->nota;
            if (!isset($promedios[$nota->id_matricula]))
            {
                $promedios[$nota->id_matricula]["sumatoria"] = 0;
                $promedios[$nota->id_matricula]["numero_evaluaciones"] = 0;
            }

            $promedios[$nota->id_matricula]["sumatoria"] += $nota->nota;
            $promedios[$nota->id_matricula]["numero_evaluaciones"]++;
            
        }

        foreach ($promedios as $key => $value)
        {
            $promedios[$key]["promedio"] = $promedios[$key]["sumatoria"] / $promedios[$key]["numero_evaluaciones"];
        } 

                          

    	$pdf = PDF::loadView('pdfcalificaciones',compact('asignatura','alumnos','evaluaciones','notas','promedios'));
    	return $pdf->stream('calificaciones.pdf');
    }

    public function pdfCursos($id)
    {   
        $curso = Curso::find($id);

        $alumnos = DB::table('alumnos')
        ->select('alumnos.*')
        ->join( 'matriculas', 'alumnos.id', '=', 'matriculas.id_alumno' )
        ->where('matriculas.id_curso',$id)
        ->orderBy('alumnos.apellido_paterno', 'asc')
        ->get();
        


        $pdf = PDF::loadView('pdfcursos',compact('curso','alumnos'));
        return $pdf->download('cursos.pdf');
    }
}
