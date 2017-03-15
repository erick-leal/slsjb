<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administrativo;
use Carbon\Carbon;

class DatosAdministrativoController extends Controller
{
    public function personal()
    {
    	$administrativo = Administrativo::find(auth('administrativo')->user()->id);
        $administrativo->cargo;
    	return view('datos-administrativo.personal')->with('administrativo',$administrativo);
    }
}
