<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificaciones";

    protected $fillable = ['n1', 'n2', 'n3', 'n4', 'n5', 'n6', 'n7', 'n8', 'cantidad', 'promedio', 'examen', 'final', 'observacion', 'id_alumno',  'id_asignatura', 'id_profesor'];

    public function alumno()
    { 
    	return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    }

   
    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    }
}
