<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'id_profesor', 'id_asignatura'];

    public function profesor()
    {
    	return $this->belongsTo('App\Profesor');
    }

    public function asignatura()
    {
    	return $this->belongsTo('App\Asignatura');
    }
}
