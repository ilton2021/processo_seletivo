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
					<center>Relação de Documentos dos Dependentes <br>do Processo Seletivo: {{ $processos[0]->nome }}</center>
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
								<th style="width: 150px;">
									<center>CPF</center>
								</th>
								<th style="width: 300px;">
									<center>Vaga</center>
								</th>
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
								<th colspan="6"><center>Documentos Dependentes</center></th>
							</tr>
						</thead>
						<tfoot style="font-size:14px;">
						    <tr>
								<th><center>CARTÃO DE VACINAÇÃO</center></th>
								<?php $qtdCV = sizeof($documentosCV); ?>
								<?php for($a = 0; $a < $qtdCV; $a++) { ?>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$documentosCV[$a]->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($documentosCV[$a]->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($documentosCV[$a]->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
								<?php } ?>
							</tr>
							<tr>
								<th><center>CERTIDÃO DE NASCIMENTO</center></th>
								<?php $qtdCN = sizeof($documentosCN); ?>
								<?php for($a = 0; $a < $qtdCN; $a++) { ?>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$documentosCN[$a]->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($documentosCN[$a]->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($documentosCN[$a]->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th> 
								<?php } ?>
							</tr>
							<tr>
								<th><center>RG</center></th>
								<?php $qtdRG = sizeof($documentosRG); ?>
								<?php for($a = 0; $a < $qtdRG; $a++) { ?>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$documentosRG[$a]->caminho}}"> <i class="fas fa-file-alt"></i></a>

								  </center>
								  @if($documentosRG[$a]->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($documentosRG[$a]->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
								<?php } ?>
							</tr>
							<tr>
								<th><center>CPF</center></th>
								<?php $qtdCPF = sizeof($documentosCPF); ?>
								<?php for($a = 0; $a < $qtdCPF; $a++) { ?>
								<th>
								  <center>
								 	<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$documentosCPF[$a]->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($documentosCPF[$a]->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($documentosCPF[$a]->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
								<?php } ?>
							</tr>
							<tr>
								<th><center>ESTABELECIMENTO ESCOLAR</center></th>
								<?php $qtdEE = sizeof($documentosEE); ?>
								<?php for($a = 0; $a < $qtdEE; $a++) { ?>
								<th>
								  <center>
									<a class="btn btn-info btn-sm" target="_blank" style="color: #FFFFFF;margin-top:2px;font-size: 20px;" href="{{asset('storage')}}/{{$documentosEE[$a]->caminho}}"> <i class="fas fa-file-alt"></i></a>
								  </center>
								  @if($documentosEE[$a]->status == 0)
								   <center> <font color="blue">VALIDAR</font> </center>
								  @elseif($documentosEE[$a]->status == 1)
								   <center> <font color="red">REPROVADO</font> </center>
								  @else
								   <center> <font color="green">APROVADO</font> </center>
								  @endif
								</th>
								<?php } ?>
								
							</tr>
						</tfoot>
					</table>
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<tr>
							<th>
							  <center>
							    <form action="{{ route('validarDocsDep', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
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
									   <?php $a = 0; ?>
									   @foreach($documentosCV as $CV)
									    <input type="checkbox" id="doc1_<?php echo $a ?>" name="doc1_<?php echo $a ?>" /> <font size="2">CERTIDÃO DE VACINAÇÃO {{ $a + 1 }}</font> <br>
										<?php $a += 1; ?>
									   @endforeach  
									   <?php $b = 0; ?>
									   @foreach($documentosCN as $CN) 
									    <input type="checkbox" id="doc2_<?php echo $b ?>" name="doc2_<?php echo $b ?>" /> <font size="2">CERTIDÃO DE NASCIMENTO {{ $b + 1 }}</font> <br>
										<?php $b += 1; ?>
									   @endforeach
									   <?php $c = 0; ?>
									   @foreach($documentosRG as $RG) 
									    <input type="checkbox" id="doc3_<?php echo $c ?>" name="doc3_<?php echo $c ?>" /> <font size="2">RG {{ $c + 1 }}</font> <br>
										<?php $c += 1; ?>
									   @endforeach
									   <?php $d = 0; ?>
									   @foreach($documentosCPF as $CPF) 
									    <input type="checkbox" id="doc4_<?php echo $d ?>" name="doc4_<?php echo $d ?>" /> <font size="2">CPF {{ $d + 1 }}</font> <br>
										<?php $d += 1; ?>
									   @endforeach
									   <?php $e = 0; ?>
									   @foreach($documentosEE as $EE) 
									    <input type="checkbox" id="doc5_<?php echo $e ?>" name="doc5_<?php echo $e ?>" /> <font size="2">ESTABELECIMENTO ESCOLAR {{ $e + 1 }}</font> <br>
										<?php $e += 1; ?>
									   @endforeach
									 </div>
									 <div class="col">
									   <textarea id="descricao_re" name="descricao_re" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão em desacordo. Informe qual documento está reprovado e de qual dependente." required>{{ old('descricao_re') }}</textarea>
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
								<form action="{{ route('validarDocsDep', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal2">
								  PENDÊNCIAS
								</button>
								<div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel2">Pendências Documentação:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									<div class="row"> 
									 <div class="col">
									   <?php $a = 0; ?>
									   @foreach($documentosCV as $CV)
									    <input type="checkbox" id="doc1_<?php echo $a ?>" name="doc1_<?php echo $a ?>" /> <font size="2">CERTIDÃO DE VACINAÇÃO {{ $a + 1 }}</font> <br>
										<?php $a += 1; ?>
									   @endforeach  
									   <?php $b = 0; ?>
									   @foreach($documentosCN as $CN) 
									    <input type="checkbox" id="doc2_<?php echo $b ?>" name="doc2_<?php echo $b ?>" /> <font size="2">CERTIDÃO DE NASCIMENTO {{ $b + 1 }}</font> <br>
										<?php $b += 1; ?>
									   @endforeach
									   <?php $c = 0; ?>
									   @foreach($documentosRG as $RG) 
									    <input type="checkbox" id="doc3_<?php echo $c ?>" name="doc3_<?php echo $c ?>" /> <font size="2">RG {{ $c + 1 }}</font> <br>
										<?php $c += 1; ?>
									   @endforeach
									   <?php $d = 0; ?>
									   @foreach($documentosCPF as $CPF) 
									    <input type="checkbox" id="doc4_<?php echo $d ?>" name="doc4_<?php echo $d ?>" /> <font size="2">CPF {{ $d + 1 }}</font> <br>
										<?php $d += 1; ?>
									   @endforeach
									   <?php $e = 0; ?>
									   @foreach($documentosEE as $EE) 
									    <input type="checkbox" id="doc5_<?php echo $e ?>" name="doc5_<?php echo $e ?>" /> <font size="2">ESTABELECIMENTO ESCOLAR {{ $e + 1 }}</font> <br>
										<?php $e += 1; ?>
									   @endforeach
									 </div>
									 <div class="col">
									   <textarea id="descricao_pe" name="descricao_pe" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão em pendências. Informe quais documentos e de qual dependente." required>{{ old('descricao_pe') }}</textarea>
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
								<form action="{{ route('validarDocsDep', array($processos[0]->id, $candidatos[0]->id)) }}" method="POST">             
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal3" title="Se for aprovar todos os documentos serão aprovados!.">
								  APROVAR
								</button>
								 <div class="modal fade bd-example-modal-lg" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									 <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel3">Aprovar Documentação:</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									 </div>
									 <div class="modal-body">
									<div class="row"> 
									 <div class="col">
									   <?php $a = 0; ?>
									   @foreach($documentosCV as $CV)
									    <input type="checkbox" id="doc1_<?php echo $a ?>" name="doc1_<?php echo $a ?>" /> <font size="2">CERTIDÃO DE VACINAÇÃO {{ $a + 1 }}</font> <br>
										<?php $a += 1; ?>
									   @endforeach  
									   <?php $b = 0; ?>
									   @foreach($documentosCN as $CN) 
									    <input type="checkbox" id="doc2_<?php echo $b ?>" name="doc2_<?php echo $b ?>" /> <font size="2">CERTIDÃO DE NASCIMENTO {{ $b + 1 }}</font> <br>
										<?php $b += 1; ?>
									   @endforeach
									   <?php $c = 0; ?>
									   @foreach($documentosRG as $RG) 
									    <input type="checkbox" id="doc3_<?php echo $c ?>" name="doc3_<?php echo $c ?>" /> <font size="2">RG {{ $c + 1 }}</font> <br>
										<?php $c += 1; ?>
									   @endforeach
									   <?php $d = 0; ?>
									   @foreach($documentosCPF as $CPF) 
									    <input type="checkbox" id="doc4_<?php echo $d ?>" name="doc4_<?php echo $d ?>" /> <font size="2">CPF {{ $d + 1 }}</font> <br>
										<?php $d += 1; ?>
									   @endforeach
									   <?php $e = 0; ?>
									   @foreach($documentosEE as $EE) 
									    <input type="checkbox" id="doc5_<?php echo $e ?>" name="doc5_<?php echo $e ?>" /> <font size="2">ESTABELECIMENTO ESCOLAR {{ $e + 1 }}</font> <br>
										<?php $e += 1; ?>
									   @endforeach
									 </div>
									 <div class="col">
									   <textarea id="descricao_ap" name="descricao_ap" rows="8" class="form-control" placeholder="Especifique a informação para o candidato, informando quais documentos estão aprovados. Informe quais documentos e de qual dependente." required>{{ old('descricao_ap') }}</textarea>
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
						</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>