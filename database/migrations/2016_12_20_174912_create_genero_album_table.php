<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneroAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_album', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('album');
			$table->integer('genero_id')->unsigned();
			$table->foreign('genero_id')->references('id')->on('genero');
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
        Schema::dropIfExists('genero_album');
    }
}
