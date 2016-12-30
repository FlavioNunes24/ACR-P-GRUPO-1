@extends('layouts.app')

@section('title')
	<title>Music Planet - Música</title>
@endsection


@section('content')
<h2 class="titulo-pagina">{{$musica2->titulo}} - @foreach($musica2->artistas()->get() as $artista){{$artista->nome}}, @endforeach</h2>
<hr>
<button class = "btn-download"onclick="goBack()">«Voltar Atrás</button>
	<script>
		function goBack() {
			window.history.back();
	}
	</script>
	<br>
	<br>

<div id="myElem" class="alert alert-success" style="display:none">
  <strong>A música foi comprada com sucesso!</strong>
</div>

<div id="myElem2" class="alert alert-danger" style="display:none">
  <strong>A compra da música falhou!</strong>
</div>


<div style="width=100%;">
<audio controls preload="">
  	<source src="/music/{{$caminho = $musica2->path}}" type="audio/mpeg">
</audio><br>
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