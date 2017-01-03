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
				<th>Preview</th>
				<th>Preço</th>
				@if(Auth::check())
				<th></th>
				@endif
			</tr>
		</thead>
		<tbody>
		@foreach($musica as $musicas)
			
			
			@php ($i=0)
			@if(Auth::check())
				@foreach($compras as $compra)
					@foreach($compra->musica()->get() as $musica)
						@if($musica->id == $musicas->id)
							@php ($i=1)
						@endif
					@endforeach
				@endforeach
			@endif

			
				<tr class="abcda">
				@foreach($musicas->album()->get() as $album)
				@if($musicas->album()->count() == 1)
				<td>	<a href="/album/{{$album->id}}">
                      		<img src ="/images/album/{{$album->pathImagem}}" id = "album">
                    	</a>
                </td>
                @endif
				@endforeach
				
				@if($musicas->album()->count() > 1)
					<td>
						<a href="album/{{$album->id}}">
                   	 <img src ="/images/album/{{$album->pathImagem}}" id = "album">
               		</a>
                	</td>

				@endif
				
				<td >
					@if($i == 1)
					<a href="musica/{{$musicas->id}}">{{$musicas->titulo}}</a>
					@else
						{{$musicas->titulo}}
					@endif
				</td>
				
				<td>

				<?php $a=$musicas->artistas()->get() ?>

				@if($a->count() > 1)
				<?php $b = 1?>
				
				@foreach($musicas->artistas()->get() as $artistas)
				<?php $c = $a->count() ?>
				<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}@if($b < $c),<?php $b++?> @endif
				@if($b == $c) @endif </a>
				@endforeach
				
				@endif

				@if($a->count() == 1)

				@foreach($musicas->artistas()->get() as $artistas)
				<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}
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
					
				<td>
					
					<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $musicas->pathPreview}}"></audio>&#9658;</a>
					
				</td>
					
				<td>{{$musicas->preco}}</td>
				@if(Auth::check())
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
				<tr >

					<th></th>
					<th>Título</th>
					<th>Artistas</th>
					<th>Gravadora</th>
					<th>Gênero</th>
					<th>Album</th>
					<th>Lançado</th>
					<th>Preview</th>
					<th>Preço</th>
					@if(Auth::check())
					<th></th>
					@endif
				</tr>
			</thead>
			<tbody>
			@foreach($gravadora as $gravadoras)
				
				
				@php ($i=0)
			@if(Auth::check())
					@foreach($compras as $compra)
						@foreach($compra->musica()->get() as $musica)
							@if($musica->id == $gravadoras->id)
								@php ($i=1)
							@endif
						@endforeach
					@endforeach
				@endif
				
				
					<tr class="abcda">
					@foreach($gravadoras->album()->get() as $album)
					@if($gravadoras->album()->count() == 1)
					<td>	<a href="album/{{$album->id}}">
								<img src ="/images/album/{{$album->pathImagem}}" id = "album">
							</a>
					</td>
					@endif
					@endforeach
					
					@if($gravadoras->album()->count() > 1)
					<td>
						<a href="album/{{$album->id}}">
                   	 <img src ="/images/album/{{$album->pathImagem}}" id = "album">
               		</a>
                	</td>

					@endif

					
					

					<td >
					@if($i == 1)
					<a href="musica/{{$gravadoras->id}}">{{$gravadoras->titulo}}</a>
					@else
						{{$gravadoras->titulo}}
					@endif
					</td>

					<td>				
					@foreach($gravadoras->artistas()->get() as $artistas)
					<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}, </a>
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
						
					<td>
					
						<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $gravadoras->pathPreview}}"></audio>&#9658;</a>

					</td>
						
					<td>{{$gravadoras->preco}}</td>
					@if(Auth::check())
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
					<th>Preview</th>
					<th>Preço</th>
					@if(Auth::check())
					<th></th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach($album_musica as $album_musicas)
				
				
				@php ($i=0)
				@if(Auth::check())
					@foreach($compras as $compra)
						@foreach($compra->musica()->get() as $musica)
							@if($musica->id == $album_musicas->id)
								@php ($i=1)
							@endif
						@endforeach
					@endforeach
				@endif
				
				
					<tr class="abcda">
						@foreach($album_musicas->album()->get() as $albums_musicas)
						@if($album_musicas->album()->count() == 1)
							<td>	<a href="album/{{$albums_musicas->id}}">
								<img src ="/images/album/{{$albums_musicas->pathImagem}}" id = "album">
							</a>
							</td>
							@endif
						@endforeach
						
						@if($album_musicas->album()->count() > 1)
							<td>	<a href="album/{{$albums_musicas->id}}">
								<img src ="/images/{{$albums_musicas->pathImagem}}" id = "album">
							</a>
							</td>
							@endif
						
						
						<td >
							@if($i == 1)
							<a href="musica/{{$album_musicas->id}}">{{$album_musicas->titulo}}</a>
							@else
								{{$album_musicas->titulo}}
							@endif
						</td>
						<td>				
						@foreach($album_musicas->artistas()->get() as $artistas)
							<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}, </a>
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
							
						<td>
					
							<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $album_musicas->pathPreview}}"></audio>&#9658;</a>

						</td>
							
						<td>{{$album_musicas->preco}}</td>
						@if(Auth::check())
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
					<th>Preview</th>
					<th>Preço</th>
					@if(Auth::check())
					<th></th>
					@endif
				</tr>
			</thead>
			<tbody>
				@foreach($artistas_musica as $artistas_musicas)
				
				@php ($i=0)
				@if(Auth::check())
						@foreach($compras as $compra)
							@foreach($compra->musica()->get() as $musica)
								@if($musica->id == $artistas_musicas->id)
									@php ($i=1)
								@endif
							@endforeach
						@endforeach
					@endif
				
				
				
					<tr class="abcda">
						@foreach($artistas_musicas->album()->get() as $artista_musicas)
							@if($artistas_musicas->album()->count() == 1)
							<td>	<a href="album/{{$artista_musicas->id}}">
								<img src ="/images/album/{{$artista_musicas->pathImagem}}" id = "album">
							</a>
							</td>
							@endif
						@endforeach
						
						@if($artistas_musicas->album()->count() > 1)
							<td>	<a href="album/{{$artista_musicas->id}}">
								<img src ="/images/{{$artista_musicas->pathImagem}}" id = "album">
							</a>
							</td>
						@endif
						
						
						<td >
							@if($i == 1)
							<a href="musica/{{$artistas_musicas->id}}">{{$artistas_musicas->titulo}}</a>
							@else
								{{$artistas_musicas->titulo}}
							@endif
						</td>
						
						<td>				
						@foreach($artistas_musicas->artistas()->get() as $artistas)
							<a class="musica-artista"  href="artista/{{$artistas->id}}">{{$artistas->nome}}, </a>
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
							
						<td>
					
							<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $artistas_musicas->pathPreview}}"></audio>&#9658;</a>

						</td>
							
						<td>{{$artistas_musicas->preco}}</td>
						@if(Auth::check())
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