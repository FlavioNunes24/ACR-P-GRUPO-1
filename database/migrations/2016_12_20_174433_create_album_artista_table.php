<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumArtistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_artista', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('album');
			$table->integer('artista_id')->unsigned();
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
        Schema::dropIfExists('album_artista');
    }
}
