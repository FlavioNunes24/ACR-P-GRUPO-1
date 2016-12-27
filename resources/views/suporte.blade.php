@extends('layouts.app')

@section('title')
	<title>Music Planet - Suporte</title>
@endsection


@section('content')

<h1>Suporte</h1>
<hr>

<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Quem Somos?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">

        <strong>O que é?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>
        

        <strong>O que tem para oferecer?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd.Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>

        <strong>Que tipos de musicas estao disponiveis?</strong>
        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfs</p>

        <strong>Pagamento é seguro?</strong>
        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsdSomos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsd fsdfs</p>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Perguntas Frequentes</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <strong>O que é?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>


        <strong>Preciso registo para comprar?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>

        <strong>Como comprar?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>

        <strong>Pagamentos disponiveis?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>

        <strong>Como carregar a conta?</strong>

        <p>metenjhew de w vrwv wvw ewdwe askmdça as ascas</p>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Contacto</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
		{{csrf_field()}}
	<form class="" method="POST" action="{{ action('SuporteController@enviarMensagem')}}">

	<div class="form-group">
	<label>Nome: </label><br>
	<input type="nome" name="nome" class="form-control">
	</div>

	<div class="form-group">
	<label>Email: </label><br>
	<input type="email" name="email_contacto" class="form-control">
	</div>

	<div class="form-group">
	<label>Assunto: </label><br>
	<input type="text" name="assunto" class="form-control">
	</div>

	<div class="form-group">
	<label>Mensagem: </label><br>
	<textarea name="mensagem" class="form-control" rows="5">Escreva a mensagem aqui...</textarea> 
	</div> 

	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<button type="submit" class="btn btn-success">Enviar Mensagem</button>
	</form>
	<br>
		</div>
      </div>
    </div>
  </div> 
</div>
@endsection