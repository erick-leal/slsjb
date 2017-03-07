<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificaciones";

    protected $fillable = ['n1', 'n2', 'n3', 'n4', 'n5', 'n6', 'n7', 'n8', 'cantidad', 'promedio', 'examen', 'final', 'observacion', 'id_alumno', 'id_apoderado', 'id_asignatura', 'id_profesor'];

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

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    }
}
