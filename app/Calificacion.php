<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificaciones";

    protected $fillable = ['n1', 'n2', 'n3', 'n4', 'n5', 'promedio', 'examen', 'final', 'observacion', 'id_alumno', 'id_apoderado', 'id_asignatura'];

    public function alumno()
    {
    	return $this->belongsTo('App\Alumno');
    }

    public function apoderado()
    {
    	return $this->belongsTo('App\Apoderado');
    }

    public function asignatura()
    {
    	return $this->belongsTo('App\Asignatura');
    }
}
