<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Administrador;
use App\Http\Requests;
use App\Http\Requests\AdministradorRequest;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Input;

class EditarAdministradorController extends Controller
{
      public function edit()
	{
		$administrador = Administrador::find(auth('administrador')->user()->id);
		return view('administradores.modificar')->with('administrador', $administrador);
	}
	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	public function update(AdministradorRequest $request)
	{
		$administrador= Administrador::find(auth('administrador')->user()->id);
		$administrador->fill($request->all());
		$administrador->save();
		Flash::success("Se ha actualizado el Administrador " . $administrador->nombre);
		return redirect('home');
	}

}