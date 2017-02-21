<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Curso extends Model
{
	use Sluggable;

	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    protected $table = "cursos";

    protected $fillable = ['nombre', 'tipo'];
 	
 	public function alumnos()
 	{
 		return $this->hasMany('App\Alumno');
 	}

 	public function asignaturas()
 	{
 		return $this->hasMany('App\Asignatura');
 	}
}
