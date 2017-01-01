@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')
@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif

<h3 class="subtitulo-pagina">Albuns</h3>

<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Data de Lançamento</th>
				<th>Acção</th>
			</tr>
		</thead>

			<tr>
				
			@foreach($album as $albuns)

						<td><img src ="/images/album/{{$albuns->pathImagem}}" id = "album"></td>
						<td>{{$albuns->nome}}</td>
					
						<td>{{$albuns->data_lancamento}}</td>
						<td>
						<a  class = "btn btn-danger" href="/album/remover/{{$albuns->id}}"> Eliminar </a>
						</td>
			</tr>
			@endforeach
		</table>



<h3 class="subtitulo-pagina">Adicionar novo album:</h3>
<hr>
<div class="row">
	<div class="col-md-6">
		<form class="" method="POST" action="{{ action('GestaoController@adicionaAlbum')}}" enctype="multipart/form-data">

		<div class="form-group">
		<label>Nome: </label><br>
		<input type="text" name="nome" class="form-control">

		@if ($errors->has('nome'))
        <span class="help-block">
        <strong>{{ $errors->first('nome') }}</strong>
        </span>
        @endif


		</div>

		<div class="form-group">
		<label>Data de Lançamento: </label><br>
		<input type="date" name="data_lancamento" class="form-control" >

		@if ($errors->has('data_lancamento'))
        <span class="help-block">
        <strong>{{ $errors->first('data_lancamento') }}</strong>
        </span>
        @endif

		</div>


		<div class="form-group">
		<label>Imagem do album: </label>
		<input type="file" name="file" id ="file" class="form-control" >

		@if ($errors->has('file'))
        <span class="help-block">
        <strong>{{ $errors->first('file') }}</strong>
        </span>
        @endif

		</div>

		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn-gray">Adicionar</button>
		
		</form>
		<br>
	</div>
</div>


@endsection