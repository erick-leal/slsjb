<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = "cargos";

    protected $fillable = ['nombre', 'descripcion'];

    public function administrativos()
    {
    	return $this->hasMany('App\Administrativo');
    }

    public function scopeSearch($query, $nombre)
    {
    	return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
