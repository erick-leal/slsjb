<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conducta extends Model
{
    protected $table = "conductas";

    protected $fillable = ['tipo', 'descripcion', 'fecha', 'id_alumno', 'id_asignatura'];

    public function alumno()
    {
    	return $this->belongsTo('App\Alumno');
    }

    public function asignatura()
    {
    	return $this->belongsTo('App\Asignatura');
    }
}
