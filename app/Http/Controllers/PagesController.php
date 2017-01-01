<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Musica;
use App\Artista;

class PagesController extends Controller
{

    public function home()
	{
		$user=\Auth::user();
		
		if($user)
		$compras = $user->compra()->get();
		
		$abc = Musica::withCount('compra')->orderBy('compra_count', 'desc')->take(5)->get();
		$recent = Musica::with('artistas')->orderBy('created_at','desc')->take(5)->get();
		//echo $recent;

		return view('welcome', compact('recent','abc','compras'));
	}




	public function artistas($id)
    {
            $musica = Musica::find($id);

            return $musica->titulo;


            //$musicasId = $musicas->id;
    }
	
	
	//public function about()
	//{
	//	return view('about');
	//}
	
	/*public function musicas()
	{
		return view('musicas');
	} */
	
	/*public function top()
	{
		return view('top');
	} */
	
	/*public function suporte()
	{
		return view('suporte');
	} */
	
	/*public function gestao()
	{
		return view('gestao');
	} */
	
	/*public function pesquisa()
	{
		return view('pesquisa');
	} */
	
	/*public function perfil()
	{
		return view('perfil');
	} */
	
	public function download($caminho)
	{
	}
}
