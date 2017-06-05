<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apoderado;
use App\Http\Requests\ApoderadoRequest; 
use Illuminate\Support\Facades\Input;

class ApoderadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apoderados = Apoderado::search($request->nombre)->orderBy('apellido_paterno','ASC')->paginate(5);
        return view('apoderados.index')->with('apoderados',$apoderados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apoderados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApoderadoRequest $request)
    {
        //Manipulacion de Imagenes
        if ($request->file('foto'))
        {    
            $file = $request->file('foto');
            $name = 'liceosanjuanbautista_'. time(). '.' .$file->getClientOriginalExtension();
            $path = public_path(). '/imagenes/apoderados';
            $file->move($path, $name);
        }

        $apoderado = new Apoderado($request->all());
        $apoderado->save();
        flash('Apoderado ' .$apoderado->nombre.' agregado exitosamente!','success');
        return redirect()->route('apoderados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apoderado = Apoderado::find($id);
        return view('apoderados.show')->with('apoderado',$apoderado); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apoderado = Apoderado::find($id);
        return view('apoderados.edit')->with('apoderado', $apoderado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApoderadoRequest $request, $id)
    {
        $apoderado = Apoderado::find($id);
        $apoderado->fill($request->all());
        
        if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/apoderados',$file->getClientOriginalName());
            $apoderado->foto=$file->getClientOriginalName();
        }

        $apoderado->save();
        flash('Apoderado ' .$apoderado->nombre.' editado exitosamente!','warning');
        return redirect()->route('apoderados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apoderado=Apoderado::findOrFail($id);
        $apoderado->delete();
        flash('Apoderado eliminado exitosamente!','danger');
        return redirect()->route('apoderados.index');
    }
}
