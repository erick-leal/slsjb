<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;

class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::orderBy('apellido_paterno','ASC')->paginate(5);
        return view('profesores.index')->with('profesores',$profesores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profesor = new Profesor($request->all());
        $profesor->save();
        flash('Profesor ' .$profesor->nombre.' agregado exitosamente!','success');
        return redirect()->route('profesores.index');
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
        $profesor = Profesor::find($id);
        return view('profesores.edit')->with('profesor', $profesor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->rut = $request->rut;
        $profesor->nombre = $request->nombre;
        $profesor->apellido_paterno = $request->apellido_paterno;
        $profesor->apellido_materno = $request->apellido_materno;
        $profesor->email = $request->email;
        $profesor->sexo = $request->sexo;
        $profesor->telefono = $request->telefono;
        $profesor->foto = $request->foto;
        $profesor->fecha_nacimiento = $request->fecha_nacimiento;
        $profesor->edad = $request->edad;
        $profesor->direccion = $request->direccion;
        $profesor->save();
        flash('Profesor ' .$profesor->nombre.' editado exitosamente!','warning');
        return redirect()->route('profesores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profesor=Profesor::findOrFail($id);
        $profesor->delete();
        flash('Profesor eliminado exitosamente!','danger');
        return redirect()->route('profesores.index');
    }
}
