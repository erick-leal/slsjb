<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Cargo;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdministrativoResetPasswordNotification;

class Administrativo extends User
{
    protected $table = "administrativos";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'direccion', 'id_cargo'];
 
    protected $hidden = ['password', 'remember_token'];

    public function cargo()
    {
    	return $this->belongsTo(Cargo::class,'id_cargo','id');
    }

    public function noticias()
    {
    	return $this->hasMany('App\Noticia');
    }

    public function getNameAndLastAttribute()
    {
        return $this->nombre.' '.$this->apellido_paterno.' '.$this->apellido_materno;
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdministrativoResetPasswordNotification($token));
    }
}
