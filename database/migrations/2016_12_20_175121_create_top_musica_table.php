<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_musica', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('top_id')->unsigned();
			$table->foreign('top_id')->references('id')->on('top');
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
        Schema::dropIfExists('top_musica');
    }
}
