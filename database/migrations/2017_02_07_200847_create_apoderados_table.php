<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApoderadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoderados', function (Blueprint $table) {
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
        Schema::dropIfExists('apoderados');
    }
}
