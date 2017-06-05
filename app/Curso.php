<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Matricula;

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

    protected $fillable = ['nombre', 'tipo', 'id_profesor'];
 	
 	public function alumnos()
 	{
 		return $this->hasMany('App\Alumno','id_curso');
 	}

    public function matriculas()
    {
        return $this->hasMany('App\Matricula');
    }

 	public function asignaturas()
 	{
 		return $this->hasMany('App\Asignatura','id_curso');
 	}

    public function profesor()
    {
        return $this->belongsTo(Profesor::class,'id_profesor','id');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }

    public function getNameAndTypeAttribute()
    {
        return $this->nombre . ' - ' . $this->tipo." / ".$this->created_at->year;
    }
}
