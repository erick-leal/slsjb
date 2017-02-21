<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Authenticatable
{
    protected $table = "administrativos";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'edad', 'direccion', 'id_cargo'];
 
    protected $hidden = ['password', 'remember_token'];

    public function cargo()
    {
    	return $this->belongsTo('App\Cargo');
    }

    public function noticias()
    {
    	return $this->hasMany('App\Noticia');
    }
}
