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
	   <div class="container">
	    @if ($errors->any())
		 <div class="alert alert-success">
		  <ul>
		    @foreach ($errors->all() as $error)
		      <li>{{ $error }}</li>
			@endforeach
		  </ul>
		 </div>
		@endif  <?php $qtd = sizeof($processos2); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Resultado Processo Seletivo:</h6>
            </div> 
			<div class="card-body">
              <div class="table-responsive">
            	<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
				<form method="POST" action="{{ route('storeAvaliacaoA', array($idP, $candidato)) }}">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<tr>
					 <td align="right" colspan="7" border="0"> 
					  <a href="{{route('cadastrarResultados', $idP)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 </td>
					</tr>
					
					<tr>
                      <td><strong>Avaliação de Conhecimento:</strong></td>
					  <td>
					  @if($processos2[0]->status_avaliacao == "")
						<select class="form-control" id="modoA" name="modoA">
						  <option id="modoA" name="modoA" value="0">Selecione...</option>	
						  <option id="modoA" name="modoA" value="Habilitado">Habilitado</option>	
						  <option id="modoA" name="modoA" value="Desabilitado">Desabilitado</option>	
						</select>
					  @else
						<select class="form-control" id="modoA" name="modoA">
						  <option id="modoA" name="modoA" value="Habilitado">Habilitado</option>	
						</select>  
					  @endif
					  </td>
				    </tr> 
					<tr>
                      <td>Data:</td>
					  @if($processos2[0]->data_avaliacao == "")
					  <td> <input type="date" id="data_resultadoA" name="data_resultadoA" class="form-control" /> </td>
					  @else
					  <td> <input type="text" id="data_resultadoA" name="data_resultadoA" class="form-control" value="<?php echo date('d-m-Y',strtotime($processos2[0]->data_avaliacao)); ?>" /> </td>	  
					  @endif
					</tr>
					<tr>
                      <td>Digite uma mensagem ao Candidato:</td>
                      @if($processos2[0]->msg_avaliacao == "")
					  <th><textarea class="form-control" id="mensagemA" name="mensagemA"></textarea></th>
					  @else
					  <th><textarea class="form-control" rows="5" id="mensagemA" name="mensagemA" value="<?php echo $processos2[0]->msg_avaliacao; ?>">{{ $processos2[0]->msg_avaliacao }}</textarea></th>
				      @endif
                    </tr>
					
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
                      <td><strong>Entrevista Profissional:</strong></td>
					  <td>
					  @if($processos2[0]->status_entrevista == "")
						<select class="form-control" id="modoE" name="modoE">
						  <option id="modoE" name="modoE" value="0">Selecione...</option>	
						  <option id="modoE" name="modoE" value="Habilitado">Habilitado</option>	
						  <option id="modoE" name="modoE" value="Desabilitado">Desabilitado</option>	
						</select>
					  @else
						<select class="form-control" id="modoE" name="modoE">
						  <option id="modoE" name="modoE" value="Habilitado">Habilitado</option>	
						</select>  
					  @endif
					  </td>
				    </tr>
					<tr>
                      <td>Data:</td>
					  @if($processos2[0]->data_entrevista == "")
					  <td> <input type="date" id="data_resultadoE" name="data_resultadoE" class="form-control" /> </td>
					  @else
					  <td> <input type="text" id="data_resultadoE" name="data_resultadoE" class="form-control" value="<?php echo date('d-m-Y',strtotime($processos2[0]->data_entrevista)); ?>" /> </td>	  
					  @endif
					</tr>
					<tr>
                      <td>Digite uma mensagem ao Candidato:</td>
                      @if($processos2[0]->msg_entrevista == "")
					  <th><textarea class="form-control" id="mensagemE" name="mensagemE"></textarea></th>
					  @else
					  <th><textarea rows="5" class="form-control" id="mensagemE" name="mensagemE" value="<?php echo $processos2[0]->msg_entrevista; ?>">{{ $processos2[0]->msg_entrevista }}</textarea></th>
				      @endif
                    </tr>
					
					<tr><td colspan="2">&nbsp;</td></tr>
					<tr>
                      <td><strong>Resultado Final:</strong></td>
					  <td>
					    <select class="form-control" id="modoR" name="modoR">
						  <option id="modoR" name="modoR" value="0">Selecione...</option>
						  <option id="modoR" name="modoR" value="3">Aprovado (a)</option>
						  <option id="modoR" name="modoR" value="4">N&atilde;o Aprovado (a)</option>
						  <option id="modoR" name="modoR" value="5">Cadastro de Reserva</option>
						  <option id="modoR" name="modoR" value="6">Desistente</option>
						  <option id="modoR" name="modoR" value="7">Desabilitado</option>
						</select>
						</td>
				    </tr>
					<tr>
                      <td>Digite uma mensagem ao Candidato:</td>
                      @if($processos2[0]->msg_resultado == "")
					  <th><textarea class="form-control" id="mensagemR" name="mensagemR"></textarea></th>
					  @else
					  <th><textarea class="form-control" id="mensagemR" name="mensagemR" rows="5" value="<?php echo $processos2[0]->msg_resultado; ?>">{{ $processos2[0]->msg_resultado }}</textarea></th>
				      @endif
                    </tr>
					
					<tr>
					  <td colspan="2" align="right"><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /></td>
					</tr>
					<tr>
					  <td hidden> <input hidden type="text" id="tela" name="tela" value="avaliacao_conhecimento" /> </td>
					  <td hidden> <input hidden type="text" id="acao" name="acao" value="cadastro_avaliacao" /> </td>
					  <td hidden> <input hidden type="text" id="user_id" name="user_id" value="" /> </td>
					  <td hidden> <input hidden type="text" id="processo_seletivo_id" name="processo_seletivo_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="candidato_id" name="candidato_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="resultado" name="resultado" value="" /></td>
					  <td hidden> <input hidden type="text" id="unidade_id" name="unidade_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="vaga_id" name="vaga_id" value="" /></td>	
					</tr>
					
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>