@extends('layouts.musicaApp')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')

<h1><b>Introduzir nova música</b></h1>
<hr>	

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="row">
	<div class="col-md-6">	
	<form class="" action="{{route('gestaoMusicas.store')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}

	<div class="form-group">
	<label>Titulo: </label><br>
	<input type="text" name="titulo" class="form-control">
	</div>

	<div class="form-group">
	<label>Gravadora: </label><br>
	<input type="text" name="gravadora" class="form-control">
	</div>

	<div class="form-group">
	<label>Data de Lancamento: </label><br>
	<input type="date" name="data_lancamento" class="form-control" ><br>
	</div>

	<div class="form-group">
	<label>Preço: </label><br>
	<input type="text" name="preco" class="form-control"><br>
	</div>

	<div class="form-group">
	<label>Duração: </label><br>
	<input type="text" name="duracao" class="form-control"><br>
	</div>

	<div class="form-group">
	<label>Genero: </label><br>
	<select name = "genero">
	@foreach($genero as $generos)	
	<option value ="{{$generos->id}}" > {{$generos->nome}}</option>
	@endforeach()
	</select>

	<a href="/gestao/adicionar" class="btn btn-primary btn-xs">Adicionar Genero</a>
	</div>

	<div class="form-group">
	<label>Descrição: </label><br>
	<input type="textarea" name="descricao" class="form-control" ><br>
	</div>
	
	<label>Escolha o ficheiro para upload: </label>
	<input type="file" name="file" id ="file" class="form-control" >
	<br>
	<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Guardar">
	</div>
	</form>

	</div>
</div>
<br>
@endsection