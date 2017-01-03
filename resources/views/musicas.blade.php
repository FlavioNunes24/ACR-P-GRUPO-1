@extends('layouts.app')

@section('title')
	<title>Music Planet - Músicas</title>
@endsection


@section('content')
<h2 class="titulo-pagina">Músicas</h2>
<hr>

<!--@if(Session::has('message')) <div class="alert alert-info"> {{Session::get('message')}} </div> @endif -->
<!--<p id="myElem" style="display:none">Saved</p> -->
<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>



	<table class="table table-striped">
		<thead>
			<tr>
			
				<th></th>
				<th >Título</th>
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
				<td >

					<a href="album/{{$album->id}}">
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
					<a  href="musica/{{$musicas->id}}">{{$musicas->titulo}}</a>
					@else
						{{$musicas->titulo}}
					@endif
				</td>
				
				<td>

				<?php $a=$musicas->artistas()->get() ?>

				@if($a->count() > 1)

				<?php $b = 1 ?>


				@foreach($musicas->artistas()->get() as $artistas)
			

				<?php $c = $a->count() ?>
				
				
				<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}}
				@if($b < $c),<?php $b++?> @endif @if($b == $c) @endif </a>	

				@endforeach
				@endif
	
				@if($a->count() == 1)

				@foreach($musicas->artistas()->get() as $artistas)
				<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}} </a>
				@endforeach

				@endif
				</td>
			
				<td > {{$musicas->gravadora}}</td>

				<td>{{App\Genero::find($musicas->genero_id)->nome}}</td>

				
				<td>
				<?php $a=$musicas->album()->get() ?>

				@if($a->count() > 1)

				<?php $b = 1 ?>
			
				@foreach($musicas->album()->get() as $album)
				<?php $c = $a->count() ?>

					<a href="album/{{$album->id}}">	{{$album->nome}}@if($b < $c),<?php $b++?> @endif
				@if($b == $c) @endif</a>

				@endforeach
				
				@endif

				@if($a->count() == 1)

				@foreach($musicas->album()->get() as $album)
				<a href="album/{{$album->id}}">	{{$album->nome}} </a>
				@endforeach

				@endif
				</td>
				
				
				<td>{{$musicas->data_lancamento}}</td>
				<td>
					
					<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $musicas->pathPreview}}"></audio>&#9658;</a>
					
				</td>
				<td>{{$musicas->preco}}</td>
				
					
				@if(Auth::check())
					@if($i == 0)
						<td><button class = "btn-compra" type="button" onclick="efectuaCompra({{$musicas->id}})">Comprar</button></td>
					@else
						<td><a href="/download/music/{{$musicas->path}}" download> <button class = "btn-download" >Download</button> 
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