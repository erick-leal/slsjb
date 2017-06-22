<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Profesor;
use App\Asignatura;
use App\Alumno;
use DB;
use App\Conducta;

class DatosProfesorController extends Controller
{
    public function asignaturas()
    {
    	$profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = Asignatura::where('id_profesor',$profesor->id)->whereYear('created_at', '=', date('Y'))->get();
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
    	
        $mis_anotaciones = Conducta::where('id_alumno',$alumno->id)->whereYear('created_at', '=', date('Y'))->where('id_asignatura',$asignatura->id)->get(); 
    	
    	return view('datos-profesor.veranotacion')->with('alumno',$alumno)->with('mis_anotaciones',$mis_anotaciones)->with('asignatura',$asignatura);
    }

    public function verCalificacion($id)
    {
        
        $asignatura = Asignatura::find($id);
        $alumnos = $asignatura->matriculas;
        $evaluaciones = $asignatura->evaluaciones;

        

        $notas = array();
        $promedios = array();
        foreach ($asignatura->notas as $nota) {
            if (!isset($notas[$nota->id_matricula])){
                $notas[$nota->id_matricula] = array();
            }

            $notas[$nota->id_matricula][$nota->id_evaluacion] = $nota->nota;
            if (!isset($promedios[$nota->id_matricula]))
            {
                $promedios[$nota->id_matricula]["promedio"] = 0;
                $promedios[$nota->id_matricula]["numero_evaluaciones"] = 0;
            }

            $promedios[$nota->id_matricula]["promedio"] += $nota->nota;
            $promedios[$nota->id_matricula]["numero_evaluaciones"]++;
            
        }

        foreach ($promedios as $key => $value)
        {
            $promedios[$key]["promedio"] /= $promedios[$key]["numero_evaluaciones"];
        }

                      
 
        
        return view('datos-profesor.vercalificacion')->with('alumnos',$alumnos)
        ->with('asignatura',$asignatura)
        ->with('evaluaciones',$evaluaciones)
        ->with('notas',$notas)
        ->with('promedios',$promedios); 
        
        
    }

}
