<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Profesor;
use App\Http\Requests;
use App\Http\Requests\ProfesorRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class EditarProfesorController extends Controller
{
      public function edit()
	{
		$profesor = Profesor::find(auth('profesor')->user()->id);
		return view('profesores.modificar')->with('profesor', $profesor);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function updateprofesor(ProfesorRequest $request)
	{
		$profesor = Profesor::find(auth('profesor')->user()->id);
		$profesor->fill($request->all());

		if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/profesores',$file->getClientOriginalName());
            $profesor->foto=$file->getClientOriginalName();
        }

		$profesor->save();
		Flash::success("Se ha actualizado el Profesor " . $profesor->nombre);
		return redirect('home');
	}

}