<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ProfesorResetPasswordNotification;

class Profesor extends User
{
    protected $table = "profesores";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'direccion'];
 
    protected $hidden = ['password', 'remember_token'];

    public function asignaturas()
    {
    	return $this->hasMany('App\Asignatura','id_profesor');
    }

    public function cursos()
    {
        return $this->hasMany('App\Curso','id_profesor');
    }

    public function eventos()
    {
    	return $this->hasMany('App\Evento','id_profesor')->orderBy('fecha','DSC');
    }

    public function conductas()
    {
        return $this->hasMany('App\Conducta','id_profesor');
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
        $this->notify(new ProfesorResetPasswordNotification($token));
    }
}
