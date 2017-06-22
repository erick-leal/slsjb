<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Curso;
use App\Apoderado;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AlumnoResetPasswordNotification;

class Alumno extends User
{
    protected $table = "alumnos";

    protected $fillable = ['rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password', 'sexo', 'telefono', 'foto', 'fecha_nacimiento', 'direccion',  'id_apoderado'];
 
    protected $hidden = ['password', 'remember_token'];

    //public function curso()
    //{
    //	return $this->belongsTo(Curso::class,'id_curso','id');
    //}

    public function matricula()
    {
        return $this->hasManyThrough('App\Matricula','App\Curso','id_curso','id_matricula');
    }

    public function apoderado()
    {
    	return $this->belongsTo(Apoderado::class,'id_apoderado','id'); 
    }

    public function matriculas()
    {
        return $this->hasMany('App\Matricula','id_alumno');
    }

    public function asignaturas()
    {
        return $this->belongsToMany('App\Asignatura');
    }

    public function conductas()
    {
        return $this->hasMany('App\Conducta','id_alumno');
    }

    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion','id_alumno');
    }

    public function calificaciones()
    {
        return $this->hasMany('App\Calificacion','id_alumno');
    }

    public function asistencias()
    {
        return $this->hasMany('App\Asistencia');
    }

    public function scopeSearch($query, $nombre)
    {
        return $query->where('nombre', 'LIKE', "%$nombre%");
    }
   
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AlumnoResetPasswordNotification($token));
    }
}
