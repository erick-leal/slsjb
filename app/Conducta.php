<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Alumno;
use App\Profesor;
use App\Asignatura;

class Conducta extends Model
{
    protected $table = "conductas";

    protected $fillable = ['tipo', 'descripcion', 'fecha', 'id_alumno', 'id_asignatura'];

    public function alumno()
    {
    	return $this->belongsTo(Alumno::class, 'id_alumno', 'id');
    }

    public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class, 'id_asignatura', 'id');
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class, 'id_profesor', 'id');
    }
}
