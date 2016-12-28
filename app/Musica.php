<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    protected $table = 'musica';

	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	
   protected $fillable = ['titulo', 'gravadora', 'data_lancamento','preco', 'descricao', 'duracao', 'path'
   ];




   public function artistas()
   {
    return $this->belongsToMany('App\Artista', 'musica_artista', 'musica_id', 'artista_id');
  
   }


	
	public function compra()
	{
		return $this->belongsToMany('App\Compra','compra_musica','musica_id','compra_id');
	}

  public function genero()
  {
    return $this->belongsTo('App\Genero','genero');
  }


  public function album()
  {
    return $this->belongsToMany('App\Album','album_musica','musica_id','album_id');
  }

}
