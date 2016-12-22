<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_musica', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('musica_id')->unsigned();
			$table->foreign('musica_id')->references('id')->on('musica');
			$table->integer('compra_id')->unsigned();
			$table->foreign('id')->references('id')->on('compra');
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
        Schema::table('compra_musica', function (Blueprint $table) {
			//
        });
    }
}
