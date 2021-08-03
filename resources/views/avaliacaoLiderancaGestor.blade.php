<html>
 <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head> 
<body id="page-top">
	<div class="container" style="margin-top: 20px;">
	  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
	  @endif 
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Avaliação de Liderança: (<?php echo $candidato[0]->nome; ?>)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			    <form method="POST" action="{{ route('updateAvaliacaoLideranca', array($processos[0]->id,$candidato[0]->id)) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    <tr>
					 <td colspan="4"><b><center> AVALIAÇÃO DE LIDERANÇA: </center></b></td>
					</tr>
					<tr>
                      <td><center>NOME:</center></td>
					  <td> <input type="text" id="nome" name="nome" class="form-control" required="true" value="<?php echo $avaliacao[0]->nome; ?>" readonly="true" /> </td>
			          <td><center>CPF:</center></td>
					  <td> <input type="text" id="cpf" name="cpf" class="form-control" required="true" value="<?php echo $avaliacao[0]->cpf; ?>" readonly="true" /> </td>
				    </tr>
					<tr>
                      <td><center>CARGO:</center></td>
					  <td> <input type="text" id="cargo" name="cargo" class="form-control" required="true" value="<?php echo $avaliacao[0]->cargo; ?>" readonly="true" /> </td>
					  <td><center>EMAIL:</center></td>
					  <td> <input type="text" id="email" name="email" class="form-control" required="true" value="<?php echo $avaliacao[0]->email; ?>" readonly="true" /> </td>
                    </tr>
					<tr>
                      <td><center>FUNÇÃO:</center></td>
					  <td colspan="3"> <input type="text" id="funcao" name="funcao" class="form-control" required="true" value="<?php echo $avaliacao[0]->funcao; ?>" readonly="true" /> </td>
                    </tr>
					<tr>
                      <td><center>SETOR:</center></td>
					  <td> <input type="text" id="setor" name="setor" class="form-control" required="true" value="<?php echo $avaliacao[0]->setor; ?>" readonly="true" /> </td>
                  	  <td><center>DATA:</center></td> 
					  <td> <input type="text" id="data" name="data" class="form-control" required="true" value="<?php echo date('d-m-Y',strtotime($avaliacao[0]->data)); ?>" readonly="true" /> </td>
					</tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					  <td colspan="6"><b><center> COMPETÊNCIAS: </center></b></td>
					</tr>
					<tr>
					 <td>LIDERANÇA: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Grau de Liderança para conduzir pessoas em relação 
					  aos resultados esperados e dimensionados para a área.</p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'LIDERANÇA')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="lideranca_1" name="lideranca_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="lideranca_2" name="lideranca_2" checked /> </center> </td><td></td><td></td><td></td>
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="lideranca_3" name="lideranca_3" checked /> </center></td> <td></td><td></td>
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="lideranca_4" name="lideranca_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="lideranca_5" name="lideranca_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>FLEXIBILIDADE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Grau de Flexibilidade em relação a mudanças e 
					  situações complexas.</p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'FLEXIBILIDADE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="flexibilidade_1" name="flexibilidade_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="flexibilidade_2" name="flexibilidade_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="flexibilidade_3" name="flexibilidade_3" checked /> </center> </td><td></td><td></td>
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="flexibilidade_4" name="flexibilidade_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="flexibilidade_5" name="flexibilidade_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>RESULTADOS: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Grau de comportamento proativo em relação as entregas
					  necessárias e visão de resultados para a área em que irá atuar.</p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'RESULTADOS')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="resultados_1" name="resultados_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="resultados_2" name="resultados_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="resultados_3" name="resultados_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="resultados_4" name="resultados_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="resultados_5" name="resultados_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>PRESTEZA: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Disposição de agir prontamente no cumprimento das 
					  demandas de trabalho; </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'PRESTEZA')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="presteza_1" name="presteza_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="presteza_2" name="presteza_2" checked /> </center></td><td></td> <td></td><td></td>
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="presteza_3" name="presteza_3" checked /> </center> </td><td></td><td></td>
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="presteza_4" name="presteza_4" checked /> </center> </td><td></td>
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="presteza_5" name="presteza_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>COMUNICAÇÃO: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Consciência da boa forma de comunicação e 
					  tratamento de informações. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'COMUNICAÇÃO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="comunicacao_1" name="comunicacao_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="comunicacao_2" name="comunicacao_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="comunicacao_3" name="comunicacao_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="comunicacao_4" name="comunicacao_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="comunicacao_5" name="comunicacao_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>ORGANIZAÇÃO: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Estrutura de programação diária e demandas de trabalho. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'ORGANIZAÇÃO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="organizacao_1" name="organizacao_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="organizacao_2" name="organizacao_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="organizacao_3" name="organizacao_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="organizacao_4" name="organizacao_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="organizacao_5" name="organizacao_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>ADMINISTRAÇÃO DO TEMPO: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Sabe lidar com pressão para realizar atividades em curto 
					  espaço de tempo. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'ORGANIZAÇÃO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="administracao_1" name="administracao_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="administracao_2" name="administracao_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="administracao_3" name="administracao_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="administracao_4" name="administracao_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="administracao_5" name="administracao_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>AMBIENTE DE TRABALHO: </td>
					 <td><center>1</center></td> 
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Cuidado e zelo na utilização dos equipamentos e instalações
					  no exercício das atividades e tarefas. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'AMBIENTE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="ambiente_1" name="ambiente_1"  checked/> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="ambiente_2" name="ambiente_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="ambiente_3" name="ambiente_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="ambiente_4" name="ambiente_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="ambiente_5" name="ambiente_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>
				
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>APROVEITAMENTO DE RECURSOS: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Melhor utilização dos recursos disponíveis,
					  visando a melhoria dos fluxos dos processos de trabalho e consecução de resultados eficientes. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'APROVEITAMENTO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="aproveitamento_1" name="aproveitamento_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="aproveitamento_2" name="aproveitamento_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="aproveitamento_3" name="aproveitamento_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="aproveitamento_4" name="aproveitamento_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="aproveitamento_5" name="aproveitamento_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>TRABALHO EM EQUIPE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify"> Capacidade de desenvolver as atividades e tarefas 
					  em equipe, valorizando o trabalho em conjunto em busca de resultados comuns. </p></td>
					  @foreach($pergAvaLid as $pg)
					  @if($pg->pergunta == 'EQUIPE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="equipe_1" name="equipe_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="equipe_2" name="equipe_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="equipe_3" name="equipe_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="equipe_4" name="equipe_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="equipe_5" name="equipe_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					 <td>JUSTIFICATIVA DO RH: </td>
					</tr>
					<tr>
                      <td> <textarea readonly="true" id="justificativa_rh" name="justificativa_rh" rows="20" cols="140" required="true" value="<?php echo $avaliacao[0]->justificativa_rh; ?>">{{  $avaliacao[0]->justificativa_rh }} </textarea> </td>
				    </tr>

					<tr>
					 <td>JUSTIFICATIVA DO GESTOR: </td>
					</tr>
					<tr>
                      <td> <textarea id="justificativa_gestor" name="justificativa_gestor" rows="20" cols="140" required="true" value="<?php echo $avaliacao[0]->justificativa_gestor; ?>"> </textarea> </td>
				    </tr>

					<tr>
					 <td colspan="2">
					 <p align="right"><a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="color: #FFFFFF;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" value="Salvar" id="Salvar" name="Salvar" /> 				 
					</tr>
				</table>
				</form>
			  </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
