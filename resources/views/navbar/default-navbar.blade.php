<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <style type="text/css">
    .scrollable-menu {
      height: auto;
      max-height: 300px;
      overflow-x: visible;
      overflow-y: scroll;
    }
  </style>
</head>

<body style="overflow-y:scroll;">
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/home') }}">Processo Seletivo <span class="sr-only">(página atual)</span></a>
        </li>
        @if(Auth::user()->perfil == "administrador" || Auth::user()->perfil == "dp" || Auth::user()->perfil == "rh")
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('cadastroUnidade') }}">Unidade</a>
            <a class="dropdown-item" href="{{ route('cadastroProcesso') }}">Processo Seletivo</a>
            <a class="dropdown-item" href="{{ route('cadastroQuadroAvisos') }}">Quadro de Avisos</a>
            <a class="dropdown-item" href="{{ route('cadastroPerguntas') }}">Perguntas</a>
          </div>
        </li>
        @endif
        @if(Auth::user()->perfil == "gestor")
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('pesquisaAvaliacaoGestor') }}">Parecer</a>
        </li>
        @endif
        @if(Auth::user()->perfil == "administrador" || Auth::user()->perfil == "dp" || Auth::user()->perfil == "rh")
        <li class="nav-item dropdown">
          <a class="nav-link" href="{{ route('pesquisaAvaliacao') }}">Avaliação</a>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sistema
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::user()->perfil == "administrador")
            <a class="dropdown-item" href="{{ route('telaRegistro') }}">Adicionar Usuário</a>
            @endif
            <form id="logout-form2" action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="dropdown-item" type="submit">Sair</button>
            </form>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</body>

</html>