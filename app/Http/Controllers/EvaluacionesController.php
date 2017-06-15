<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Asignatura;
use App\Evaluacion;
use App\Profesor;
use App\Http\Requests\EvaluacionRequest; 
use DB;
use Carbon\Carbon;

class EvaluacionesController extends Controller
{
    public function index(Request $request)
    {   
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_evaluaciones = $profesor->evaluaciones->all();
        return view('evaluaciones.index')->with('mis_evaluaciones',$mis_evaluaciones)->with('profesor',$profesor)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
        $profesor = Profesor::find(auth('profesor')->user()->id); 
        $mis_asignaturas = $profesor->asignaturas->pluck('name_format','id');
        return view('evaluaciones.create')->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EvaluacionRequest $request) 
    {
        $evaluacion =  new Evaluacion($request->all());
        $evaluacion->id_profesor = auth('profesor')->user()->id;
        $evaluacion->asignatura;
        $evaluacion->fecha = Carbon::now();
        $evaluacion->save();   
        flash('Evaluacion agregada exitosamente!','success');
        return redirect()->route('evaluaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluacion = Evaluacion::find($id);
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->pluck('nombre','id');
        return view('evaluaciones.edit')->with('evaluacion', $evaluacion)->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

   
    public function update(EvaluacionRequest $request, $id)
    {
        $evaluacion = Evaluacion::find($id);
        $evaluacion->fill($request->all());
        $evaluacion->fecha = Carbon::now();
        $evaluacion->save();
        flash('Evaluacion editada exitosamente!','warning');
        return redirect()->route('evaluaciones.index');
    }

  
    public function destroy($id)
    {
        $evaluacion=Evaluacion::findOrFail($id);
        $evaluacion->delete();
        flash('Evaluacion eliminada exitosamente!','danger');
        return redirect()->route('evaluaciones.index');
    }
}
