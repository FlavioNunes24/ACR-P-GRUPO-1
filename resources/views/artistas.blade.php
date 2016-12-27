@extends('layouts.app')

@section('title')
	<title>Music Planet - Artista</title>
@endsection

@section('content')
<h1>{{$artista->nome}}</h1>
<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>
<hr>

<div class="col-sm-3">
<button onclick="goBack()">«Voltar Atrás</button>
			<script>
					function goBack() {
						window.history.back();
			}
			</script>
	<br>
	<img src="/images/artista/{{$artista->pathImagem}}" class = "foto">
</div>
<div class="col-sm-3">
	<h2>Dados: </h2>
	<hr>

	
	<p> <strong>Nome: </strong>{{$artista->nome}} <p>
	
	<p> <strong>Albuns: </strong>@foreach($artista->album()->get() as $albuns) {{$albuns->nome}}, @endforeach</p>


	<p><strong>Numero de Músicas:</strong> {{$a = $artista->musicas()->count()}} </p> 
	
</div>
	
<div class="col-sm-6">
	<h2>Musicas</h2>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Título</th>
				<th>Duração</th>
				<th>Data de Lançamento</th>
				<th>Preço</th>
				<th></th>
			</tr>
		</thead>

			<tr>
				
			@foreach($artista->musicas()->get() as $musicas)

						<td>{{$musicas->titulo}}</td>
						<td>{{$musicas->duracao}}</td>
						<td>{{$musicas->data_lancamento}}</td>	
						<td>{{$musicas->preco}}</td>
			
			@if(Auth::check())
				@php ($i=0)
					@foreach($compras as $compra)
						@foreach($compra->musica()->get() as $musica)
							@if($musica->id == $musicas->id)
								@php ($i=1)
							@endif
						@endforeach
					@endforeach
					@if($i == 0)
						<td><button type="button" onclick="efectuaCompra({{$musicas->id}})"> Comprar</button></td>
					@else
						<td><a href="/download/music/{{$musicas->path}}" download>  <button>Download</button> 
						</a></td>
					@endif
				@endif

			</tr>	
		@endforeach

</table>	
	
</div>

	<script>
		function efectuaCompra(id){
			$.ajax({
				type: "POST", 
				data: {"id":id,
					  "_token": "{{ csrf_token() }}"},
				url: '/musicas/compra',
				success: function (data) {
					if(data.sucesso == 1)
						{
               				$("#myElem").show();
               				setTimeout(function() { $("#myElem").hide(); }, 5000);
						}
						window.location.reload();
        			},
				error: function (data)
				{
					$("#myElem2").show();
               				setTimeout(function() { $("#myElem2").hide(); }, 5000);
				}
			});
		}
	</script>

@endsection