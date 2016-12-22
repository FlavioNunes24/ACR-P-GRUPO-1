<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInserts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insertGetId(
        array(
            'name' => 'Administrador',
            'username' => 'admin',
            'password' => bcrypt('123456'),
            'pais' => 'Portugal',
            'data_nasc' => '1994-07-21',
            'email' => 'admin@mail.com',
            'saldo' => '999.0',
            'tipo_utilizador' => '2',
        )
    );
        
        DB::table('users')->insertGetId(
        array(
            'name' => 'Cliente',
            'username' => 'Cliente',
            'password' => bcrypt('123456'),
            'pais' => 'Portugal',
            'data_nasc' => '1994-07-21',
            'email' => 'cliente@mail.com',
            'saldo' => '99.0',
            'tipo_utilizador' => '1',
        )
    );
        
        DB::table('tipo_utilizador')->insertGetId(
        array(
            'tipo' => 'Cliente',
        )
    );
        
        DB::table('tipo_utilizador')->insertGetId(
        array(
            'tipo' => 'Administrador',
        )
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
