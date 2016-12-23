<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Musica;
use App\Artista;
use App\Album;

class SearchController extends Controller
{
    public function user(Request $request)
	{
		$dados = $request->q;
		//$musica = Musica::where('titulo', $dados)->orWhere('gravadora', $dados);
		//dd($musica);
		//echo $conta=count($musica);
		if(\Auth::check())
		{
			$user = \Auth::user();
			$compras = $user->compra()->get();
		}
		
		$musica = Musica::where('titulo','LIKE','%'.$dados.'%')->get();
		$gravadora = Musica::where('gravadora','LIKE','%'.$dados.'%')->get();
		$album = Album::where('nome','LIKE','%'.$dados.'%')->get();
		//$artista = Artista::where('nome','LIKE','%'.$dados.'%')->get();
		if(count($musica) > 0)
		{
			return view('user.search',compact('musica','compras'));
		}
		elseif(count($gravadora) > 0)
		{
			return view('user.search',compact('gravadora','compras'));
		}
		//elseif(count($album) > 0)
		//{
		//	return view('user.search',compact('album'));
		//}
		//elseif(count($artista) > 0)
		//{
		//	return view('user.search',compact('artista'));
		//}
		else
		{
			$mensagem = "Não foram encontrados quaisquer resultados. Tente novamente!";
			return view('user.search', compact('mensagem'));
		}
	}
	
	
}
