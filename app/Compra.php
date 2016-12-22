<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compra';
	
	public function musica()
	{
		return $this->belongsToMany('App\Musica','compra_musica','compra_id','musica_id');
	}
	
	public function utilizador()
	{
		return $this->belongsTo('App\User', 'utilizador_id');
	}
}
