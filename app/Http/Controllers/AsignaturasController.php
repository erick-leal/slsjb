<?php 

namespace App\Http\Controllers; 
 
use Illuminate\Http\Request;
use App\Asignatura;
use App\Profesor;
use App\Sala;
use App\Curso;
use App\Alumno;
use App\Matricula;
use App\Http\Requests\AsignaturaRequest; 

class AsignaturasController extends Controller
{
    
    //public function __construct()
    //{
    //     $this->middleware(['administrador','alumno']);
//
    //}

    public function index(Request $request) 
    {
        $asignaturas = Asignatura::search($request->nombre)->orderBy('codigo','DSC')->paginate(15);
        return view('asignaturas.index')->with('asignaturas',$asignaturas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function create()  
    {
    	$profesores = Profesor::orderBy('nombre','ASC')->get()->pluck('name_and_last','id');
    	$cursos = Curso::orderBy('nombre','ASC')->get()->pluck('name_and_type','id');
    	$salas = Sala::orderBy('nombre','ASC')->pluck('nombre','id');
        $alumnos = Matricula::orderBy('fecha','ASC')->where('estado','Matriculado')->whereYear('created_at', '=', date('Y'))->get()->pluck('rut_alumno','id');
        //$alumnos = Alumno::orderBy('nombre','ASC')->pluck('rut','id');
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
        $asignatura->matriculas()->sync((array)$request->alumnos);
        //$asignatura->alumnos()->sync((array)$request->alumnos);
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
        $asignatura->matriculas;
    	$profesores = Profesor::orderBy('nombre','ASC')->get()->pluck('name_and_last','id');
    	$cursos = Curso::orderBy('nombre','ASC')->get()->pluck('name_and_type','id');
    	$salas = Sala::orderBy('nombre','ASC')->pluck('nombre','id'); 
        $alumnos = Matricula::orderBy('fecha','ASC')->where('estado','Matriculado')->whereYear('created_at', '=', date('Y'))->get()->pluck('rut_alumno','id'); 

        $mis_alumnos = $asignatura->matriculas->pluck('id')->ToArray();


        return view('asignaturas.edit')->with('asignatura', $asignatura)->with('profesores',$profesores)->with('cursos',$cursos)->with('salas',$salas)->with('alumnos',$alumnos)->with('mis_alumnos',$mis_alumnos);
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
        $asignatura->matriculas()->sync((array)$request->alumnos);
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
