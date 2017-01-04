@extends('layouts.app')

@section('title')
	<title>Music Planet - Suporte</title>
@endsection


@section('content')

<h2 class="titulo-pagina">Suporte</h2>
<hr>

<div class="container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading" id = "head">
        <h4 class="panel-title" >
          <a data-toggle="collapse" class="titulo-collapse" data-parent="#accordion" href="#collapse1">Quem Somos?</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">

        <strong>O que é?</strong>

        <p>Com a Music Planet pode ouvir milhares de músicas.Para começar já a experimentar, basta criar uma conta, escolher que músicas comprar e começar a ouvir música no seu computador. </p>
        

        <strong>O que tem para oferecer?</strong>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,

		</p>

        <strong>Que tipos de musicas estao disponiveis?</strong>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,

		</p>

        <strong>Pagamento é seguro?</strong>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,

		</p>

        </div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading" id = "head">
        <h4 class="panel-title">
          <a data-toggle="collapse" class="titulo-collapse" data-parent="#accordion" href="#collapse2">Perguntas Frequentes</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

        <strong>O que é?</strong>

        <p>Somos uma loja de musica que pernenrf freb fre fre frere jn
        fsdfsdsdfsdfsd</p>


        <strong>Preciso registo para comprar?</strong>

        <p>Primeiro é necessario criar uma conta com os seus dados pessoais, carregar a conta e pode começar a comprar.</p>

        <strong>Como comprar?</strong>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,

		</p>

        <strong>Pagamentos disponiveis?</strong>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,

		</p>

        <strong>Como carregar a conta?</strong>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,

		</p>

        </div>
      </div>
    </div>


    <div class="panel panel-default">
      <div class="panel-heading" id = "head">
        <h4 class="panel-title">
          <a data-toggle="collapse" class="titulo-collapse" data-parent="#accordion" href="#collapse3">Contacto</a>
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
	<button type="submit" class="btn-gray">Enviar Mensagem</button>
	</form>
	<br>
		</div>
      </div>
    </div>
  </div> 
</div>

@endsection