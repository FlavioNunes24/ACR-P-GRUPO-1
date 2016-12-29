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
	
	<div class="col-md-12">	
		<form class="form-inline" action="{{route('gestaoMusicas.store')}}" method="post" enctype="multipart/form-data">
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
	<label>Descrição: </label><br>
	<input type="textarea" name="descricao" class="form-control" ><br>
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

	<br>
	<div class="form-group">
	<label>Album(s):</label> <br>
	@foreach($album as $albuns)
	<input type="checkbox" name="album[]" value = "{{$albuns->id}}"> {{$albuns->nome}} <br>
	@endforeach
	<a href="/gestao/album" class="btn btn-primary btn-xs">Adicionar Album</a>
	</div>
	<br>
	<div class="form-group">
	<label>Artista(s):</label><br>
	@foreach($artista as $artistas)
	<input type="checkbox" name="artista[]" value="{{$artistas->id}}">{{$artistas->nome}} <br>
	@endforeach	
	<a href="/gestao/artista" class="btn btn-primary btn-xs">Adicionar Artista</a>
	</div>

	<br>
	<label>Escolha o ficheiro para upload: </label>
	<input type="file" name="file" id ="file" class="form-control" >
	<br>
	<div class="form-group">
	<input type="submit" class="btn btn-success" value="Guardar">
	
	</form>
		</div>
	</div>

</div>
<br>
@endsection