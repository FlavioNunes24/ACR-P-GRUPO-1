<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Musica;
use App\Artista;

class PagesController extends Controller
{

    public function home()
	{

			
		//$musica = Musica::with('artistas')->whereId('2')->first();
		//$artista = Artista::with('musicas')->whereId('1')->get();
		//echo $musica->titulo;

//testes da aula
		/*
		$musica = Musica::find('2');
		$comp = $musica->compra();

		$results = $comp->get();

		foreach($results as $result){
			print_r("----");
			print_r($result->created_at);

		}
		*/	

		// print_r($comp->get());


		/*foreach ($artista as $artistas) 
		{
			echo $artistas->nome;
		}*/

		//echo $artista;
		//	echo "<hr>";
		//	echo Musica::find(1)->artistas;

	//return Artista::with('musica')->first();

		return view('welcome');
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
}
