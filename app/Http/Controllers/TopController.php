<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;
use App\Compra;
use App\Artista;

class TopController extends Controller
{
    public function index()
	{
		$musica = Musica::all();
		$user=\Auth::user();
		
		if($user)
		$compras = $user->compra()->get();
		/*foreach($musica as $musicas)
		{
			$aux = $musicas->compra()->get();
			$conta =count($aux);
			echo $conta;
		}*/
		//$teste2= Musica::all();
		/*$teste = Musica::with('compra')->get()->sortBy(function($teste2)
													   {
			dd($abc = $teste2->compra->count());
		}); */
		
		($abc = Musica::withCount('compra')->orderBy('compra_count', 'desc')->paginate(10));
		
		
		return view('top', compact('musica','abc','compras'));
	}
}
