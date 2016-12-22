<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_album', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('album_id')->unsigned();
			$table->foreign('album_id')->references('id')->on('album');
			$table->integer('top_id')->unsigned();
			$table->foreign('top_id')->references('id')->on('top');
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
        Schema::dropIfExists('top_album');
    }
}
