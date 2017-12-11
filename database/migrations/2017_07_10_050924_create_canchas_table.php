<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanchasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canchas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->boolean('iluminacion');
            $table->timestamps();
        });
        // Tabla relacion Muchos a Muchos
        Schema::create('cancha_socio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cancha_id')->unsigned();
            $table->foreign('cancha_id')->references('id')->on('canchas');
            $table->integer('socio_id')->unsigned();
            $table->foreign('socio_id')->references('id')->on('socios');
            // Columnas extras
            $table->datetime('start');
            $table->datetime('end');
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
        Schema::dropIfExists('canchas');
    }
}
