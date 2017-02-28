<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Authenticatable
{
    protected $table = "profesores";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'edad', 'direccion'];
 
    protected $hidden = ['password', 'remember_token'];

    public function asignaturas()
    {
    	return $this->hasMany('App\Asignatura');
    }

    public function eventos()
    {
    	return $this->hasMany('App\Evento');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
