<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            // campos tradicionales
            $table->string('nombre',30);
            $table->string('apellido_pat',30);
            $table->string('apellido_mat',30);
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('brazo_habil',['derecho','izquierdo','ambidiestro'])->nullable();
            $table->enum('reves',['una mano','dos manos'])->nullable();
            $table->enum('tipo',['singles','dobles']);
            $table->unsignedInteger('partidos_jugados')->default(0);
            $table->unsignedInteger('partidos_ganados')->default(0);
            $table->unsignedInteger('partidos_perdidos')->default(0);
            $table->unsignedInteger('torneos_jugados')->default(0);
            $table->unsignedInteger('torneos_ganados')->default(0);
            $table->string('nivel_categoria',30);
            $table->string('pareja_nombre',30)->nullable();
            $table->string('pareja_apellido_pat',30)->nullable();
            $table->string('pareja_apellido_mat',30)->nullable();
            $table->unsignedInteger('posicion')->nullable();
            $table->unsignedInteger('puntos')->default(0);
            // Claves Foraneas
            $table->integer('usuario_id')->unsigned()->nullable();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('socio_id')->unsigned()->nullable();
            $table->foreign('socio_id')->references('id')->on('socios');
            $table->integer('ranking_id')->unsigned()->nullable();
            $table->foreign('ranking_id')->references('id')->on('rankings');
            // wea
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
        Schema::dropIfExists('players');
    }
}
