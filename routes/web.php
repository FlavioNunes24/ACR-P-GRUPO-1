<?php




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/music/{caminho}', function()
		   {
	dd('asd');
});

Route::get('/home', 'HomeController@index');

Route::get('/', 'PagesController@home');


Route::get('/musicas', 'MusicasController@index');

Route::get('/musicas', 'MusicasController@show');

Route::get('/top', 'TopController@index');

Route::get('/suporte', 'SuporteController@index');
Route::post('/suporte', 'SuporteController@enviarMensagem');

Route::get('/pesquisa', 'PesquisaController@index');

Route::get('/perfil', 'PerfilController@index');

Route::get('user/{id}','GestaoController@show') ->middleware('auth', 'admin'); //Rotas para admin
Route::get('tipo/{id}', 'GestaoController@show_tipo')->middleware('auth', 'admin'); //Rotas para admin
Route::get('/admin/{id}', 'GestaoController@edit_tipo')->middleware('auth', 'admin'); //Rotas para admin

Route::get('/gestao', 'GestaoController@index') ->middleware('auth', 'admin'); //Rotas para admin

Route::post('/gestao','GestaoController@upload')->middleware('auth','admin'); //Rotas para admin

Route::post('/musicas/compra','MusicasController@compra')->middleware('auth');

Route::group(['middleware' => ['auth','admin']], function () {
	Route::resource('gestaoMusicas', 'GestaoMusicasController');



			});//Rotas para admin

Route::get('/artistas/{id}', 'PagesController@artistas');


Route::get('/perfil/editar/{id}','PerfilController@editar')->middleware('auth'); //Já está protegido contra outros utilizadores

Route::post('/perfil/{id}','PerfilController@confirmar');

Route::get('/gestao/artista', 'GestaoController@artista')->middleware('auth','admin');;
Route::post('/gestao/artista','GestaoController@adicionaArtista')->middleware('auth','admin');;
Route::get('/gestao/adicionar', 'GestaoController@adicionar')->middleware('auth','admin');;
Route::get('/album/remover/{album}','GestaoController@removerAlbum')->middleware('auth','admin');;
Route::get('/artista/remover/{artista}','GestaoController@removerArtista')->middleware('auth','admin');;
Route::post('/gestao/guardar', 'GestaoController@guardar')->middleware('auth','admin');;

Route::get('/gestao/album', 'GestaoController@gestaoAlbum')->middleware('auth','admin');;
Route::post('/gestao/album', 'GestaoController@adicionaAlbum')->middleware('auth','admin');;

//rota para mostrar a pagina de um album e artistas
Route::get('/album/{id}','MusicasController@album');
Route::get('/artista/{id}','MusicasController@artista');

Route::post('/search', 'SearchController@user');
Route::post('/search_ad', 'SearchController@admin')->middleware('auth', 'admin');

Route::get('/download/music/{caminho}', 'PagesController@download')->middleware('auth');

Route::get('/musica/{id}','MusicasController@musica');

Route::get('/perfil/saldo/{id}','PerfilController@saldo');
Route::post('/perfil/saldo/user','PerfilController@adicionarSaldo');




//ROTAS API

Route::get('/api/musicas/{id?}', ['middleware' => 'auth', function($id = null)
								  {
		 
	if($id == null)
	{
	$musica = App\Musica::all(array('id','titulo','gravadora','data_lancamento','descricao','duracao','preco','genero_id','created_at'));
	}
	else
	{
		$musica = App\Musica::find($id,array('id','titulo','gravadora','data_lancamento','descricao','duracao','preco','genero_id','created_at'));
	}
	return Response::json(array(
		'error' => false,
		'musica' => $musica,
		'status_code' => 200
		));
}]);


Route::get('/api/artistas/{id?}', ['middleware' => 'auth', function($id = null)
								  {
		 
	if($id == null)
	{
	$artista = App\Artista::all(array('id','nome','pathImagem','created_at'));
	}
	else
	{
		$artista = App\Artista::find($id,array('id','nome','pathImagem','created_at'));
	}
	return Response::json(array(
		'error' => false,
		'artista' => $artista,
		'status_code' => 200
		));
}]);

Route::get('/api/genero/{id?}', ['middleware' => 'auth', function($id = null)
								  {
		 
	if($id == null)
	{
	$genero = App\Genero::all(array('id','nome','created_at'));
	}
	else
	{
		$genero = App\Genero::find($id,array('id','nome','created_at'));
	}
	return Response::json(array(
		'error' => false,
		'genero' => $genero,
		'status_code' => 200
		));
}]);

Route::get('/api/utilizadores/{id?}', ['middleware' => 'auth', function($id = null)
								  {
		 
	if($id == null)
	{
	$utilizador = App\User::all(array('id','name','username','pais','data_nasc','email','saldo','tipo_utilizador','created_at'));
	}
	else
	{
		$utilizador = App\User::find($id,array('id','nome','created_at'));
	}
	return Response::json(array(
		'error' => false,
		'genero' => $genero,
		'status_code' => 200
		));
}]);


