<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Apoderado extends Authenticatable
{
    protected $table = "apoderados";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'edad', 'direccion'];
 
    protected $hidden = ['password', 'remember_token'];

    public function alumnos()
    {
    	return $this->hasMany('App\Alumno');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
