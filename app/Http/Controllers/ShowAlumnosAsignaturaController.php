<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Alumno;
use App\Conducta;

class ShowAlumnosAsignaturaController extends Controller
{
    public function showAlumnosAsignatura($id, Request $request)
    {
    	$asignatura = Asignatura::find($id);
        $alumnos = Asignatura::find($id)->alumnos;
  
        foreach ($alumnos as $alumno){      
        }
        
        return view('showalumnosasignatura')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
