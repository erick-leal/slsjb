<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Administrativo;
use App\Cargo;
use App\Http\Requests;
use App\Http\Requests\AdministrativoRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class EditarAdministrativoController extends Controller
{
      public function edit()
	{
		$administrativo = Administrativo::find(auth('administrativo')->user()->id);
		return view('administrativos.modificar')->with('administrativo', $administrativo);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function updateadministrativo(AdministrativoRequest $request)
	{
		$administrativo= Administrativo::find(auth('administrativo')->user()->id);
		$administrativo->fill($request->all());

		if(Input::hasFile('foto')){
            $file=Input::file('foto');
            $file->move(public_path().'/imagenes/administrativos',$file->getClientOriginalName());
            $administrativo->foto=$file->getClientOriginalName();
        }

		$administrativo->save();
		Flash::success("Se ha actualizado el Administrativo " . $administrativo->nombre);
		return redirect('home');
	}

}