<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Solicitudes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tecnico_id')->nullable();
            $table->integer('maestro_id')->nullable();
            $table->text('descripcion');
            $table->integer('tipo_tarea');
            $table->integer('equipo')->nullable();
            $table->dateTime('fecha_cita');
            $table->text('ruta_sar')->nullable();
            $table->text('estado');
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
