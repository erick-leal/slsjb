<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Matricula;
use App\Alumno;
use App\Http\Requests\MatriculaRequest; 
use Carbon\Carbon;

class PDFController extends Controller
{
    public function pdfmatricula($id)
    {	
    	$matricula = Matricula::find($id);
    	$pdf = PDF::loadView('pdf',compact('matricula'));
    	return $pdf->stream('matricula.pdf');
    }
}
