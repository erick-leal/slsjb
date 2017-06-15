<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Profesor;
use App\Http\Requests\ProfesorRequest; 
use Illuminate\Support\Facades\Input;


class ProfesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profesores = Profesor::search($request->nombre)->orderBy('created_at','DSC')->paginate(15);
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
    public function store(ProfesorRequest $request)
    {
        //Manipulacion de Imagenes
        if ($request->file('foto'))
        {    
            $file = $request->file('foto');
            $name = 'liceosanjuanbautista_'. time(). '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/imagenes/profesores';
            $file->move($path, $name);
        }
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
        $profesor = Profesor::find($id);
        return view('profesores.show')->with('profesor',$profesor); 
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
    public function update(ProfesorRequest $request, $id)
    {
        $profesor = Profesor::find($id);
        $profesor->fill($request->all());

        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/profesores',$file->getClientOriginalName());
            $profesor->foto=$file->getClientOriginalName();
        }

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
