<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use App\Sala;
use App\Curso;
use App\Profesor;

class Asignatura extends Model
{
    protected $table = "asignaturas";

    protected $fillable = ['nombre', 'horario', 'periodo', 'codigo', 'id_sala', 'id_curso', 'id_profesor'];

    public function sala()
    {
    	return $this->belongsTo(Sala::class,'id_sala','id');
    }

    public function curso()
    {
    	return $this->belongsTo(Curso::class,'id_curso','id');
    }

    public function profesor()
    {
    	return $this->belongsTo(Profesor::class,'id_profesor','id');
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

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
