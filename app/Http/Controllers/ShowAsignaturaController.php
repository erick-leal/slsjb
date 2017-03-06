<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Asignatura;

class ShowAsignaturaController extends Controller
{
    public function showAsignatura($id)
    {
    	$curso = Curso::find($id);
        $asignaturas = Curso::find($id)->asignaturas;
        foreach ($asignaturas as $asignatura){      
        }
        return view('showasignaturas')->with('asignaturas',$asignaturas)->with('curso',$curso);
    }
}
