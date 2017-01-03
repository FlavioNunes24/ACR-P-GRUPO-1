<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;

use App\Artista;


use App\Compra;
use App\Album;

use Illuminate\Support\Facades\Auth;


class MusicasController extends Controller
{
    public function index()
	{
		
		return view('musicas');
	}

	public function show(Request $request)
	{
		$musica = Musica::all();
		$user=\Auth::user();
		
		if($user)
		$compras = $user->compra()->get();

		

	return view('musicas',compact('musica','compras'));
	}
	
	public function compra(Request $request)
	{

		$user = Auth::user();
		$saldo = Auth::user()->saldo;
		$musica = Musica::find($request->id);
		
		
		if($saldo >= $musica->preco)
		{
			$compra = new Compra;
			$compra->utilizador_id = $user->id; //falta meter
			$compra->data = date("Y-m-d");
			$compra->save();

			$musica = Musica::find($request->id);
			$musica-> compra()->attach($compra->id);
			
			$user->decrement('saldo', $musica->preco);
			
		}
		//$post->comments()->save($comment);
		
		$response = array(
    		'sucesso' => $compra->exists ? 1 : 0);
			
		return response()->json($response);

	}

	

	
	public function album($id)
	{
		$compras = Compra::all();
		$album = Album::find($id);
		if($album != null)
		{
		return view('album',compact('album', 'compras'));
		}
		else
		{
			return redirect('/');
		}
	}

	public function artista($id)
	{
		$artista = Artista::find($id);
		$compras = Compra::all();
		if($artista != null)
		{
		return view('artistas',compact('artista','compras'));
		}
		else
		{
			return redirect('/');
		}
	}
	
	public function musica($id)
	{
		$compras = Compra::all();
		$musica2 = Musica::find($id);
		
		$user=\Auth::user();
		
		if($user)
		{
		$compras = $user->compra()->get();
		}
		
		$i = 0;
		foreach($compras as $compra)
		{
			foreach($compra->musica()->get() as $musica)
			{
				if($musica->id == $id)
				{
					 $i=1;
				}
			}
		}
	
		if($i == 1)
		{
			if($musica != null)
			{
			return view('musica', compact('compras','musica2'));
			}
			else
			{
				return redirect('/');
			}
		}
		else
		{
			return redirect('/');
		}
	}
}
