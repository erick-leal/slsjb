<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Administrativo;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = ['nombre', 'descripcion', 'fecha', 'foto', 'id_administrativo'];

    public function administrativo()
    {
    	return $this->belongsTo(Administrativo::class, 'id_administrativo', 'id');
    }

    public function scopeSearch($query, $nombre)
    {
    	return $query->where('nombre', 'LIKE', "%$nombre%");
    }
}
