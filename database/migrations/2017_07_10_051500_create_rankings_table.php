<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rankings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->enum('modalidad',['singles','dobles']);
            $table->unsignedInteger('puntos_partido_ganado')->nullable();
            $table->unsignedInteger('puntos_partido_perdido')->nullable();
            $table->unsignedInteger('nro_participantes')->default(0);
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
        Schema::dropIfExists('rankings');
    }
}
