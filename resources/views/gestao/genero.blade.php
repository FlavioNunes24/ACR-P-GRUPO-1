@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')

<h1>Generos</h1>

<div class = "panel panel-default">
	
		<div class = "panel-body">
		
				<table class = "table table-striped">
				<thead>	
				<tr>
					<th>Nº</th>
					<th>Nome</th>
				</tr>
				</thead>

				<tbody>
				@foreach($genero as $generos)
				<tr>
					<td>{{$generos->id}}</td>
					<td>{{$generos->nome}}</td>
				</tr>
				@endforeach
				
				</tbody>

			</table>
</div>
</div>
<hr>

<div class="col-md-4">
	<form class="" method="POST" action="{{ action('GestaoController@guardar')}}">

	<div class="form-group">
	<label>Nome: </label><br>
	<input type="text" name="genero" class="form-control">
	</div>


	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<button type="submit" class="btn btn-success">Adicionar</button>
	</form>
	<br>
</div>
@endsection