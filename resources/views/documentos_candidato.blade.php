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
	 @if($errors->any() == false)
	  <div class="alert alert-danger">
	 @else
	  <div class="alert alert-success">
	 @endif
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
						<tfoot style="font-size:14px;">
						@foreach($documentosC as $doc)
							@if($doc->id_documento == 1)
							<tr>
								<th><center>CTPS</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 2)
							<tr>
								<th><center>CARTÃO SUS</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 3)
							<tr>
								<th><center>RG</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 4)
							<tr>
								<th><center>CPF</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 5)
							<tr>
								<th><center>PIS</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 6)
							<tr>
								<th><center>CERTIDÃO NASCIMENTO CASAMENTO</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 7)
							<tr>
								<th><center>COMPROVANTE DE RESIDÊNCIA ATUALIZADO</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 8)
							<tr>
								<th><center>TÍTULO DE ELEITOR</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 9)
							<tr>
								<th><center>CARTEIRA DE VACINAÇÃO ATUALIZADA</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 10)
							<tr>
								<th><center>CERTIFICADO DE ESCOLARIDADE OU DIPLOMA</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 11)
							<tr>
								<th><center>CARTEIRA RESERVISTA</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 12)
							<tr>
								<th><center>FOTO 3x4</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 13)
							<tr>
								<th><center>CERTIFICADO DE ESPECIALIZAÇÃO</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 14)
							<tr>
								<th><center>CARTÃO VEM</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 15)
							<tr>
								<th><center>REGISTRO PROFISSIONAL CONSELHO DE CLASSE</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
							@if($doc->id_documento == 16)
							<tr>
								<th><center>DECLARAÇÃO NADA CONSTA CONSELHO CLASSE</center></th>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$doc->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($doc->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($doc->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
							</tr>
							@endif
						@endforeach 
						</table>
						<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<tr>
							<th>
							  <center>
							    <form action="{{ route('validarDocs', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
								  REPROVAR
								</button>
								 <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Reprovar Documentação:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<div class="row"> 
									 <div class="col">
									  @foreach($documentosC as $doc)
									   @if($doc->id_documento == 1) <input type="checkbox" id="doc1" name="doc1" /> <font size="2">CTPS</font> <br> @endif
									   @if($doc->id_documento == 2) <input type="checkbox" id="doc2" name="doc2" /> <font size="2">CARTÃO SUS</font> <br> @endif 
									   @if($doc->id_documento == 3) <input type="checkbox" id="doc3" name="doc3" /> <font size="2">RG</font> <br> @endif
									   @if($doc->id_documento == 4) <input type="checkbox" id="doc4" name="doc4" /> <font size="2">CPF</font> <br> @endif
									   @if($doc->id_documento == 5) <input type="checkbox" id="doc5" name="doc5" /> <font size="2">PIS</font> <br> @endif
									   @if($doc->id_documento == 6) <input type="checkbox" id="doc6" name="doc6" /> <font size="2">CERTIDÃO NASCIMENTO CASAMENTO:</font> <br> @endif
									   @if($doc->id_documento == 7) <input type="checkbox" id="doc7" name="doc7" /> <font size="2">COMPROVANTE DE RESIDÊNCIA ATUALIZADO</font> <br> @endif
									   @if($doc->id_documento == 8) <input type="checkbox" id="doc8" name="doc8" /> <font size="2">TÍTULO DE ELEITOR</font> <br> @endif
									   @if($doc->id_documento == 9) <input type="checkbox" id="doc9" name="doc9" /> <font size="2">CARTEIRA DE VACINAÇÃO ATUALIZADA</font> <br> @endif
									   @if($doc->id_documento == 10) <input type="checkbox" id="doc10" name="doc10" /> <font size="2">CERTIFICADO DE ESCOLARIDADE OU DIPLOMA</font> <br> @endif
									   @if($doc->id_documento == 11) <input type="checkbox" id="doc11" name="doc11" /> <font size="2">CARTEIRA RESERVISTA</font> <br> @endif
									   @if($doc->id_documento == 12) <input type="checkbox" id="doc12" name="doc12" /> <font size="2">FOTO 3x4</font> <br> @endif
									   @if($doc->id_documento == 13) <input type="checkbox" id="doc13" name="doc13" /> <font size="2">CERTIFICADO DE ESPECIALIZAÇÃO</font> <br> @endif
									   @if($doc->id_documento == 14) <input type="checkbox" id="doc14" name="doc14" /> <font size="2">CARTÃO VEM</font> <br> @endif
									   @if($doc->id_documento == 15) <input type="checkbox" id="doc15" name="doc15" /> <font size="2">REGISTRO PROFISSIONAL CONSELHO DE CLASSE</font> <br> @endif
									   @if($doc->id_documento == 16) <input type="checkbox" id="doc16" name="doc16" /> <font size="2">DECLARAÇÃO NADA CONSTA CONSELHO CLASSE</font> <br> @endif
									  @endforeach 
								     </div>
									 <div class="col">
									   <textarea id="descricao_re" name="descricao_re" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão em desacordo. Informe qual documento está reprovado.">{{ old('descricao_re') }}</textarea>
									 </div>
									</div>
									<div class="modal-footer">
										<input hidden type="text" id="resultado" name="resultado" value="1" />
										<button type="submit" class="btn btn-danger btn-sm">REPROVAR</button>
									</div>
									</div>
								  </div>
								 </div> 
								</form> 
							 </center>
							</th>
							<th>
							 <center>
								<form action="{{ route('validarDocs', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal2">
								  PENDÊNCIAS
								</button>
								 <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									 <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Pendências na Documentação:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									 </div>
									 <div class="modal-body">
									<div class="row"> 
									 <div class="col">
									  @foreach($documentosC as $doc)
									   @if($doc->id_documento == 1) <input type="checkbox" id="doc1" name="doc1" /> <font size="2">CTPS</font> <br> @endif
									   @if($doc->id_documento == 2) <input type="checkbox" id="doc2" name="doc2" /> <font size="2">CARTÃO SUS</font> <br> @endif 
									   @if($doc->id_documento == 3) <input type="checkbox" id="doc3" name="doc3" /> <font size="2">RG</font> <br> @endif
									   @if($doc->id_documento == 4) <input type="checkbox" id="doc4" name="doc4" /> <font size="2">CPF</font> <br> @endif
									   @if($doc->id_documento == 5) <input type="checkbox" id="doc5" name="doc5" /> <font size="2">PIS</font> <br> @endif
									   @if($doc->id_documento == 6) <input type="checkbox" id="doc6" name="doc6" /> <font size="2">CERTIDÃO NASCIMENTO CASAMENTO:</font> <br> @endif
									   @if($doc->id_documento == 7) <input type="checkbox" id="doc7" name="doc7" /> <font size="2">COMPROVANTE DE RESIDÊNCIA ATUALIZADO</font> <br> @endif
									   @if($doc->id_documento == 8) <input type="checkbox" id="doc8" name="doc8" /> <font size="2">TÍTULO DE ELEITOR</font> <br> @endif
									   @if($doc->id_documento == 9) <input type="checkbox" id="doc9" name="doc9" /> <font size="2">CARTEIRA DE VACINAÇÃO ATUALIZADA</font> <br> @endif
									   @if($doc->id_documento == 10) <input type="checkbox" id="doc10" name="doc10" /> <font size="2">CERTIFICADO DE ESCOLARIDADE OU DIPLOMA</font> <br> @endif
									   @if($doc->id_documento == 11) <input type="checkbox" id="doc11" name="doc11" /> <font size="2">CARTEIRA RESERVISTA</font> <br> @endif
									   @if($doc->id_documento == 12) <input type="checkbox" id="doc12" name="doc12" /> <font size="2">FOTO 3x4</font> <br> @endif
									   @if($doc->id_documento == 13) <input type="checkbox" id="doc13" name="doc13" /> <font size="2">CERTIFICADO DE ESPECIALIZAÇÃO</font> <br> @endif
									   @if($doc->id_documento == 14) <input type="checkbox" id="doc14" name="doc14" /> <font size="2">CARTÃO VEM</font> <br> @endif
									   @if($doc->id_documento == 15) <input type="checkbox" id="doc15" name="doc15" /> <font size="2">REGISTRO PROFISSIONAL CONSELHO DE CLASSE</font> <br> @endif
									   @if($doc->id_documento == 16) <input type="checkbox" id="doc16" name="doc16" /> <font size="2">DECLARAÇÃO NADA CONSTA CONSELHO CLASSE</font> <br> @endif
									  @endforeach 
								     </div>
									 <div class="col">
									   <textarea id="descricao_pe" name="descricao_pe" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão em pendências.">{{ old('descricao_pe') }}</textarea>
									 </div>
									</div>
									<div class="modal-footer">
										<input hidden type="text" id="resultado" name="resultado" value="2" />
										<button type="submit" class="btn btn-warning btn-sm">PENDÊNCIAS</button>
									</div>
									</div>
								  </div>
								 </div> 
								</form> 
							 </center>
							</th>
							<th>
							 <center>
								<form action="{{ route('validarDocs', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal3">
								  APROVAR
								</button>
								 <div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									 <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Aprovar Documentação:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									 </div>
									 <div class="modal-body">
									<div class="row"> 
									 <div class="col">
									  @foreach($documentosC as $doc)
									   @if($doc->id_documento == 1) <input type="checkbox" id="doc1" name="doc1" /> <font size="2">CTPS</font> <br> @endif
									   @if($doc->id_documento == 2) <input type="checkbox" id="doc2" name="doc2" /> <font size="2">CARTÃO SUS</font> <br> @endif 
									   @if($doc->id_documento == 3) <input type="checkbox" id="doc3" name="doc3" /> <font size="2">RG</font> <br> @endif
									   @if($doc->id_documento == 4) <input type="checkbox" id="doc4" name="doc4" /> <font size="2">CPF</font> <br> @endif
									   @if($doc->id_documento == 5) <input type="checkbox" id="doc5" name="doc5" /> <font size="2">PIS</font> <br> @endif
									   @if($doc->id_documento == 6) <input type="checkbox" id="doc6" name="doc6" /> <font size="2">CERTIDÃO NASCIMENTO CASAMENTO:</font> <br> @endif
									   @if($doc->id_documento == 7) <input type="checkbox" id="doc7" name="doc7" /> <font size="2">COMPROVANTE DE RESIDÊNCIA ATUALIZADO</font> <br> @endif
									   @if($doc->id_documento == 8) <input type="checkbox" id="doc8" name="doc8" /> <font size="2">TÍTULO DE ELEITOR</font> <br> @endif
									   @if($doc->id_documento == 9) <input type="checkbox" id="doc9" name="doc9" /> <font size="2">CARTEIRA DE VACINAÇÃO ATUALIZADA</font> <br> @endif
									   @if($doc->id_documento == 10) <input type="checkbox" id="doc10" name="doc10" /> <font size="2">CERTIFICADO DE ESCOLARIDADE OU DIPLOMA</font> <br> @endif
									   @if($doc->id_documento == 11) <input type="checkbox" id="doc11" name="doc11" /> <font size="2">CARTEIRA RESERVISTA</font> <br> @endif
									   @if($doc->id_documento == 12) <input type="checkbox" id="doc12" name="doc12" /> <font size="2">FOTO 3x4</font> <br> @endif
									   @if($doc->id_documento == 13) <input type="checkbox" id="doc13" name="doc13" /> <font size="2">CERTIFICADO DE ESPECIALIZAÇÃO</font> <br> @endif
									   @if($doc->id_documento == 14) <input type="checkbox" id="doc14" name="doc14" /> <font size="2">CARTÃO VEM</font> <br> @endif
									   @if($doc->id_documento == 15) <input type="checkbox" id="doc15" name="doc15" /> <font size="2">REGISTRO PROFISSIONAL CONSELHO DE CLASSE</font> <br> @endif
									   @if($doc->id_documento == 16) <input type="checkbox" id="doc16" name="doc16" /> <font size="2">DECLARAÇÃO NADA CONSTA CONSELHO CLASSE</font> <br> @endif
									  @endforeach 
								     </div>
									 <div class="col">
									   <textarea id="descricao_ap" name="descricao_ap" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão aprovados.">{{ old('descricao_ap') }}</textarea>
									 </div>
									</div>
									<div class="modal-footer">
										<input hidden type="text" id="resultado" name="resultado" value="3" />
										<button type="submit" class="btn btn-success btn-sm">APROVAR</button>
									</div>
									</div>
								  </div>
								 </div> 
								</form> 
							 </center>
							</th>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>