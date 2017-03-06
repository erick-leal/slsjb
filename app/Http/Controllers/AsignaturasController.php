<?php 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Asignatura;
use App\Profesor;
use App\Sala;
use App\Curso;
use App\Alumno;
use App\Http\Requests\AsignaturaRequest; 

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $asignaturas = Asignatura::search($request->nombre)->orderBy('nombre','ASC')->paginate(5);
        return view('asignaturas.index')->with('asignaturas',$asignaturas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  
    {
    	$profesores = Profesor::orderBy('nombre','ASC')->pluck('rut','id');
    	$cursos = Curso::orderBy('nombre','ASC')->pluck('nombre','id');
    	$salas = Sala::orderBy('nombre','ASC')->pluck('nombre','id');
        $alumnos = Alumno::orderBy('nombre','ASC')->pluck('rut','id');
        return view('asignaturas.create')->with('profesores',$profesores)->with('cursos',$cursos)->with('salas',$salas)->with('alumnos',$alumnos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaRequest $request)
    {
        $asignatura = new Asignatura($request->all());
        $asignatura->save();
        $asignatura->alumnos()->sync($request->alumnos);
        flash('Asignatura ' .$asignatura->nombre.' agregada exitosamente!','success');
        return redirect()->route('asignaturas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = Asignatura::find($id);
        return view('asignaturas.show')->with('asignatura',$asignatura);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$asignatura = Asignatura::find($id);
    	$asignatura->profesor;
    	$asignatura->curso;
    	$asignatura->sala;
    	$profesores = Profesor::orderBy('nombre','ASC')->pluck('nombre','id');
    	$cursos = Curso::orderBy('nombre','ASC')->pluck('nombre','id');
    	$salas = Sala::orderBy('nombre','ASC')->pluck('nombre','id');      
        return view('asignaturas.edit')->with('asignatura', $asignatura)->with('profesores',$profesores)->with('cursos',$cursos)->with('salas',$salas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaRequest $request, $id)
    {
        $asignatura = Asignatura::find($id);
        $asignatura->fill($request->all());
        $asignatura->save();
        flash('Asignatura ' .$asignatura->nombre.' editada exitosamente!','warning');
        return redirect()->route('asignaturas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->delete();
        flash('Asignatura eliminada exitosamente!','danger');
        return redirect()->route('asignaturas.index');
    }
}
