@extends('layouts.app')

@section('title')
	<title>Music Planet - Perfil</title>
@endsection


@section('content')

<h2 class="titulo-pagina">Perfil - {{$user -> name }}</h2>
<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif
	
	@if(Session::has('error'))
	<div class="alert alert-danger">{{Session::get('error')}}</div>
	@endif

<div class="row">


<!--dados pessoais-->


<div class="col-sm-5"">
	<h3 class="subtitulo-pagina">Dados Pessoais</h3>
	<hr>

	<p><strong>Nome: </strong>{{$user->name}}</p>
	<p><strong>Username: </strong>{{$user->username}}</p>
	<p><strong>Email: </strong>{{$user->email}}</p>
	<p><strong>Pais: </strong>{{$user->pais}}</p>
	<p><strong>Data de Nascimeto: </strong>{{$user->data_nasc}}</p>
	<p><strong>Saldo: </strong>{{$user->saldo}}</p>

<br>
<a href="/perfil/editar/{{$user->id}}" class = "btn-gray">Editar dados</a>
@if($user->tipo_utilizador == "1")
<a href="/perfil/saldo/{{$user->id}}" class = "btn-compra">Adicionar saldo</a>
@endif
<br>
<br>

</div>


<!--musicas-->

<div class="col-sm-7">
	<h3 class="subtitulo-pagina">Músicas</h3>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Data de Compra</th>
				<th>Título</th>
				<th>Artista</th>
				<th>Duração</th>
				<th>Data de Lançamento</th>
				<th></th>
			</tr>
		</thead>

			<tr>
				
			@foreach($compras as $compra)

					<td>{{$compra->data}}</td>

						@foreach($compra->musica()->get() as $musica)

						<td><a class = "musica-titulo" href="musica/{{$musica->id}}">{{$musica->titulo}}</a></td>
						<td>
							<?php $a=$musica->artistas()->get() ?>

							@if($a->count() > 1)
							<?php $b = 1 ?>

							@foreach($musica->artistas()->get() as $artistas)
							<?php $c = $a->count() ?>
							<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}@if($b < $c),<?php $b++?> @endif @if($b == $c) @endif</a> 	
							@endforeach

							@endif

							@if($a->count() == 1)

							@foreach($musica->artistas()->get() as $artistas)
							<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}} </a>
							@endforeach

							@endif
						</td>
						<td>{{$musica->duracao}}</td>
						<td>{{$musica->data_lancamento}}</td>
						<td><td><a href="/download/music/{{$musica->path}}" download> <button class = "btn-download" >Download</button> 
						</a></td></td>
						

						@endforeach

			</tr>	

			@endforeach



			
	</table>
</div>

</div>

@endsection