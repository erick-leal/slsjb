<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Alumno;
use App\Asignatura;
use App\Apoderado;
use App\Http\Requests\CalificacionRequest; 
use App\Calificacion;
use App\Profesor;   
use Carbon\Carbon;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $calificaciones = Calificacion::orderBy('created_at','DSC')->paginate(5);
        return view('calificaciones.index')->with('calificaciones',$calificaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
    	$alumnos = Alumno::orderBy('nombre','ASC')->pluck('rut','id');
    	$asignaturas = Asignatura::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('calificaciones.create')->with('alumnos',$alumnos)->with('asignaturas',$asignaturas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalificacionRequest $request)
    {
        $calificacion = new Calificacion($request->all());
        $calificacion->id_profesor = auth('profesor')->user()->id;
        $calificacion->fecha = Carbon::now();
        $calificacion->save();
        flash('Calificacion agregada exitosamente!','success');
        return redirect()->route('calificaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calificacion = Calificacion::find($id);
        return view('calificaciones.show')->with('calificacion',$calificacion);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$calificacion = Calificacion::find($id); 
    	$calificacion->profesor;
    	$alumnos	= Alumno::orderBy('id','ASC')->pluck('rut','id'); 
        $calificacion->alumno; 
    	
    	$asignaturas = Asignatura::orderBy('id','ASC')->pluck('nombre','id'); 
        $calificacion->asignatura;   
        return view('calificaciones.edit')->with('calificacion', $calificacion)->with('alumnos',$alumnos)->with('asignaturas',$asignaturas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalificacionRequest $request, $id)
    {
        $calificacion = Calificacion::find($id);
        $calificacion->fill($request->all());
        $calificacion->save();
        flash('Calificacion editada exitosamente!','warning');
        return redirect()->route('calificaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calificacion=Calificacion::findOrFail($id);
        $calificacion->delete();
        flash('Calificacion eliminada exitosamente!','danger');
        return redirect()->route('calificaciones.index');
    }
}
