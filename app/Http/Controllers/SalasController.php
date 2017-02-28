<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;
use App\Http\Requests\SalaRequest; 

class SalasController extends Controller
{
    
    public function index(Request $request)
    {
        $salas = Sala::search($request->nombre)->orderBy('id','ASC')->paginate(5);
        return view('salas.index')->with('salas',$salas)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalaRequest $request)
    {
        $sala =  new Sala($request->all());
        $sala->save();
        flash('Sala ' .$sala->nombre.' agregado exitosamente!','success');
        return redirect()->route('salas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::find($id);
        return view('salas.edit')->with('sala', $sala);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalaRequest $request, $id)
    {
        $sala = Sala::find($id);
        $sala->nombre = $request->nombre;
        $sala->capacidad = $request->capacidad;
        $sala->ubicacion = $request->ubicacion;
        $sala->save();
        flash('Sala ' .$sala->nombre.' editado exitosamente!','warning');
        return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala=Sala::findOrFail($id);
        $sala->delete();
        flash('Sala eliminado exitosamente!','danger');
        return redirect()->route('salas.index');
    }
}
