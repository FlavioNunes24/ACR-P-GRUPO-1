<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('musica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('gravadora');
            $table->string('data_lancamento');
            $table->decimal('preco',10,2);
            $table->string('descricao');
            $table->decimal('duracao',10,2);
            $table->string('path');
		   	$table->string('pathPreview');
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
        Schema::dropIfExists('musica');
    }
}
