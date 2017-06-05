<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = "evaluaciones";

    protected $fillable = ['nota', 'nombre', 'id_alumno',  'id_asignatura', ];

    public function alumno()
    { 
    	return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    }

   
    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id');
    }

}
