<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;
use DB;
use App\Matricula;
  
class ShowAlumnosCursoController extends Controller
{
    public function showAlumnosCurso($id, Request $request)
    {
    	$curso = Curso::find($id);

        //$alumnos = Matricula::where('id_curso',$id)->get();

    	$alumnos = DB::table('alumnos')
    	->select('alumnos.*')
		->join( 'matriculas', 'alumnos.id', '=', 'matriculas.id_alumno' )
		->where('matriculas.id_curso',$id)
		->orderBy('alumnos.apellido_paterno', 'asc')
		->get();
        
        return view('showalumnoscurso')->with('alumnos',$alumnos)->with('curso',$curso)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
