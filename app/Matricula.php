<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;

class Matricula extends Model
{
    protected $table = "matriculas";

    protected $fillable = ['estado', 'monto', 'fecha', 'id_alumno'];

    public function alumno()
    {
    	return $this->belongsTo(Alumno::class,'id_alumno','id');
    }

    public function scopeSearch($query, $fecha)
    {
        return $query->whereMonth('fecha', 'LIKE', "%$fecha%");
    }
}
