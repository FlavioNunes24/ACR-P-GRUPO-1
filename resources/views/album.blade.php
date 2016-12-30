@extends('layouts.app')

@section('title')
	<title>Music Planet - Album</title>
@endsection

@section('content')
<h2 class="titulo-pagina">{{$album->nome}}</h2>
<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>
<hr>

<div class="col-sm-3">
<button class = "btn-download" onclick="goBack()">«Voltar Atrás</button>
			<script>
					function goBack() {
						window.history.back();
			}
			</script>
	<br>
	<img src="/images/album/{{$album->pathImagem}}" class = "foto" >
</div>
<div class="col-sm-3">
	<h3 class="subtitulo-pagina">Dados: </h3>
	<hr>

	
	<p> <strong>Nome: </strong>{{$album->nome}} <p>
	<p> <strong>Data de Lançamento: </strong>{{$album->data_lancamento}} <p>
	
	<p> <strong>Artistas: </strong>@foreach($album->artista()->get() as $artistas) {{$artistas->nome}}, @endforeach</p>


	<p><strong>Numero de Músicas:</strong> {{$a = $album->musicas()->count()}} </p> 
	
</div>
	
<div class="col-sm-6">
	<h3 class="subtitulo-pagina">Musicas:</h3>
	<hr>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Título</th>
				<th>Artista</th>
				<th>Duração</th>
				<th>Data de Lançamento</th>
				<th>Preço</th>
			</tr>
		</thead>

			<tr>
				
			@foreach($album->musicas()->get() as $musicas)

						<td>{{$musicas->titulo}}</td>
						<td>
							@foreach($musicas->artistas()->get() as $artistas)
								<a href="/artista/{{$artistas->id}}">{{$artistas->nome}} </a>
							@endforeach
						</td>
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
						<td><button class="btn-compra" type="button" onclick="efectuaCompra({{$musicas->id}})"> Comprar</button></td>
					@else
						<td><a href="/download/music/{{$musicas->path}}" download>  <button class="btn-download">Download</button> 
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