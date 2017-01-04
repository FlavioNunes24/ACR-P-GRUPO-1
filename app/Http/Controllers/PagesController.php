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

	public function download($caminho)
	{
	}
	
	public function redirect($caminho)
	{
		return redirect('/');
	}
}
