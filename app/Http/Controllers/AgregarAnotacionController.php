<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Http\Requests\ConductaRequest; 
use App\Conducta;   
use Carbon\Carbon;
use App\Asignatura;
use Laracasts\Flash\Flash;

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
        $conducta->save();
       
        flash('Anotacion agregada exitosamente!','success');
        return redirect()->route('conductas.index');
    }
}
