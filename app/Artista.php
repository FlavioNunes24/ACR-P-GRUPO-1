<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table ='artista';



	public function musicas()
	{
		return $this->belongsToMany('App\Musica', 'musica_artista', 'artista_id', 'musica_id');
	}

	public function album()
	{
		return $this->belongsToMany('App\Album', 'album_artista', 'artista_id', 'album_id');
	}
	



}