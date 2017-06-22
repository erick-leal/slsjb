<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Curso;
use App\Asignatura;

class Matricula extends Model
{
    protected $table = "matriculas";

    protected $fillable = ['estado', 'monto', 'fecha', 'id_alumno', 'id_curso'];

    public function alumno()
    {
    	return $this->belongsTo(Alumno::class,'id_alumno','id')->orderBy('apellido_paterno','DESC');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class,'id_curso','id');
    }

    public function notas()
    {
        return $this->hasMany('App\Nota','id_matricula');
    }

    

    public function asignaturas() 
    {
        return $this->belongsToMany('App\Asignatura')->orderBy('nombre','ASC');
    }


    public function scopeSearch($query, $fecha)
    {
        return $query->whereYear('fecha', '=', date('Y'))->whereMonth('fecha', 'LIKE', "%$fecha%"); 
    }

    public function getRutAlumnoAttribute()
    {
        return $this->alumno->rut;
    }

    public function getCursoAlumnoAttribute()
    {
        return $this->curso->nombre. ' - ' . $this->curso->tipo.' / '.$this->curso->created_at->year;
    }

}
