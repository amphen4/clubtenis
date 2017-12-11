<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleryPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',190);

            $table->integer('galeria_id')->unsigned();
            $table->foreign('galeria_id')->references('id')->on('galerias');

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
        Schema::dropIfExists('galery_photos');
    }
}
