@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - Tipo</title>
@endsection


@section('content')
<!--	<button onclick="goBack()">«Voltar Atrás</button>
			<script>
					function goBack() {
						window.history.back();
			}
			</script>-->
	<h1>{{$tipo->id}} - {{$tipo->tipo}}</h1>
	<ul class="list-group">
	@foreach ($registado as $registados)
		<li class="list-group-item"><a href="/user/{{$registados->id}}">{{$registados->name}}</a></li>
	@endforeach
	</ul>

	

	<?php $id = $tipo->id?>
	@if($id==2)
		<a href="#" class = "btn btn-success"> Adicionar novo Administrador</a>
	@endif

@endsection