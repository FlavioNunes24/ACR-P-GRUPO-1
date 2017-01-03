<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';
	
	protected $fillable = ['nome', 'data_lancamento','pathImagem'
   ];



	public function musicas()
	{
 		 return $this->belongsToMany('App\Musica','album_musica','album_id','musica_id');
	}

	public function artista()
	{
		return $this->belongsToMany('App\Artista', 'album_artista', 'album_id', 'artista_id');
	}

}
