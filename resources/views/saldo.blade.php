@extends('layouts.App')

@section('title')
	<title>Music Planet - Insere Administrador</title>
@endsection


@section('content')

<h3 class="subtitulo-pagina">Adicionar saldo</h3>


<form class="" method="POST" action="{{ action('PerfilController@adicionarSaldo')}}">

		<div class="form-group">
		<label>Valor: </label><br>
		<input type="text" name="saldo" class="form-control">

		@if ($errors->has('saldo'))
        <span class="help-block">
        <strong>{{ $errors->first('saldo') }}</strong>
        </span>
        @endif
        </div>

        <div class="form-group">
		<label>Email: </label><br>
		<input type="email" name="email" value = "" class="form-control">

		@if ($errors->has('email'))
        <span class="help-block">z
        <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        </div>

        <input type="hidden" name="id" value = "{{$user->id}}">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<button type="submit" class="btn-compra">Confirmar</button>
	</form>
	<br>
@endsection