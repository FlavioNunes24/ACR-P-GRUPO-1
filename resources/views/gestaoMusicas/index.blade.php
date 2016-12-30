@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - index</title>
@endsection

@section('content')


	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif

	<h2>Músicas</h2>
	
				<table class = "table table-striped">
				<thead>	
				<tr>
					<th>Nº</th>
					<th>Titulo</th>
					<th>Acção</th>
				</tr>
				</thead>
				<tbody>

				<?php $n=0; ?>

				@foreach($musicas as $musica)

				<tr>
				
				<td>{{++$n}}</td>	
				<td>{{$musica->titulo}}</td>
				<td>
					
					<form class = "" action="{{route('gestaoMusicas.destroy',$musica->id)}}" method="post">
						<input type="hidden" name="_method" value="delete">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<a href="{{route('gestaoMusicas.edit', $musica->id)}}" class="btn btn-primary"> Editar </a>
						<input type="submit" class="btn btn-danger" name="name" value="Eliminar">



					</form>

				</td>
				</tr>
				</tbody>
				@endforeach
</table>


<a href="{{route('gestaoMusicas.create')}}" class = "btn-gray"> Adicionar nova Música</a>
<br>
<br>


@endsection