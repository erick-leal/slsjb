<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = "asignaturas";

    protected $fillable = ['nombre', 'horario', 'periodo', 'codigo', 'id_sala', 'id_curso', 'id_curso'];

    public function sala()
    {
    	return $this->belongsTo('App\Sala');
    }

    public function curso()
    {
    	return $this->belongsTo('App\Curso');
    }

    public function profesor()
    {
    	return $this->belongsTo('App\Profesor');
    }

    public function alumnos()
    {
        return $this->belongsToMany('App\Alumno')->withTimestamps();
    }

    public function conductas()
    {
        return $this->hasMany('App\Conducta');
    }

    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }

    public function calificaciones()
    {
        return $this->hasMany('App\Calificacion');
    }

    public function asistencias()
    {
        return $this->hasMany('App\Asistencia');
    }
}
