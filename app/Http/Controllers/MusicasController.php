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
		
		//$musica = Musica::find(1);
		//$artista = Artista::with('musicas')->first();
		//$user = Auth::user();
		//$compras = $user->compra()->get();
		

	return view('musicas',compact('musica','compras'));
	}
	
	public function compra(Request $request)
	{
	/*$response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return \Response::json($response);*/
		/*$compra = new App\Compra;
		$compra->id_utilizador = 1; //falta meter
		$compra->data_alteracao = date("Y-m-d");
		$compra->save();
		$compraMusica = new App\Compra_musica;
		$compraMusica->id_musica = $request->id;
		$compraMusica->id_compra = $compra->id;
		$compraMusica->save(); */
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
			
		//return \Response::json($response)->with('message','Compra efectuada com sucesso');
		return response()->json($response);
		//return redirect('/musicas')->with('message','Música comprada com sucesso!');
	}

	
	/*public function download(Request $request)
	{
		$musica = Musica::find($request->id);
		$name= "asd";
		$publicpath = public_path();
		$path = $publicpath;
		$musicpath= $musica->path;
		
		//return response()->download($pathToFile);
		return response()->download($musicpath, $name);
		
		$file= public_path()."/".$musica->path;
		return response()->download($file);
		
		
		
	} */



	public function album($id)
	{
		$compras = Compra::all();
		$album = Album::find($id);
		return view('album',compact('album', 'compras'));
	}

	public function artista($id)
	{
		$artista = Artista::find($id);
		$compras = Compra::all();
		return view('artistas',compact('artista','compras'));	
	}
}
