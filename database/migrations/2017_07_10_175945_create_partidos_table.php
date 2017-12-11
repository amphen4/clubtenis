<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marcador',30)->nullable();
            // Clave foranea: ganador
            $table->integer('ganador_id')->unsigned()->nullable();
            $table->foreign('ganador_id')->references('id')->on('players');
            // Clave foranea: torneo
            $table->integer('torneo_id')->unsigned()->nullable();
            $table->foreign('torneo_id')->references('id')->on('torneos');
            // Clave foranea: ranking
            $table->integer('ranking_id')->unsigned()->nullable();
            $table->foreign('ranking_id')->references('id')->on('rankings');
            // Clave foranea: cancha
            $table->integer('cancha_id')->unsigned()->nullable();
            $table->foreign('cancha_id')->references('id')->on('canchas');
            //
            $table->boolean('jugado')->default(False);
            $table->datetime('fecha_hora')->nullable();
            $table->string('ronda',30)->nullable();
            $table->unsignedInteger('nro')->nullable();
            // Clave foranea (recursiva): partido relacionado
            $table->integer('partido_relacionado_id')->unsigned()->nullable();
            $table->foreign('partido_relacionado_id')->references('id')->on('partidos');
            //
            $table->timestamps();
        });
        // Tablas Relacion Muchos a Muchos
        Schema::create('partido_player', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partido_id')->unsigned();
            $table->foreign('partido_id')->references('id')->on('partidos');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
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
        Schema::dropIfExists('partidos');
    }
}
