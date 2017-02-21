<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    protected $table = "salas";

    protected $fillable = ['nombre', 'capacidad', 'ubicacion'];

    public function asignaturas()
    {
    	return $this->hasMany('App\Asignatura');
    }
}
