<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model 
{
    protected $table = "evaluaciones";

    protected $fillable = [ 'nombre', 'contenido', 'id_profesor',  'id_asignatura' ];

    public function profesor()
    { 
    	return $this->belongsTo('App\Profesor','id_profesor');
    }

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota','id_evaluacion');
    }

}
