<?php

use Illuminate\Support\Facades\Schema; 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionesTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('n1');
            $table->string('n2');
            $table->string('n3');
            $table->string('n4');
            $table->string('n5');
            $table->string('promedio');
            $table->string('examen');
            $table->string('final');
            $table->string('observacion');

            $table->integer('id_alumno')->unsigned();
            $table->foreign('id_alumno')->references('id')->on('alumnos');

            $table->integer('id_apoderado')->unsigned();            
            $table->foreign('id_apoderado')->references('id')->on('apoderados');

            $table->integer('id_asignatura')->unsigned();
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calificaciones');
    }
}
