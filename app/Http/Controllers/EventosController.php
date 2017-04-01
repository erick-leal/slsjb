<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Profesor;
use App\Http\Requests\EventoRequest; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\Asignatura;


class EventosController extends Controller
{
    
    public function index(Request $request)
    {   
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_eventos = $profesor->eventos->all();
        return view('eventos.index')->with('mis_eventos',$mis_eventos)->with('profesor',$profesor)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->pluck('nombre','id');
        return view('eventos.create')->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventoRequest $request) 
    {
        $evento =  new Evento($request->all());
        $evento->id_profesor = auth('profesor')->user()->id;
        $evento->asignatura;
        $evento->save();   
        flash('Evento agregado exitosamente!','success');
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.show')->with('evento',$evento);    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
        $profesor = Profesor::find(auth('profesor')->user()->id);
        $mis_asignaturas = $profesor->asignaturas->pluck('nombre','id');
        return view('eventos.edit')->with('evento', $evento)->with('profesor',$profesor)->with('mis_asignaturas',$mis_asignaturas);
    }

   
    public function update(EventoRequest $request, $id)
    {
        $evento = Evento::find($id);
        $evento->fill($request->all());
        $evento->save();
        flash('Evento editado exitosamente!','warning');
        return redirect()->route('eventos.index');
    }

  
    public function destroy($id)
    {
        $evento=Evento::findOrFail($id);
        $evento->delete();
        flash('Evento eliminado exitosamente!','danger');
        return redirect()->route('eventos.index');
    }
}
