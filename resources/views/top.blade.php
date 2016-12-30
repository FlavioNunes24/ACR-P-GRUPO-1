@extends('layouts.app')

@section('title')
	<title>Music Planet - Top</title>
@endsection


@section('content')

<h2 class="titulo-pagina" >Top</h2>
<hr>
<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>
<table class="table table-striped">
		<thead>
			<tr>
			
				<th>#</th>
				<th>Título</th>
				<th>Artistas</th>
				<th>Gravadora</th>
				<th>Gênero</th>
				<th>Album</th>
				<th>Lançado</th>
				<th>Preço</th>
				@if(Auth::check())
				<th></th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach($abc->sortByDesc('compra_count') as $abcd)
		<tr>
			@foreach($abcd->album()->get() as $album)

				@if($abcd->album()->count() == 1)
				<td>

					<a href="album/{{$album->id}}">
                   	 	<img src ="/images/album/{{$album->pathImagem}}" id = "album">
               		</a>

                </td>
				@endif
			@endforeach
				@if($abcd->album()->count() > 1)
				<td>
					<a href="album/{{$album->id}}">
                   	 	<img src ="/images/album/{{$album->pathImagem}}" id = "album">
               		</a>

                </td>

				@endif


			<td>{{$abcd->titulo}}</td>
			<td>
				<?php $a=$abcd->artistas()->get() ?>

				@if($a->count() > 1)
				
				@foreach($abcd->artistas()->get() as $artistas)
				<a href="artista/{{$artistas->id}}">{{$artistas->nome}}, </a>	
				@endforeach
				
				@endif

				@if($a->count() == 1)

				@foreach($abcd->artistas()->get() as $artistas)
				<a href="artista/{{$artistas->id}}">{{$artistas->nome}} </a>
				@endforeach

				@endif
			</td>
			<td>{{$abcd->gravadora}}</td>
			<td>{{App\Genero::find($abcd->genero_id)->nome}}</td>
			
				<td>
				@foreach($abcd->album()->get() as $album)
				<a href="album/{{$album->id}}">	{{$album->nome}}, </a>
				@endforeach
				</td>

			<td>{{$abcd->data_lancamento}}</td>
			<td>{{$abcd->preco}}</td>
			@if(Auth::check())
				@php ($i=0)
					@foreach($compras as $compra)
						@foreach($compra->musica()->get() as $musica)
							@if($musica->id == $abcd->id)
								@php ($i=1)
							@endif
						@endforeach
					@endforeach
					@if($i == 0)
						<td><button class = "btn-compra"type="button" onclick="efectuaCompra({{$abcd->id}})">Comprar</button></td>
					@else
						<td><a href="/download/music/{{$abcd->path}}" download> <button class = "btn-download">Download</button> 
						</a></td>
					@endif
				@endif
		</tr>
		@endforeach
	</tbody>
</table>


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