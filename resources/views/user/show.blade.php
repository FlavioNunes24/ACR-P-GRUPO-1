@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - User</title>
@endsection


@section('content')
	<button onclick="goBack()">«Voltar Atrás</button>
			<script>
					function goBack() {
						window.history.back();
			}
			</script>
	<h1>{{$tipo}} - {{$user->name}}</h1>
<!--	<h1>{{$user->username}}</h1>
	-->
	<hr>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nome</th>
				<th>Username</th>
				<th>País</th>
				<th>Data de Nascimento</th>
				<th>Email</th>
				<th>Saldo</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->username}}</td>
					<td>{{$user->pais}}</td>
					<td>{{$user->data_nasc}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->saldo}}</td>
			</tr>
		</tbody>
	</table>
@endsection