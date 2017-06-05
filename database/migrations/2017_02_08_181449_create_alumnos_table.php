<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('sexo',['Masculino','Femenino']);
            $table->string('telefono');
            $table->string('foto');
            $table->date('fecha_nacimiento');
            //$table->string('edad');
            $table->string('direccion');
            $table->rememberToken();
            $table->integer('id_curso')->unsigned();
            $table->integer('id_apoderado')->unsigned();
            $table->foreign('id_curso')->references('id')->on('cursos');
            $table->foreign('id_apoderado')->references('id')->on('apoderados');
            $table->timestamps();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
