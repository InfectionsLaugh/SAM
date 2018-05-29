<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Passion fruit - Drake
class Tecnicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::dropIfExists('tecnicos');
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nombre');
            $table->text('ap_pat');
            $table->text('ap_mat');
            $table->bigInteger('matricula');
            $table->string('email');
            $table->text('telefono');
            $table->text('tipo_usuario');
            $table->integer('num_huella');
            $table->text('password');
            $table->integer('activo');
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
        Schema::dropIfExists('tecnicos');
    }
}