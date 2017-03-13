<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Matricula;
use App\Alumno;
use App\Http\Requests\MatriculaRequest; 
use Carbon\Carbon;
use App\Calificacion;
use App\Asignatura;

class PDFController extends Controller
{
    public function pdfmatricula($id)
    {	
    	$matricula = Matricula::find($id);
    	$pdf = PDF::loadView('pdfmatricula',compact('matricula'));
    	return $pdf->download('matricula.pdf');
    }

    public function pdfCalificaciones($id)
    {	
    	$asignatura = Asignatura::find($id);
        $alumnos = Asignatura::find($id)->alumnos;
  		$mis_notas = $asignatura->calificaciones->all();

    	$pdf = PDF::loadView('pdfcalificaciones',compact('asignatura','alumnos','mis_notas'));
    	return $pdf->download('calificaciones.pdf');
    }
}
