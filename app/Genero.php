<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';


    public function musica()
	{
		return $this->hasMany('App\Musica', 'genero');
	}
}
