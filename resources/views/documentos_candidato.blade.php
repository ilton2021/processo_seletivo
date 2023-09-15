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
          <a class="nav-link" href="{{ route('pesquisaAvaliacao') }}">Avaliação</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sistema
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::user()->name == "Ilton Albuquerque" || Auth::user()->name == "Alex Neto")
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
<div class="container" style="margin-top: 80px;">
	@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="container">
		<div class="card shadow mb-4">
			<div style="background-color:#1d68a7;" class="card-header py-3">
				<h4 style="color:white;">
					<center>Relação de Documentos do Candidato <br>do Processo Seletivo: {{ $processos[0]->nome }}</center>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
					  <thead>
						<tr>
						  <td align="center" colspan="0" border="0">
							<a href="{{route('documentos', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" style="margin-top: 15px; color: #FFFFFF; background-color:#e06500;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
					      </td>
						</tr>
					  </thead>
					</table>

					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th style="width: 350px;">Nome</th>
								<th style="width: 150px;"><center>CPF</center></th>
								<th style="width: 300px;"><center>Vaga</center></th>
							</tr>
						</thead>
						@foreach($candidatos as $proc)
						<tfoot style="font-size:14px;">
							<tr>
								<th title="{{ $proc->nome }}"><a href="{{ route('informacoes', array($processos[0]->id, $proc->id)) }}">{{ strtoupper(substr($proc->nome, 0, 40)) }}</a></th>
								<th title="{{ $proc->cpf }}">
									<center>{{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $proc->cpf) }}</center>
								</th>
								<th title="{{ $proc->vaga }}">
									<center>{{ strtoupper(substr($proc->vaga, 0, 30)) }}</center>
								</th>
							</tr>
						</tfoot>
						@endforeach
					</table>

					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th colspan="2"><center>Documentos Candidato</center></th>
							</tr>
						</thead>
						@foreach($documentosC as $doc)
						<tfoot style="font-size:14px;">
							@if($doc->id_documento == 1)
							<tr>
								<th>CTPS</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 2)
							<tr>
								<th>CARTÃO SUS</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 3)
							<tr>
								<th>RG</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 4)
							<tr>
								<th>CPF</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 5)
							<tr>
								<th>PIS</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 6)
							<tr>
								<th>CERTIDÃO NASCIMENTO CASAMENTO</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 7)
							<tr>
								<th>COMPROVANTE DE RESIDÊNCIA ATUALIZADO</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 8)
							<tr>
								<th>TÍTULO DE ELEITOR</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 9)
							<tr>
								<th>CARTEIRA DE VACINAÇÃO ATUALIZADA</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 10)
							<tr>
								<th>CERTIFICADO DE ESCOLARIDADE OU DIPLOMA</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 11)
							<tr>
								<th>CARTEIRA RESERVISTA</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 12)
							<tr>
								<th>FOTO 3x4</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 13)
							<tr>
								<th>CERTIFICADO DE ESPECIALIZAÇÃO</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 14)
							<tr>
								<th>CARTÃO VEM</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 15)
							<tr>
								<th>REGISTRO PROFISSIONAL CONSELHO DE CLASSE</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 16)
							<tr>
								<th>DECLARAÇÃO NADA CONSTA CONSELHO CLASSE</th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								</th>
							</tr>
							@endif
						</tfoot>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>