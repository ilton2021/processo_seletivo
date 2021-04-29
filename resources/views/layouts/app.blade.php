<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
	  		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
					<span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
					<img src="{{asset('img/Imagem1.png')}}" style="margin-left:20px;"  height="80" class="d-inline-block align-rigth" alt="">
					
					<span class="navbar-brand mb-0 h1" style="margin-left: 80px;margin-top:5px;color: #008800 !important">
                     <h4 class="d-none d-sm-block" style="font-family: Times, Times New Roman, Georgia, serif;">PROCESSO SELETIVO</h4>
				    </span>					
					
					<ul style="margin-left: 70px" class="navbar-nav mr-auto">
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Cadastros
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						  <a class="dropdown-item" href="#">Processo Seletivo</a>
						  <a class="dropdown-item" href="{{ route('cadastroUnidade') }}">Unidade</a>
						</div>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Avaliação
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown2">
						  <a class="dropdown-item" href="#">Processo Seletivo</a>
						</div>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Resultados
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown3">
						  <a class="dropdown-item" href="#">Processo Seletivo</a>
						</div>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Nº de Inscritos
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown4">
						  <a class="dropdown-item" href="#">Processo Seletivo</a>
						</div>
					  </li>
					  <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown5" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Sistema
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown5">
						  <a class="dropdown-item" href="#">Adicionar Usuário</a>
						</div>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" href="#">Sair</a>
					  </li>
					</ul>
				  </div>    
		</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
