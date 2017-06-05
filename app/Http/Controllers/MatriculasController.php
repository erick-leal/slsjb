<?php 

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Matricula;
use App\Alumno;
use App\Http\Requests\MatriculaRequest; 
use Carbon\Carbon;
use App\Curso;


class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matriculas = Matricula::search($request->fecha)->orderBy('created_at','DSC')->paginate(15);
        return view('matriculas.index')->with('matriculas',$matriculas)->with('i', ($request->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        $cursos = Curso::orderBy('nombre','ASC')->get()->pluck('name_and_type','id');
    	$alumnos = Alumno::orderBy('rut','ASC')->pluck('rut','id');
        return view('matriculas.create')->with('alumnos',$alumnos)->with('cursos',$cursos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatriculaRequest $request) 
    {
        $matricula = new Matricula($request->all());
        //$matricula->id_administrativo = auth('administrativo')->user()->id;
        $matricula->fecha = Carbon::now();
        //$matricula->fecha_fin = Carbon::now()->addYear();
        $matricula->save();
        flash('Matricula agregada exitosamente!','success');
        return redirect()->route('matriculas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::find($id);
        return view('matriculas.show',compact('matricula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
    	$matricula = Matricula::find($id);
    	$matricula->alumno;	    
        $cursos = Curso::orderBy('nombre','ASC')->get()->pluck('name_and_type','id');
        return view('matriculas.edit')->with('matricula', $matricula)->with('cursos',$cursos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MatriculaRequest $request, $id)
    {
        $matricula = Matricula::find($id);
        $matricula->fill($request->all());
        $matricula->fecha = Carbon::now();
        $matricula->save();
        flash('Matricula editada exitosamente!','warning');
        return redirect()->route('matriculas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula=Matricula::findOrFail($id);
        $matricula->delete();
        flash('Matricula eliminada exitosamente!','danger');
        return redirect()->route('matriculas.index');
    }

}
