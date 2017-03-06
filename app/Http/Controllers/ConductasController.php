<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Alumno;
use App\Asignatura;
use App\Http\Requests\ConductaRequest; 
use App\Conducta;   
use Carbon\Carbon;

class ConductasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conductas = Conducta::orderBy('created_at','DSC')->paginate(5);
        return view('conductas.index')->with('conductas',$conductas);
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
        return view('conductas.create')->with('alumnos',$alumnos)->with('asignaturas',$asignaturas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConductaRequest $request)
    {
        $conducta = new Conducta($request->all());
        $conducta->id_profesor = auth('profesor')->user()->id;
        $conducta->fecha = Carbon::now();
        $conducta->save();
        flash('Anotacion agregada exitosamente!','success');
        return redirect()->route('conductas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conducta = Conducta::find($id);
        return view('conductas.show')->with('conducta',$conducta);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$conducta = Conducta::find($id);
    	
    	$alumnos	= Alumno::orderBy('id','ASC')->pluck('rut','id'); 
        $conducta->alumno; 
    	
    	$asignaturas = Asignatura::orderBy('id','ASC')->pluck('nombre','id'); 
        $conducta->asignatura;   
        return view('conductas.edit')->with('conducta', $conducta)->with('alumnos',$alumnos)->with('asignaturas',$asignaturas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConductaRequest $request, $id)
    {
        $conducta = Conducta::find($id);
        $conducta->fill($request->all());

        $conducta->save();
        flash('Anotacion editada exitosamente!','warning');
        return redirect()->route('conductas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conducta=Conducta::findOrFail($id);
        $conducta->delete();
        flash('Anotacion eliminada exitosamente!','danger');
        return redirect()->route('conductas.index');
    }
}
