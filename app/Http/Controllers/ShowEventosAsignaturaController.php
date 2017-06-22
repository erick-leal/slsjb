<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignatura;
use App\Alumno;
use App\Evento;
use Carbon\Carbon;

class ShowEventosAsignaturaController extends Controller
{

	public function __construct()
	{
		Carbon::setLocale('es');
	}

    public function showEventosAsignatura($id, Request $request)
    {
    	$asignatura = Asignatura::find($id);
        //$eventos = Asignatura::find($id)->eventos;
        $eventos = Evento::where('id_asignatura','=',$asignatura->id)->where('fecha','>',Carbon::now())->get();
        
        
            
        return view('showeventosasignatura')->with('eventos',$eventos)->with('asignatura',$asignatura)->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
