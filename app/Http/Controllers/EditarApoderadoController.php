<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apoderado;
use App\Http\Requests;
use App\Http\Requests\ApoderadoRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class EditarApoderadoController extends Controller
{
      public function edit()
	{
		$apoderado = Apoderado::find(auth('apoderado')->user()->id);
		return view('apoderados.modificar')->with('apoderado', $apoderado);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update(ApoderadoRequest $request)
	{
		$apoderado = Apoderado::find(auth('apoderado')->user()->id);
		$apoderado->fill($request->all());

		if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/apoderados',$file->getClientOriginalName());
            $apoderado->foto=$file->getClientOriginalName();
        }

		$apoderado->save();
		Flash::success("Se ha actualizado el Apoderado " . $apoderado->nombre);
		return redirect('home');
	}

}