<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Http\Requests\CalificacionRequest; 
use App\Calificacion;   
use Carbon\Carbon;
use App\Asignatura;
use Laracasts\Flash\Flash;
use App\Profesor;

class AgregarCalificacionController extends Controller
{
    public function agregarCalificacion($id, $idasi)
    {	
    	$alumno = Alumno::find($id);
    	$asignatura = Asignatura::find($idasi);
    	return view('agregar/calificacion')->with('alumno',$alumno)->with('asignatura',$asignatura);
    }

    public function guardarCalificacion(CalificacionRequest $request)
    {
    	$calificacion = new Calificacion($request->all());
    	
        $calificacion->id_profesor = auth('profesor')->user()->id;
        
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->all();

        $calificacion->cantidad = 0;

        if(($calificacion->n1) != null)
        {
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n1 = 0;
        }

        if($calificacion->n2 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n2 = 0;
        }

        if($calificacion->n3 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n3 = 0;
        }

        if($calificacion->n4 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n4 = 0;
        }

        if($calificacion->n5 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n5 = 0;
        }

        if($calificacion->n6 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n6 = 0;
        }

        if($calificacion->n7 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n7 = 0;
        }

        if($calificacion->n8 != null)
        {	
        	$calificacion->cantidad = $calificacion->cantidad + 1;
        }
        else{
        	$calificacion->n8 = 0;
        }

        

        $calificacion->promedio = ($calificacion->n1+$calificacion->n2+$calificacion->n3+$calificacion->n4+$calificacion->n5+$calificacion->n6+$calificacion->n7+$calificacion->n8) / $calificacion->cantidad ;
        
        if($calificacion->examen != null)
        {
        $calificacion->final = ($calificacion->promedio +$calificacion->examen) / 2;
        }


        $calificacion->save();
       
       

        flash('Anotacion agregada exitosamente!','success');
        return view('datos-profesor/asignaturas')->with('calificacion',$calificacion)->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

    public function modificarCalificacion($id, $idasi, $idcal)
    {	
    	$alumno = Alumno::find($id);
    	$asignatura = Asignatura::find($idasi);
    	$calificacion = Calificacion::find($idcal);

        

    	return view('modificar/calificacion')->with('alumno',$alumno)->with('asignatura',$asignatura)->with('calificacion',$calificacion);
    }

    public function actualizarCalificacion(CalificacionRequest $request, $id)
    {
        $calificacion = Calificacion::find($id);

        $calificacion->id_profesor = auth('profesor')->user()->id;
        
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->all();
        
        $calificacion->n1 = $request->n1;
        $calificacion->n2 = $request->n2;
        $calificacion->n3 = $request->n3;
        $calificacion->n4 = $request->n4;
        $calificacion->n5 = $request->n5;
        $calificacion->n6 = $request->n6;
        $calificacion->n7 = $request->n7;
        $calificacion->n8 = $request->n8;


        $calificacion->cantidad = 0;

        if($calificacion->n1 != 0)
        {
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
        

        if($calificacion->n2 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
       

        if($calificacion->n3 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
       

        if($calificacion->n4 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
        

        if($calificacion->n5 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
        

        if($calificacion->n6 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
        

        if($calificacion->n7 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }
        

        if($calificacion->n8 != 0)
        {   
            $calificacion->cantidad = $calificacion->cantidad + 1;
        }

        
        $calificacion->examen = $request->examen;
        
        $calificacion->promedio = ($calificacion->n1+$calificacion->n2+$calificacion->n3+$calificacion->n4+$calificacion->n5+$calificacion->n6+$calificacion->n7+$calificacion->n8) / $calificacion->cantidad ;
        
        if($calificacion->examen != 0)
        {
        $calificacion->final = ($calificacion->promedio +$calificacion->examen) / 2;
        }
        
        $calificacion->save();


        flash('Calificaciones modificadas exitosamente!','success');
        return view('datos-profesor/asignaturas')->with('calificacion',$calificacion)->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

}
