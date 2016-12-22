@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')


<div class="row">
	<div class="col-md-6">
		<form class="" method="POST" action="{{ action('GestaoController@adicionaAlbum')}}">

		<div class="form-group">
		<label>Nome: </label><br>
		<input type="text" name="nome" class="form-control">
		</div>

		<div class="form-group">
		<label>Data de Lançamento: </label><br>
		<input type="date" name="data_lancamento" class="form-control" >
		</div>

		<div class="form-group">
		<label>Artista: </label><br>
		<input type="text" name="artista" class="form-control">
		</div>

		<div class="form-group">
		<label>Preço: </label><br>
		<input type="text" name="preco" class="form-control">
		</div>

		<div class="form-group">
		<label>Imagem do album: </label>
		<input type="file" name="file" id ="file" class="form-control" >
		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn btn-success">Adicionar</button>
		
		</form>
		<br>
	</div>
</div>


@endsection