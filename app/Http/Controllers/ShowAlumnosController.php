<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Alumno;

class ShowAlumnosController extends Controller
{
    public function showAlumnos($id)
    {
    	$curso = Curso::find($id);
        $alumnos = Curso::find($id)->alumnos;
        $alumno = Alumno::find($id);
        foreach ($alumnos as $alumno){      
        }
        return view('showalumnos')->with('alumnos',$alumnos)->with('curso',$curso)->with('alumno',$alumno);
    }
}
