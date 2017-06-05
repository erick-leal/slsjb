<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Curso;

class Matricula extends Model
{
    protected $table = "matriculas";

    protected $fillable = ['estado', 'monto', 'fecha', 'id_alumno', 'id_curso'];

    public function alumno()
    {
    	return $this->belongsTo(Alumno::class,'id_alumno','id');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class,'id_curso','id');
    }

    public function scopeSearch($query, $fecha)
    {
        return $query->whereMonth('fecha', 'LIKE', "%$fecha%");
    }
}
