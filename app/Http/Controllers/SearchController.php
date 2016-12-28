<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Musica;
use App\Artista;
use App\Album;

class SearchController extends Controller
{
    public function user(Request $request)
	{
		$dados = $request->q;
		if(\Auth::check())
		{
			$user = \Auth::user();
			$compras = $user->compra()->get();
		}
		
		$musica = Musica::where('titulo','LIKE','%'.$dados.'%')->get();
		$gravadora = Musica::where('gravadora','LIKE','%'.$dados.'%')->get();
		$album = Album::where('nome','LIKE','%'.$dados.'%')->get();
		$artista = Artista::where('nome','LIKE','%'.$dados.'%')->get();
		
		if(count($album) >0)
		{
			foreach($album as $albums)
			{
				$queryalbum = Album::find($albums->id);
				$album_musica = $queryalbum->musicas()->get();
			}
			
			
		}
		
		if(count($artista) >0)
		{
			foreach($artista as $artistas)
			{
				$query_artista = Artista::find($artistas->id);
				$artistas_musica = $query_artista->musicas()->get();
			}
		}
		
		
		if((count($musica) <= 0) && (count($gravadora) <= 0) && (count($album) <= 0) && (count($artista) <= 0))
		{
			$mensagem = "Não foram encontrados quaisquer resultados. Tente novamente!";
			return view('user.search', compact('mensagem'));
		}
		if((count($musica) <= 0) && (count($gravadora) <= 0) && (count($album) <= 0) && (count($artista) > 0))
		{
			return view('user.search',compact('artistas_musica','compras'));
		}
		if((count($musica) <= 0) && (count($gravadora) <= 0) && (count($album) > 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('album_musica','compras'));
		}
		if((count($musica) <= 0) && (count($gravadora) <= 0) && (count($album) > 0) && (count($artista) > 0))
		{
			return view('user.search',compact('album_musica','artistas_musica','compras'));
		}
		if((count($musica) <= 0) && (count($gravadora) > 0) && (count($album) <= 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('gravadora','compras'));
		}
		if((count($musica) <= 0) && (count($gravadora) > 0) && (count($album) <= 0) && (count($artista) > 0))
		{
			return view('user.search',compact('gravadora','compras','artistas_musica'));
		}
		if((count($musica) <= 0) && (count($gravadora) > 0) && (count($album) > 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('gravadora','compras','album_musica'));
		}
		if((count($musica) <= 0) && (count($gravadora) > 0) && (count($album) > 0) && (count($artista) > 0))
		{
			return view('user.search',compact('gravadora','compras','album_musica','artistas_musica'));
		}
		if((count($musica) > 0) && (count($gravadora) <= 0) && (count($album) <= 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) <= 0) && (count($album) <= 0) && (count($artista) > 0))
		{
			return view('user.search',compact('musica','artistas_musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) <= 0) && (count($album) > 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('musica','album_musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) <= 0) && (count($album) > 0) && (count($artista) > 0))
		{
			return view('user.search',compact('musica','album_musica','artistas_musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) > 0) && (count($album) <= 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('musica','gravadora','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) > 0) && (count($album) <= 0) && (count($artista) > 0))
		{
			return view('user.search',compact('musica','gravadora','artistas_musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) > 0) && (count($album) > 0) && (count($artista) <= 0))
		{
			return view('user.search',compact('musica','gravadora','album_musica','compras'));
		}
		if((count($musica) > 0) && (count($gravadora) > 0) && (count($album) > 0) && (count($artista) > 0))
		{
			return view('user.search',compact('musica','gravadora','album_musica','artistas_musica','compras'));
		}
	}
	
	public function admin(Request $request)
	{
		$dados = $request->q_admin;
		$user = User::where('name','LIKE','%'.$dados.'%')->orWhere('id','LIKE','%'.$dados.'%')->orWhere('username','LIKE','%'.$dados.'%')->orWhere('email','LIKE','%'.$dados.'%')->orWhere('pais','LIKE','%'.$dados.'%')->get();
		
		if(count($user) > 0)
		{
			return view('tipo.search', compact('user'));	
		}
		else
		{
			$mensagem = "Não foi encontrado qualquer utilizador. Tente novamente!";
			return view('tipo.search', compact('mensagem'));
		}
		
	}
	
	
}
