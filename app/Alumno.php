<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Authenticatable
{
    protected $table = "alumnos";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'edad', 'direccion', 'id_curso', 'id_apoderado'];
 
    protected $hidden = ['password', 'remember_token'];

    public function curso()
    {
    	return $this->belongsTo('App\Curso');
    }

    public function apoderado()
    {
    	return $this->belongsTo('App\Apoderado');
    }

    public function matriculas()
    {
        return $this->hasMany('App\Matricula');
    }

    public function asiganturas()
    {
        return $this->belongsToMany('App\Asignatura');
    }

    public function conductas()
    {
        return $this->hasMany('App\Conducta');
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
