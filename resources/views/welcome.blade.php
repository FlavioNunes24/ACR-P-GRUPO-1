@extends('layouts.app')

@section('title')
	<title>Music Planet</title>
@endsection



@section('slideshow')

<div>

<a class="w3-btn-floating w3-hover-dark-grey w3-display-left" onclick="plusDivs(-1)">&#10094;</a>
<a class="w3-btn-floating w3-hover-dark-grey w3-display-right" onclick="plusDivs(1)">&#10095;</a>

<!--<div class="w3-display-container mySlides">
	<img  src="/images/background_music.png" style="width:100%; height: 600px;">
	 <div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
    	Trolltunga, Norway
  	</div>
</div>
<img class="mySlides" src="/images/maxresdefault.jpg">
<img class="mySlides" src="/images/teste.png">-->

	@foreach($abc->sortByDesc('compra_count') as $top)
		<div class="w3-display-container mySlides">
			@foreach($top->album()->get() as $album)
				@if($top->album->count() == 1)
					<img src ="/images/album/{{$album->pathImagem}}" style="width:100%; height: 600px;">
				@endif
			@endforeach
				@if($top->album->count() > 1)
					<img src ="/images/album/{{$album->pathImagem}}" style="width:100%; height: 600px;">
				@endif
			<div class="w3-display-bottomleft w3-large w3-container w3-padding-16 w3-black">
				{{$top->titulo}} - 
				<?php $a=$top->artistas()->get() ?>
				@if($a->count() > 1)
					@foreach($top->artistas()->get() as $artistas)
						{{$artistas->nome}},
					@endforeach
				@endif
				
				@if($a->count() == 1)
					@foreach($top->artistas()->get() as $artistas)
						{{$artistas->nome}}
					@endforeach
				@endif
			</div>
		</div>
	@endforeach

</div>


<br>	
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script>
@endsection


@section('content')
<h1>Bem-vindo a Music Planet</h1>
<hr>
<h3>Músicas mais recentes</h3>
<hr>

<table class="table table-striped">
	<thead>
		<tr>
			<th></th>
			<th>Título</th>
			<th>Artistas</th>
			<th>Album</th>
			<th>Lançado</th>
			<th>Preview</th>
			<th>Preço</th>
			@if(Auth::check())
			<th></th>
			@endif
		</tr>
	</thead>

		@foreach($recent as $musicas)
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
						<a href="musica/{{$musicas->id}}">{{$musicas->titulo}}</a>
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
						<a class="musica-artista"  href="artista/{{$artistas->id}}">{{$artistas->nome}}@if($b < $c),<?php $b++?> @endif @if($b == $c) @endif</a>	
						@endforeach

						@endif

						@if($a->count() == 1)

						@foreach($musicas->artistas()->get() as $artistas)
						<a class="musica-artista" href="artista/{{$artistas->id}}">{{$artistas->nome}} </a>
						@endforeach

						@endif
					</td>
					
					<td>
						<?php $a=$musicas->album()->get() ?>

						@if($a->count() > 1)
						<?php $b = 1 ?>

						@foreach($musicas->album()->get() as $album)
						<?php $c = $a->count() ?>
						<a href="album/{{$album->id}}">	{{$album->nome}}@if($b < $c),<?php $b++?> @endif @if($b == $c)@endif </a>
						@endforeach

						@endif

						@if($a->count() == 1)

						@foreach($musicas->album()->get() as $album)
						<a href="album/{{$album->id}}">	{{$album->nome}} </a>
						@endforeach

						@endif
					</td>
					
					<td>{{$musicas->data_lancamento}}</td>
						
					<td class="centro">
						<div class="button-alt-welcome">
						<a onclick="this.firstChild.play()" class="button"><audio src="/music/preview/{{$caminho = $musicas->pathPreview}}"></audio>&#9658;</a>
						</div>

					</td>
						
					<td >{{$musicas->preco}}</td>
					
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