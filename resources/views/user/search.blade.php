@extends('layouts.App')

@section('title')
	<title>Music Planet - Procura</title>
@endsection


@section('content')
<h1>Pesquisa</h1>
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
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($musica as $musicas)
				<tr>
				@foreach($musicas->album()->get() as $album)
				<td>	<a href="#">
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
					{{$album->nome}}
				</td>
				@endforeach
				
				<td>{{$musicas->data_lancamento}}</td>
				<td>{{$musicas->preco}}</td>
				<td><button type="button" onclick="efectuaCompra({{$musicas->id}})">Comprar</button></td>
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
					<th></th>
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
						{{$album->nome}}
					</td>
					@endforeach

					<td>{{$gravadoras->data_lancamento}}</td>
					<td>{{$gravadoras->preco}}</td>
					<td><button type="button" onclick="efectuaCompra({{$gravadoras->id}})">Comprar</button></td>
				</tr>

			@endforeach
			</tbody>
		</table>
@endif

	
@if(isset($mensagem))
	{{$mensagem}}
@endif

	

@endsection