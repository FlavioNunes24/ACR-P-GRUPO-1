<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;
use App\Musica;
use App\Genero;
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


	//public function ficheiro()
	//{
	//	return view('gestao');
	//	}

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
		return view('gestao.album', compact('tipo_utilizadores','artistas'));
	}


	public function adicionar()
	{

		$tipo_utilizadores = \App\tipo_utilizadores::all();
		$genero = \App\Genero::all();


		return view('gestao.genero',compact('tipo_utilizadores', 'genero'));

	}

	public function guardar(Request $request)	
	{
		$genero = new Genero;

		$genero->nome = $request->genero;
		$genero->save();

		return redirect('/gestao/adicionar');
	}


	public function adicionaAlbum()
	{

		return redirect('/gestao/album');
	}
}
