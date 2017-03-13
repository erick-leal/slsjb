<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Http\Requests\ConductaRequest; 
use App\Conducta;   
use Carbon\Carbon;
use App\Asignatura;
use Laracasts\Flash\Flash;
use App\Profesor;

class AgregarAnotacionController extends Controller
{
    public function agregarAnotacion($id, $idasi)
    {	
    	$alumno = Alumno::find($id);
    	$asignatura = Asignatura::find($idasi);
    	return view('agregar/anotacion')->with('alumno',$alumno)->with('asignatura',$asignatura);
    }

    public function guardarAnotacion(ConductaRequest $request)
    {
    	$conducta = new Conducta($request->all());
    	
        $conducta->id_profesor = auth('profesor')->user()->id;
        
        $conducta->fecha = Carbon::now();

        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->all();

        $conducta->save();
       
        flash('Anotacion agregada exitosamente!','success');
        return view('datos-profesor/asignaturas')->with('conducta',$conducta)->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }
}
