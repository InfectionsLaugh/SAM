<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Maestros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('maestros');
        Schema::create('maestros', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('ap_pat');
            $table->text('ap_mat');
            $table->bigInteger('num_empleado');
            $table->string('email');
            $table->bigInteger('extension_cubo');
            $table->string('ubicacion');
            $table->text('remember_token')->nullable();
            $table->integer('activo');
            $table->text('password');
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
        Schema::dropIfExists('maestros');
    }
}
