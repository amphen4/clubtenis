<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->unsignedInteger('nro_inscritos')->default(0);
            $table->enum('estado',['abierto','cerrado'])->default('abierto');
            $table->enum('visibilidad',['publico','interno']);
            $table->enum('modalidad',['singles','dobles']);
            $table->unsignedInteger('max_inscritos')->nullable();
            $table->unsignedInteger('tamano_cuadro')->nullable();
            // Clave forenea: campeon
            $table->integer('campeon_id')->unsigned()->nullable();
            $table->foreign('campeon_id')->references('id')->on('players');
            // columnas
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->string('organizador',30)->nullable();
            $table->string('arbitro',30)->nullable();
            $table->string('url_img')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
        // Tabla relacion Muchos a Muchos
        Schema::create('player_torneo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('torneo_id')->unsigned();
            $table->foreign('torneo_id')->references('id')->on('torneos');
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
        Schema::dropIfExists('torneos');
    }
}
