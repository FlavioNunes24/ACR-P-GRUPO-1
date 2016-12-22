<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicaArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('musica_artista', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('musica_id')->unsigned();
            $table->integer('artista_id')->unsigned();

            $table->foreign('musica_id')->references('id')->on('musica');
            $table->foreign('artista_id')->references('id')->on('artista');

            
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
        Schema::dropIfExists('musica_artista');
    }
}
