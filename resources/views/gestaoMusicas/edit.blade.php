@extends('layouts.app')

@section('title')
	<title>Music Planet - About</title>
@endsection

@section('content')

	<h1><b> Editar dados de música </b></h1>
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
	<form class="" action="{{route('gestaoMusicas.update',$musica->id)}}" method="post" nctype="multipart/form-data">
	{{ csrf_field() }}

	<input name="_method" type="hidden" value ="PATCH">

	<div class="form-group">
	<label>Titulo: </label><br>
	<input type="text" name="titulo" class="form-control" value ="{{$musica->titulo}}">
	</div>

	<div class="form-group">
	<label>Gravadora: </label><br>
	<input type="text" name="gravadora" class="form-control" value ="{{$musica->gravadora}}">
	</div>

	<div class="form-group">
	<label>Data de Lancamento: </label><br>
	<input type="date" name="data_lancamento" class="form-control" value ="{{$musica->data_lancamento}}"><br>
	</div>

	<div class="form-group">
	<label>Preço: </label><br>
	<input type="text" name="preco" class="form-control" value ="{{$musica->preco}}"><br>
	</div>

	<div class="form-group">
	<label>Duração: </label><br>
	<input type="text" name="duracao" class="form-control" value ="{{$musica->duracao}}"><br>
	</div>

	<div class="form-group">
	<label>Genero: </label><br>
	<select name = "genero">
	@foreach($genero as $generos)	
	<option value ="{{$generos->id}}" > {{$generos->nome}}</option>
	@endforeach()
	</select>
	</div>



	<div class="form-group">
	<label>Descrição: </label><br>
	<input type="textarea" name="descricao" class="form-control" value ="{{$musica->descricao}}" ><br>
	</div>

	<strong><p>Impossivel alterar a música carregada</p></strong><br>

	<strong><p>Impossivel alterar a preview da música carregada</p></strong><br>

	<div class="form-group">
	<input type="submit" class="btn btn-primary" value="Guardar">
	</div>
	</form>

	</div>
</div>
<br>
@endsection