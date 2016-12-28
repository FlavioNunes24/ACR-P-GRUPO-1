@extends('layouts.app')

@section('title')
	<title>Music Planet - Pesquisa admin</title>
@endsection


@section('content')
	<center><a><form action="/search_ad" method="POST" role="search">
		{{ csrf_field() }}
			<input class="form-control input-sm" type="text" name="q_admin"
				   placeholder="Procurar utilizadores registados" style="width: 500px; height: 35px">
		</form>
   </a></center>
   
   <h2>Pesquisa</h2>
   @if(isset($mensagem))
	{{$mensagem}}
   @else
  		<h3>Administrador</h3>
   				<table class="table table-striped">
   					<thead>
   						<tr>
   							<th>ID</th>
   							<th>Nome</th>
   							<th>Username</th>
   							<th>País</th>
   							<th>Data de Nascimento</th>
   							<th>Email</th>
   							<th>Saldo</th>
   						</tr>
   					</thead>
   					<tbody>
   						@foreach($user as $users)
   							@if($users->tipo_utilizador == 2)
   							<tr>
   								<td>{{$users->id}}</td>
								<td><a href="/user/{{$users->id}}">{{$users->name}}</a></td>
   								<td>{{$users->username}}</td>
   								<td>{{$users->pais}}</td>
   								<td>{{$users->data_nasc}}</td>
   								<td>{{$users->email}}</td>
   								<td>{{$users->saldo}}</td>
   							</tr>
   							@endif
						@endforeach
   					</tbody>
   				</table>
			<h3>Cliente</h3>
				<table class="table table-striped">
   					<thead>
   						<tr>
   							<th>ID</th>
   							<th>Nome</th>
   							<th>Username</th>
   							<th>País</th>
   							<th>Data de Nascimento</th>
   							<th>Email</th>
   							<th>Saldo</th>
   						</tr>
   					</thead>
   					<tbody>
   						@foreach($user as $users)
   							@if($users->tipo_utilizador == 1)
   							<tr>
   								<td>{{$users->id}}</td>
   								<td><a href="/user/{{$users->id}}">{{$users->name}}</a></td>
   								<td>{{$users->username}}</td>
   								<td>{{$users->pais}}</td>
   								<td>{{$users->data_nasc}}</td>
   								<td>{{$users->email}}</td>
   								<td>{{$users->saldo}}</td>
   							</tr>
   							@endif
						@endforeach
   					</tbody>
   				</table>
   @endif

@endsection