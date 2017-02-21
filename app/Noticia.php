<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'foto', 'id_administrativo'];

    public function administrativo()
    {
    	return $this->belongsTo('App\Administrativo');
    }
}
