<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = "notas";

    protected $fillable = ['nota', 'id_evaluacion',  'id_matricula' ];

    public function evaluacion()
    { 
    	return $this->belongsTo(Evaluacion::class, 'id_evaluacion', 'id');
    }

   
    public function matricula()
    {
    	return $this->belongsTo(Matricula::class, 'id_matricula', 'id');
    }

}
