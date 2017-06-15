<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;
use App\Matricula;
 
class ShowAlumnosCursoController extends Controller
{
    public function showAlumnosCurso($id, Request $request)
    {
    	$curso = Curso::find($id);
        $alumnos = Matricula::where('id_curso',$id)->get();

        
        return view('showalumnoscurso')->with('alumnos',$alumnos)->with('curso',$curso)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
