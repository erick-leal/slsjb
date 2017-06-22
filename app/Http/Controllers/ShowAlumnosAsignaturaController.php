<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Alumno;
use App\Conducta;
use DB;

class ShowAlumnosAsignaturaController extends Controller
{
    public function showAlumnosAsignatura($id, Request $request)
    {
    	$asignatura = Asignatura::find($id);
        //$alumnos = Asignatura::find($id)->matriculas;

    	$alumnos = DB::table('alumnos')
		->join( 'matriculas', 'alumnos.id', '=', 'matriculas.id_alumno' )
		->join( 'asignatura_matricula', 'matriculas.id', '=', 'asignatura_matricula.matricula_id' )
		->where('asignatura_matricula.asignatura_id', '=', $id )
		->orderBy('alumnos.apellido_paterno', 'asc')
		->get();

  		


       
        
        return view('showalumnosasignatura')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
