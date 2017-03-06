<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterConductasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conductas', function (Blueprint $table) {
            $table->integer('id_profesor')->unsigned();
            $table->foreign('id_profesor')->references('id')->on('profesores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conductas', function (Blueprint $table) {
            //
        });
    }
}
