@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')

@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
@endif

<h2>Artistas</h2>
<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Acção</th>
			</tr>
		</thead>

			<tr>
				
			@foreach($artista as $artistas)

						<td><img src ="/images/artista/{{$artistas->pathImagem}}" id = "album"></td>
						<td>{{$artistas->nome}}</td>
						<td>
						<a  class = "btn btn-danger" href="/artista/remover/{{$artistas->id}}"> Eliminar </a>
						</td>

			</tr>
			@endforeach
		</table>


<h2>Adicionar novo artista:</h2>
<hr>
<div class="row">
	<div class="col-md-6">
		<form class="" method="POST" action="{{ action('GestaoController@adicionaArtista')}}" enctype="multipart/form-data">

		<div class="form-group">
		<label>Nome: </label><br>
		<input type="text" name="nome" class="form-control">

		@if ($errors->has('nome'))
        <span class="help-block">z
        <strong>{{ $errors->first('nome') }}</strong>
        </span>
        @endif
        </div>
		
		<div class="form-group">
		<label>Imagem do artista: </label>
		<input type="file" name="file" id ="file" class="form-control" >

		@if ($errors->has('file'))
        <span class="help-block">
        <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif
		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn-gray">Adicionar Artista</button>
	</form>
	</div>
	</div>
<br>
@endsection