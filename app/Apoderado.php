<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ApoderadoResetPasswordNotification;

class Apoderado extends User
{
    protected $table = "apoderados";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'direccion'];
 
    protected $hidden = ['password', 'remember_token'];

    public function alumnos()
    {
    	return $this->hasMany('App\Alumno','id_apoderado');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }

    public function getNameAndLastAttribute()
    {
        return $this->nombre.' '.$this->apellido_paterno.' '.$this->apellido_materno;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ApoderadoResetPasswordNotification($token));
    }
}
