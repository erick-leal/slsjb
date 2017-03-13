<?php

namespace App;

use Illuminate\Database\Eloquent\Model; 
use App\Asignatura;

class Evento extends Model
{
    protected $table = "eventos";

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'id_profesor', 'id_asignatura'];

    public function profesor()
    {
    	return $this->belongsTo('App\Profesor','id_profesor');
    }

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class,'id_asignatura','id');
    }

    public function scopeSearch($query, $fecha)
    {
        return $query->where('fecha', 'LIKE', "%$fecha%");
    }
}
