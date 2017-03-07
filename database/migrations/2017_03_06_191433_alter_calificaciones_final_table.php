<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCalificacionesFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('calificaciones', function (Blueprint $table) {
            $table->decimal('n1',5,4)->default('0')->change();
            $table->decimal('n2',5,4)->default('0')->change();
            $table->decimal('n3',5,4)->default('0')->change();
            $table->decimal('n4',5,4)->default('0')->change();
            $table->decimal('n5',5,4)->default('0')->change();
            $table->decimal('promedio',5,4)->default('0')->change();
            $table->decimal('examen',5,4)->default('0')->change();
            $table->decimal('final',5,4)->default('0')->change();
            $table->decimal('n6',5,4)->default('0')->after('n5');
            $table->decimal('n7',5,4)->default('0')->after('n6');
            $table->decimal('n8',5,4)->default('0')->after('n7');
            $table->integer('cantidad')->default('8')->after('n7');
            $table->dropForeign('calificaciones_id_apoderado_foreign');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calificaciones', function (Blueprint $table) {
            //
        });
    }
}
