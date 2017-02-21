<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = "asistencias";

    protected $fillable = ['asiste', 'fecha', 'id_alumno', 'id_asignatura', 'id_apoderado'];

    public function alumno()
    {
        return $this->belongsTo('App\Alumno','id_alumno');
    }
    
     public function apoderado()
    {
        return $this->belongsTo('App\Apoderado','id_apoderado');
    }

    public function asignatura()
    {
        return $this->belongsTo('App\Asignatura','id_asignatura');
    }
}
