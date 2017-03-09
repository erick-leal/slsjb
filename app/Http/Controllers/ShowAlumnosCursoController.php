<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;

class ShowAlumnosCursoController extends Controller
{
    public function showAlumnosCurso($id, Request $request)
    {
    	$curso = Curso::find($id);
        $alumnos = Curso::find($id)->alumnos;
        $alumno = Alumno::find($id);
        foreach ($alumnos as $alumno){      
        }
        return view('showalumnoscurso')->with('alumnos',$alumnos)->with('curso',$curso)->with('alumno',$alumno)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
