<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matricula;
use App\Alumno;

use Carbon\Carbon;

class MatriculasReportesController extends Controller
{
    public function reportes(Request $request)
    {
        $matriculas = Matricula::search($request->fecha)->orderBy('created_at','DSC')->paginate(10);
        $alumnos = $matriculas->count();
        $total = $matriculas->sum('monto');
        return view('matriculas/reportes')->with('matriculas',$matriculas)->with('alumnos',$alumnos)->with('total',$total);
    }

    
} 
