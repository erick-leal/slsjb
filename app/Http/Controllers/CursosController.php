<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Http\Requests\CursoRequest; 
use App\Alumno;
use App\Asignatura;
use App\Profesor; 
use App\Matricula;

class CursosController extends Controller 
{
    
   

    public function index(Request $request)
    {
        $cursos = Curso::search($request->nombre)->withCount('matriculas')->withCount('asignaturas')->orderBy('nombre','ASC')->whereYear('created_at', '=', date('Y'))->paginate(20);
        
        return view('cursos.index')->with('cursos',$cursos)->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $profesores = Profesor::orderBy('nombre','ASC')->get()->pluck('name_and_last','id');
        return view('cursos.create')->with('profesores',$profesores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $curso =  new Curso($request->all());
        $curso->save();
        flash('Curso ' .$curso->nombre.' agregado exitosamente!','success');
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $curso = Curso::find($id);
        $asignaturas = Curso::find($id)->asignaturas;
        foreach ($asignaturas as $asignatura){      
        }
        return view('cursos.show')->with('asignaturas',$asignaturas)->with('curso',$curso);    
    }

     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesores = Profesor::orderBy('nombre','ASC')->get()->pluck('name_and_last','id');
        $curso = Curso::find($id);
        return view('cursos.edit')->with('curso', $curso)->with('profesores',$profesores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::find($id);
        $curso->fill($request->all());
        
        $curso->save();
        flash('Curso ' .$curso->nombre.' editado exitosamente!','warning');
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso=Curso::findOrFail($id);
        $curso->delete();
        flash('Curso eliminado exitosamente!','danger');
        return redirect()->route('cursos.index');
    }
}
