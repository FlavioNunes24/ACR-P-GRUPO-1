<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_utilizadores extends Model
{
	
	protected $table = 'tipo_utilizador';
	
    public function user()
	{
		return $this->hasMany('App\User', 'tipo_utilizador');
	}
}
