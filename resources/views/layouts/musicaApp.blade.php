<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title> -->
	@yield('title')

    <!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootsrap/3.3.4/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    	

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                      <img src ="/images/logo_musicplanet.png" id = "logo">
                    </a>
                    <a class="navbar-brand" href="{{ url('/musicas') }}">
                      Músicas
                    </a>
                    <a class="navbar-brand" href="{{ url('/top') }}">
                      Top
                    </a>
                    <a class="navbar-brand" href="{{ url('/suporte') }}">
                      Suporte
                    </a>
                    @if(Auth::check() && Auth::user()->tipo_utilizador == '2')
                    <a class="navbar-brand" href="{{ url('/gestao') }}">
                      Gestão de Conteúdos
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                       <li>
                       		<a><form action="/search" method="POST" role="search">
								{{ csrf_field() }}
									<input class="form-control input-sm" type="text" name="q"
										   placeholder="Procurar" style="width: 200px; height: 25px">
								</form>
						   </a>
						   </li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
								   <li>
										<a href="{{ url('/perfil') }}">
											Perfil
										</a>
									</li>
									<li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container2">
		<div class="container">

    <h1>Gestão de Conteudo</h1>
    <hr>
    
<nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav">
    
    @foreach ($tipo_utilizadores as $tipo_utilizador)
      <li><a href="/tipo/{{$tipo_utilizador->id}}">Gestão de {{$tipo_utilizador->tipo}}</a></li>
    @endforeach
      <li><a href="/gestaoMusicas">Gestão de Músicas</a></li>
      <li><a href="/gestao/adicionar">Gêneros</a></li>
      <li><a href="/gestao/album">Gestão de Album</a></li>
      <li><a href="/gestao/artista">Gestão de Artistas</a></li>
    </ul>
  </div>
</nav>
        
        	@yield('content')
		</div>
    </div>
		</div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
