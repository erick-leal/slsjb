<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Curso;
use App\Asignatura;

class ShowAsignaturaCursoController extends Controller
{
    public function showAsignaturaCurso($id)
    {
    	$curso = Curso::find($id);
        $asignaturas = Curso::find($id)->asignaturas;
        foreach ($asignaturas as $asignatura){      
        }
        return view('showasignaturascurso')->with('asignaturas',$asignaturas)->with('curso',$curso);
    }
}
