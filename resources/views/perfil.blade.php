@extends('layouts.app')

@section('title')
	<title>Music Planet - Perfil</title>
@endsection


@section('content')

<h1>Perfil - {{$user -> name }}</h1>
<hr>

	@if(Session::has('message'))
	<div class="alert alert-success">{{Session::get('message')}}</div>
	@endif

<div class="row">


<!--dados pessoais-->


<div class="col-sm-5"">
	<h1>Dados Pessoais</h1>
	<hr>

	<p><strong>Nome: </strong>{{$user->name}}</p>
	<p><strong>Username: </strong>{{$user->username}}</p>
	<p><strong>Email: </strong>{{$user->email}}</p>
	<p><strong>Pais: </strong>{{$user->pais}}</p>
	<p><strong>Data de Nascimeto: </strong>{{$user->data_nasc}}</p>
	<p><strong>Saldo: </strong>{{$user->saldo}}</p>

<br>
<a href="/perfil/editar/{{$user->id}}" class = "btn btn-primary"> Editar dados</a>

</div>

<!--musicas-->

<div class="col-sm-7">
	<h1>Musicas</h1>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Data de Compra</th>
				<th>Título</th>
				<th>Duração</th>
				<th>Data de Lançamento</th>
			</tr>
		</thead>

			<tr>
				
			@foreach($compras as $compra)

					<td>{{$compra->data}}</td>

						@foreach($compra->musica()->get() as $musica)

						<td>{{$musica->titulo}}</td>
						<td>{{$musica->duracao}}</td>
						<td>{{$musica->data_lancamento}}</td>
						

						@endforeach

			</tr>	

			@endforeach



			
	</table>
</div>



@endsection