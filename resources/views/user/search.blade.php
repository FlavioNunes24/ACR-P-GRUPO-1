@extends('layouts.App')

@section('title')
	<title>Music Planet - Procura</title>
@endsection


@section('content')
<h1>Pesquisa</h1>
<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>
@if(isset($musica))
<h2>Música</h2>
	<table class="table table-striped">
		<thead>
			<tr>
			
				<th></th>
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
		@foreach($musica as $musicas)
				<tr>
				@foreach($musicas->album()->get() as $album)
				<td>	<a href="/album/{{$album->id}}">
                      		<img src ="/images/{{$album->pathImagem}}" id = "album">
                    	</a>


                </td>
				@endforeach
				
				<td>{{$musicas->titulo}}</td>
				
				<td>

				<?php $a=$musicas->artistas()->get() ?>

				@if($a->count() > 1)
				
				@foreach($musicas->artistas()->get() as $artistas)
				{{$artistas->nome}},
				@endforeach
				
				@endif

				@if($a->count() == 1)

				@foreach($musicas->artistas()->get() as $artistas)
				{{$artistas->nome}}
				@endforeach

				@endif
				</td>
			
				<td>{{$musicas->gravadora}}</td>
				<td>{{App\Genero::find($musicas->genero_id)->nome}}</td>

				@foreach($musicas->album()->get() as $album)
				<td>
				<a href="/album/{{$album->id}}">{{$album->nome}} </a>
				</td>
				@endforeach
				
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
						<td><button type="button" onclick="efectuaCompra({{$musicas->id}})">Comprar</button></td>
					@else
						<td><a href="/download/music/{{$musicas->path}}" download> Download
						</a></td>
					@endif
				@endif
			</tr>
	
		@endforeach()
		</tbody>
	</table>
@endif
	
@if(isset($gravadora))
	<h2>Gravadora</h2>
		<table class="table table-striped">
			<thead>
				<tr>

					<th></th>
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
			@foreach($gravadora as $gravadoras)
					<tr>
					@foreach($gravadoras->album()->get() as $album)
					<td>	<a href="#">
								<img src ="/images/{{$album->pathImagem}}" id = "album">
							</a>
					</td>
					@endforeach

					<td>{{$gravadoras->titulo}}</td>

					<td>				
					@foreach($gravadoras->artistas()->get() as $artistas)
					{{$artistas->nome}},
					@endforeach
					</td>

					<td>{{$gravadoras->gravadora}}</td>
					<td>{{App\Genero::find($gravadoras->genero_id)->nome}}</td>

					@foreach($gravadoras->album()->get() as $album)
					<td>
						<a href="/album/{{$album->id}}">{{$album->nome}} </a>
					</td>
					@endforeach

					<td>{{$gravadoras->data_lancamento}}</td>
					<td>{{$gravadoras->preco}}</td>
					@if(Auth::check())
				@php ($i=0)
					@foreach($compras as $compra)
						@foreach($compra->musica()->get() as $musica)
							@if($musica->id == $gravadoras->id)
								@php ($i=1)
							@endif
						@endforeach
					@endforeach
					@if($i == 0)
						<td><button type="button" onclick="efectuaCompra({{$gravadoras->id}})">Comprar</button></td>
					@else
						<td><a href="/download/music/{{$gravadoras->path}}" download> Download
						</a></td>
					@endif
				@endif
				</tr>

			@endforeach
			</tbody>
		</table>
@endif
	
@if(isset($album_musica))
	<h2>Albums</h2>
	<table class="table table-striped">
			<thead>
				<tr>

					<th></th>
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
				@foreach($album_musica as $album_musicas)
					<tr>
						@foreach($album_musicas->album()->get() as $albums_musicas)
							<td>	<a href="#">
								<img src ="/images/{{$albums_musicas->pathImagem}}" id = "album">
							</a>
							</td>
						@endforeach
						<td>{{$album_musicas->titulo}}</td>
						<td>				
						@foreach($album_musicas->artistas()->get() as $artistas)
							{{$artistas->nome}},
						@endforeach
						</td>
						<td>{{$album_musicas->gravadora}}</td>
						<td>{{App\Genero::find($album_musicas->genero_id)->nome}}</td>
						@foreach($album_musicas->album()->get() as $album)
						<td>
							<a href="/album/{{$album->id}}">{{$album->nome}} </a>
						</td>
						@endforeach
						<td>{{$album_musicas->data_lancamento}}</td>
						<td>{{$album_musicas->preco}}</td>
						@if(Auth::check())
					@php ($i=0)
						@foreach($compras as $compra)
							@foreach($compra->musica()->get() as $musica)
								@if($musica->id == $album_musicas->id)
									@php ($i=1)
								@endif
							@endforeach
						@endforeach
						@if($i == 0)
							<td><button type="button" onclick="efectuaCompra({{$album_musicas->id}})">Comprar</button></td>
						@else
							<td><a href="/download/music/{{$album_musicas->path}}" download> Download
							</a></td>
						@endif
					@endif
					</tr>
				@endforeach
			</tbody>
	</table>
@endif

@if(isset($artistas_musica))
	<h2>Artistas</h2>
	<table class="table table-striped">
			<thead>
				<tr>

					<th></th>
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
				@foreach($artistas_musica as $artistas_musicas)
					<tr>
						@foreach($artistas_musicas->album()->get() as $artista_musicas)
							<td>	<a href="#">
								<img src ="/images/{{$artista_musicas->pathImagem}}" id = "album">
							</a>
							</td>
						@endforeach
						<td>{{$artistas_musicas->titulo}}</td>
						<td>				
						@foreach($artistas_musicas->artistas()->get() as $artistas)
							{{$artistas->nome}},
						@endforeach
						</td>
						<td>{{$artistas_musicas->gravadora}}</td>
						<td>{{App\Genero::find($artistas_musicas->genero_id)->nome}}</td>
						@foreach($artistas_musicas->album()->get() as $album)
						<td>
							<a href="/album/{{$album->id}}">{{$album->nome}} </a>
						</td>
						@endforeach
						<td>{{$artistas_musicas->data_lancamento}}</td>
						<td>{{$artistas_musicas->preco}}</td>
						@if(Auth::check())
					@php ($i=0)
						@foreach($compras as $compra)
							@foreach($compra->musica()->get() as $musica)
								@if($musica->id == $artistas_musicas->id)
									@php ($i=1)
								@endif
							@endforeach
						@endforeach
						@if($i == 0)
							<td><button type="button" onclick="efectuaCompra({{$artistas_musicas->id}})">Comprar</button></td>
						@else
							<td><a href="/download/music/{{$artistas_musicas->path}}" download> Download
							</a></td>
						@endif
					@endif
					</tr>
				@endforeach
			</tbody>
	</table>
	
@endif
	
@if(isset($mensagem))
	{{$mensagem}}
@endif
	
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