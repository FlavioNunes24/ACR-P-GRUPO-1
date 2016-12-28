@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')

<h1>Generos</h1>


		
				<table class = "table table-striped">
				<thead>	
				<tr>
					<th>Nº</th>
					<th>Nome</th>
					<th></th>
				</tr>
				</thead>

				<tbody>
				@foreach($genero as $generos)
				<tr>
					<td>{{$generos->id}}</td>
					<td>{{$generos->nome}}</td>
					<td>					

					<a  class = "btn btn-danger" href="/gestao/remover/{{$generos->id}}"> Eliminar </a>

					</td>
				</tr>
				@endforeach
				
				</tbody>

			</table>

<hr>

<div class="col-md-6">
	<form class="" method="POST" action="{{ action('GestaoController@guardar')}}">

	<div class="form-group">
	<label>Nome: </label><br>
	<input type="text" name="genero" class="form-control">

	@if ($errors->has('genero'))
    <span class="help-block">
    <strong>{{ $errors->first('genero') }}</strong>
    </span>
    @endif
	</div>

	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<button type="submit" class="btn btn-success">Adicionar</button>
	</form>
	<br>
</div>

@endsection