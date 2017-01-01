<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use App\Musica;
use App\Genero;
use App\Album;
use App\Artista;
class GestaoController extends Controller
{
    public function index()
	{
		$users = \App\User::all();
		$tipo_utilizadores = \App\tipo_utilizadores::all();
		return view('gestao', compact('users', 'tipo_utilizadores'));
	}
	
	public function show($id)
	{
		$user = \App\User::find($id);
		$tipo_utilizadores = \App\tipo_utilizadores::all();
		$tipo = \App\User::find($id)->tipo_utilizador()->value('tipo');  //Percebe isto
		return view('user.show', compact('user', 'tipo', 'tipo_utilizadores'));
	}
	
	public function show_tipo($id_tipo)
	{
		$tipo =  \App\tipo_utilizadores::find($id_tipo);
		$registado= \App\tipo_utilizadores::find($id_tipo)->user;
		$tipo_utilizadores = \App\tipo_utilizadores::all();
		return view('tipo.show',compact('tipo', 'registado','tipo_utilizadores'));
		
	}

	public function upload(Request $request)
	{

		
			//validação dos dados
			$this->validate($request, [

            'titulo' => 'required|max:255',
            'gravadora' => 'required|max:255',
            'data_lancamento' => 'required',
            'preco' => 'numeric|min:1|max:50',
            'descricao' => 'required|max:1000',
            'duracao' => 'numeric|min:1|max:50',
            'file' =>'required',
            ]);

		//guardar os dados 

		$musica = new Musica;

		$musica -> titulo = $request->titulo;
		$musica -> gravadora = $request->gravadora;

		$musica -> data_lancamento = $request-> data_lancamento;
		$musica -> preco = $request->preco;
		$musica -> descricao = $request->descricao;
		$musica -> duracao = $request->duracao;
		
		if(Input::hasFile('file')){
			//echo 'Dados guardados</br>';
			$file = $request->file;
			$file ->move(public_path().'/',$file->getClientOriginalName());

			$nome = $file->getClientOriginalName();
			$musica -> path = $nome;
		}

		$musica->save();

		return back();
		

		return redirect('/gestao')->with('message','Música introduzida com sucesso!');

	}




	public function gestaoAlbum()
	{
		$tipo_utilizadores = \App\tipo_utilizadores::all();
		$artistas = \App\Artista::all();
		$album = Album::all();
		return view('gestao.album', compact('tipo_utilizadores','artistas','album'));
	}


	public function adicionar()
	{

		$tipo_utilizadores = \App\tipo_utilizadores::all();
		$genero = \App\Genero::all();


		return view('gestao.genero',compact('tipo_utilizadores', 'genero'));

	}

	public function guardar(Request $request)	
	{
		$this->validate($request, [

            'genero' => 'required|max:255',
            
  			]);

		$genero = new Genero;

		$genero->nome = $request->genero;
		$genero->save();

		return redirect('/gestao/adicionar');
	}



	public function adicionaAlbum(Request $request)
	{

		
		 $this->validate($request, [

            'nome' => 'required|max:255',
            'data_lancamento' => 'required|before:now',
            'file' =>'required',
  			]);

		$album = new Album;

		$album->nome = $request->nome;
		$album->data_lancamento = $request->data_lancamento;
		$album->artista_id = '1';
		$album->preco = '12';
		if(Input::hasFile('file')){
			$file = $request->file;
			$file ->move(public_path().'/images/album',$file->getClientOriginalName());

			$nome = $file->getClientOriginalName();
			$album -> pathImagem = $nome;
		}

		$album->save();		

		return redirect('/gestao/album')->with('message','Album criado com sucesso!');
	}


	public function artista()
	{
		$tipo_utilizadores = \App\tipo_utilizadores::all();
		$artista = Artista::all();
		return view ('gestao.artista', compact('tipo_utilizadores', 'artista'));
	}

	public function adicionaArtista(Request $request)
	{
		$artista = new Artista;

		$artista->nome = $request->nome;
		
		if(Input::hasFile('file')){
			$file = $request->file;
			$file ->move(public_path().'/images/artista',$file->getClientOriginalName());

			$nome = $file->getClientOriginalName();
			$artista-> pathImagem = $nome;
		}

		$artista->save();

		return redirect('/gestao/artista')->with('message','Artista criado com sucesso!');		

	}

	public function removerAlbum(Request $request, $id)
	{
		$album = Album::find($id);
		$album->musicas()->detach();
		$album->artista()->detach();

		$album->delete();
		return redirect('/gestao/album');

	}

	public function removerArtista(Request $request, $id)
	{
		$artista = Artista::find($id);
		$artista->musicas()->detach();
		$artista->album()->detach();

		$artista->delete();
		return redirect('/gestao/artista');

	}

	public function edit_tipo(Request $request, $id){
		
		 $user = \App\User::findOrFail($id);

		$user->tipo_utilizador = "2";

		$user->save();


		return redirect('/gestao');
	
	}

}
