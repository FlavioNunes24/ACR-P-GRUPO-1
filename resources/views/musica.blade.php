@extends('layouts.app')

@section('title')
	<title>Music Planet - Música</title>
@endsection


@section('content')
<h2 class="titulo-pagina">{{$musica->titulo}} - @foreach($musica->artistas()->get() as $artista){{$artista->nome}}, @endforeach</h2>
<hr>

<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>

<audio controls preload="">
  	<source src="/music/{{$caminho = $musica->path}}" type="audio/mpeg">
</audio><br>








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