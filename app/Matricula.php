<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = "matriculas";

    protected $fillable = ['estado', 'monto', 'fecha', 'id_alumno'];

    public function alumno()
    {
    	return $this->belongsTo('App\Alumno');
    }
}
