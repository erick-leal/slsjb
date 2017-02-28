<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;
use App\Http\Requests;
use App\Http\Requests\AlumnoRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class EditarAlumnoController extends Controller
{
      public function edit()
	{
		$alumno = Alumno::find(auth('alumno')->user()->id);
		return view('alumnos.modificar')->with('alumno', $alumno);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update(AlumnoRequest $request)
	{
		$alumno= Alumno::find(auth('alumno')->user()->id);
		$alumno->fill($request->all());

		if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/alumnos',$file->getClientOriginalName());
            $alumno->foto=$file->getClientOriginalName();
        }

		$alumno->save();
		Flash::success("Se ha actualizado el Alumno " . $alumno->nombre);
		return redirect('home');
	}

}