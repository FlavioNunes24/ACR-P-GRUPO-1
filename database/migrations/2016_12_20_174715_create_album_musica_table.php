<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_musica', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('album');
			$table->integer('musica_id')->unsigned();
			$table->foreign('musica_id')->references('id')->on('musica');
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
        Schema::dropIfExists('album_musica');
    }
}
