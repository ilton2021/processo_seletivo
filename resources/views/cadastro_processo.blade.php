
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastro
		</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('cadastroUnidade') }}">Unidade</a>
          <a class="dropdown-item" href="{{ route('cadastroProcesso') }}">Processo Seletivo</a>
          <a class="dropdown-item" href="{{ route('cadastroQuadroAvisos') }}">Quadro de Avisos</a>
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Avaliação
		</a>
        <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
			@foreach($processos as $processo)
			  <a class="dropdown-item" href="{{ route('cadastrarResultados', $processo->id) }}">{{ substr($processo->nome, 0, 20) }}</a>
			@endforeach
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Resultado
        </a>
        <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
            @foreach($processos as $processo)
			  <a class="dropdown-item" target="_blank" href="{{ route('candidatoListas', $processo->id) }}">{{ substr($processo->nome, 0, 20) }}</a>
			@endforeach
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Número de Inscritos
        </a>
        <div class="dropdown-menu scrollable-menu" aria-labelledby="navbarDropdown">
			@foreach($processos as $processo)
			  <a class="dropdown-item" href="{{ route('numeroInscritos', $processo->id) }}">{{ substr($processo->nome, 0, 20) }}</a>
			@endforeach
        </div>
      </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sistema
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		  @if(Auth::user()->name == "Ilton Albuquerque")
		   <a class="dropdown-item" href="{{ route('telaRegistro') }}">Adicionar Usuário</a>
	      @endif
		   <a class="dropdown-item" href="{{ url('/') }}">Sair</a>
	    </div>
      </li>
    </ul>
   </div>
</nav>
</body>
<body id="page-top">
   <div class="container" style="margin-top: 80px;">
  		@if ($errors->any())
		 <div class="alert alert-success">
		  <ul>
		    @foreach ($errors->all() as $error)
		      <li>{{ $error }}</li>
			@endforeach
		  </ul>
		 </div>
		@endif
        <div class="container">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Processos Seletivos:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                  <form method="POST" action="{{ route('pesquisarProcesso') }}">
				  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <thead>
				    <tr>
					 <td style="width: 600px"> 
						<input style="width: 600px" type="text" id="pesq" name="pesq" class="form-control" placeholder="Pesquisar pelo Nome do Processo Seletivo" />
					 </td> 
					 <td>	
					    <input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" /> 				 
					 </td>
					 <td align="right" colspan="4" border="0"> 
					 <a href="{{route('home')}}" style="color: #FFFFFF; margin-top: 5px;" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <a class="btn btn-dark btn-sm" style="color: #FFFFFF; margin-top: 5px;" href="{{route('processoNovo')}}"> Novo <i class="fas fa-check"></i></a></td>
					</tr>
                   </thead> 
				  </form>
				 </table>
				 <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
				    <tr>
                      <th>Nome</th>
					  <th><center>Início Inscrição</center></th>
					  <th><center>Fim Inscrição</center></th>
					  <th><center>Vagas</center></th>
					  <th><center>Alterar</center></th>
					  <th><center>Excluir</center></th>
					  @if(Auth::user()->id == 1 || Auth::user()->id == 18)
					  <th><center>Add Candidato</center></th>
					  @endif
                    </tr>
                  </thead>
				  @foreach($processos as $processo)
	               <tfoot>
                    <tr>
                      <th>{{ $processo->nome }}</th>
                      <th><center>{{ $processo->inscricao_inicio }}</center></th>
                      <th><center>{{ $processo->inscricao_fim }}</center></th>
					  <th><center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('vagaCadastro', $processo->id) }}"> <i class="fas fa-bars"></i></a></center></th>
					  <th><center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('processoAlterar', $processo->id) }}"> <i class="fas fa-edit"></i></a></center></th>
					  <th><center><a class="btn btn-danger btn-sm" style="color: #FFFFFF;" href="{{ route('processoExcluir', $processo->id) }}"> <i class="fas fa-times-circle"></i></a></center></th>
					  @if(Auth::user()->id == 1 || Auth::user()->id == 18)
					  <th><center><a class="btn btn-dark btn-sm" style="color: #FFFFFF;" href="{{ route('cadastroCandidato2', $processo->id) }}"> <i class="fas fa-check"></i></a></center></th>
					  @endif
                    </tr>
                  </tfoot>
				  @endforeach
	              <tbody>
                  </tbody>
                </table>
              </div>
            </div>
			<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
			  <tr>
				<td><p style="margin-left: -400px;"> {!! $processos->links() !!} </p></td>
			  </tr> 
			</table>
          </div>
        </div>
      </div>
</body>
</body>
</html>