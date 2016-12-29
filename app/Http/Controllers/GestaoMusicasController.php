<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Musica;
use App\User;
use App\tipo_utilizadores;
use App\Genero;
use App\Album;
use App\Artista;

class GestaoMusicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Musica::all();
        $user = User::all();
        $tipo_utilizadores = tipo_utilizadores::all();


        return view('gestaoMusicas.index', compact('user', 'tipo_utilizadores', 'musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_utilizadores = tipo_utilizadores::all();
        $genero = Genero::all();
        $album = Album::all();
        $artista = Artista::all();

        return view('gestaoMusicas.create',compact('tipo_utilizadores', 'genero','album','artista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        //validação dos dados
            $this->validate($request, [

            'titulo' => 'required|max:255',
            'gravadora' => 'required|max:255',
            'data_lancamento' => 'required|before:now',
            'preco' => 'numeric|min:1|max:200',
            'descricao' => 'required|max:1000',
            'duracao' => 'numeric|min:1|max:99',
            ]);


            //guardar os dados 

        $musica = new Musica;

        $musica -> titulo = $request->titulo;
        $musica -> gravadora = $request->gravadora;

        $musica -> data_lancamento = $request-> data_lancamento;
        $musica -> preco = $request->preco;
        $musica -> descricao = $request->descricao;
        $musica -> duracao = $request->duracao;
        $musica -> genero_id = $request->genero;


        if($request->hasFile('file'))
        {

            $file = $request ->file('file');
            $request->file('file')->move(public_path().'/music', $file->getClientOriginalName());
            $musica -> path = $file->getClientOriginalName();     
        }
        $musica->save();

       //fazer correspondencia da musica com os albuns e com os artistas
        
       $album = $request->album;

       foreach($album as $idAlbum){
            $musica->album()->attach($idAlbum);
       }


        $artista = $request->artista;

        foreach ($artista as $idArtistas) {
           $musica->artistas()->attach($idArtistas); 

        }


        return redirect ()->route('gestaoMusicas.index')->with('message','Música adicionada com sucesso');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
        $musica = Musica::findOrFail($id);
        $genero = Genero::all();

        //para ir para a pagina de edição
        return view('gestaoMusicas.edit',compact('musica','genero'))->with('message','Musica eliminada com sucesso');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            //validação
        $this->validate($request, [

            'titulo' => 'required|max:255',
            'gravadora' => 'required|max:255',
            'data_lancamento' => 'required',
            'preco' => 'numeric|min:1|max:50',
            'descricao' => 'required|max:1000',
            'duracao' => 'numeric|min:1|max:50',
            ]);


        //guardar

        $musica = Musica::findOrFail($id);

        $musica -> titulo = $request->titulo;
        $musica -> gravadora = $request->gravadora;
        $musica -> data_lancamento = $request-> data_lancamento;
        $musica -> preco = $request->preco;
        $musica -> descricao = $request->descricao;
        $musica -> duracao = $request->duracao;

        //$file = $request->file('file');
 
   
        $musica->save();

        return redirect ()->route('gestaoMusicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $musica = Musica::findOrFail($id);
        $musica->delete();
 
        return redirect ()->route('gestaoMusicas.index')->with('message','Musica eliminada com sucesso');
    }



    public function artistas($id)
    {
            $musica = Musica::find($id);

            return $musica->titulo;


            //$musicasId = $musicas->id;
    }
}
