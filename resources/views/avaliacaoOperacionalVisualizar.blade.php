@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 40px;">
	  @if($errors->any())
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
              <h6 class="m-0 font-weight-bold text-primary">Avaliação Operacional: (<?php echo $candidato[0]->nome; ?>)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    <tr>
					 <td colspan="4"><b><center> AVALIAÇÃO OPERACIONAL: </center></b></td>
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
					  <td> <input type="text" id="data" name="data" class="form-control" required="true" value="<?php echo date('d/m/Y', strtotime($avaliacao[0]->data)); ?>" readonly="true" /> </td>
					</tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					  <td colspan="6"><b><center> COMPETÊNCIAS: </center></b></td>
					</tr>
					<tr>
					 <td>ORGANIZAÇÃO DE TRABALHO: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Grau de organização, exatidão, correção e clareza
					  dos trabalhos executados;</p></td>
					  @foreach($pergAvaOp as $pg)
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
				     <td>PRODUTIVIDADE NO TRABALHO: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Quantidade de trabalho executado mensalmente.</p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'PRODUTIVIDADE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="produtividade_1" name="produtividade_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="produtividade_2" name="produtividade_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="produtividade_3" name="produtividade_3" checked /> </center> </td><td></td><td></td>
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="produtividade_4" name="produtividade_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="produtividade_5" name="produtividade_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>INICIATIVA: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Comportamento proativo no âmbito da atuação,
					  buscando garantir eficiência e eficácia na execução dos trabalhos.</p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'INICIATIVA')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="iniciativa_1" name="iniciativa_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="iniciativa_2" name="iniciativa_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="iniciativa_3" name="iniciativa_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="iniciativa_4" name="iniciativa_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="iniciativa_5" name="iniciativa_5" checked /> </center> </td> 
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
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'PRESTEZA')
					  @if($pg->resposta == 1) 
					  <td></td>
					  <td></td>
					  <td></td>
					  <td></td>
					  <td><center><br> <input type="checkbox" id="presteza_1" name="presteza_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td> <td><center><br> <input type="checkbox" id="presteza_2" name="presteza_2" checked /> </center></td><td></td><td></td><td></td>
					  @elseif($pg->resposta == 3) 
					  <td></td> <td></td><td><center><br> <input type="checkbox" id="presteza_3" name="presteza_3" checked /> </center></td><td></td><td></td>
					  @elseif($pg->resposta == 4) 
					  <td></td> <td></td><td></td> <td><center><br> <input type="checkbox" id="presteza_4" name="presteza_4" checked /></center></td><td></td>
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="presteza_5" name="presteza_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>ASSIDUIDADE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Comparecimento regular e permanência no local de trabalho. </p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'ASSIDUIDADE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="assiduidade_1" name="assiduidade_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="assiduidade_2" name="assiduidade_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="assiduidade_3" name="assiduidade_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="assiduidade_4" name="assiduidade_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="assiduidade_5" name="assiduidade_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>PONTUALIDADE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Observância do horário de trabalho e do cumprimento 
					  da carga horária definida para o cargo ocupado. </p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'PONTUALIDADE')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="pontualidade_1" name="pontualidade_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="pontualidade_2" name="pontualidade_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="pontualidade_3" name="pontualidade_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="pontualidade_4" name="pontualidade_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="pontualidade_5" name="pontualidade_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>ADMINISTRAÇÃO DO TEMPO E TEMPESTIVIDADE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify">Sabe lidar com pressão para realizar atividades em curto 
					  espaço de tempo. </p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'TEMPO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="tempo_1" name="tempo_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="tempo_2" name="tempo_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="tempo_3" name="tempo_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="tempo_4" name="tempo_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="tempo_5" name="tempo_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>USO ADEQUADO DOS EQUIPAMENTOS E INSTALAÇÕES DE SERVIÇO: </td>
					 <td><center>1</center></td> 
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Cuidado e zelo na utlização dos equipamentos 
					  e instalações no exercício das atividades e tarefas. </p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'EQUIPAMENTO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="equipamento_1" name="equipamento_1"  checked/> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="equipamento_2" name="equipamento_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="equipamento_3" name="equipamento_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="equipamento_4" name="equipamento_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="equipamento_5" name="equipamento_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>
				
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>APROVEITAMENTO DOS RECURSOS E RACIONALIZAÇÃO DE PROCESSOS: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
					  <td width="500px;"> <p align="justify">Melhor utilização dos recursos disponíveis,
					  visando a melhoria dos fluxos dos processos de trabalho e consecução de resultados eficientes. </p></td>
					  @foreach($pergAvaOp as $pg)
					  @if($pg->pergunta == 'RECURSO')
					  @if($pg->resposta == 1) 
					  <td><center><br> <input type="checkbox" id="recurso_1" name="recurso_1" checked /> </center> </td><td></td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 2) 
					  <td></td><td><center><br> <input type="checkbox" id="recurso_2" name="recurso_2" checked /> </center> </td><td></td><td></td><td></td> 
					  @elseif($pg->resposta == 3) 
					  <td></td><td></td><td><center><br> <input type="checkbox" id="recurso_3" name="recurso_3" checked /> </center> </td><td></td><td></td> 
					  @elseif($pg->resposta == 4) 
					  <td></td><td></td><td></td><td><center><br> <input type="checkbox" id="recurso_4" name="recurso_4" checked /> </center> </td><td></td> 
					  @elseif($pg->resposta == 5) 
					  <td></td><td></td><td></td><td></td><td><center><br> <input type="checkbox" id="recurso_5" name="recurso_5" checked /> </center> </td> 
					  @endif
					  @endif
					  @endforeach
				    </tr>
				</table>

				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>CAPACIDADE DE TRABALHO EM EQUIPE: </td>
					 <td><center>1</center></td>
					 <td><center>2</center></td>
					 <td><center>3</center></td>
					 <td><center>4</center></td>
					 <td><center>5</center></td>
					</tr>
					<tr>
                      <td width="500px;"> <p align="justify"> Capacidade de desenvolver as atividades e tarefas 
					  em equipe, valorizando o trabalho em conjunto em busca de resultados comuns. </p></td>
					  @foreach($pergAvaOp as $pg)
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
                      <td> <textarea id="justificativa_rh" name="justificativa_rh" rows="20" cols="140" readonly="true"> {{ $avaliacao[0]->justificativa_rh }} </textarea> </td>
				    </tr>

					<tr>
					 <td>JUSTIFICATIVA DO GESTOR: </td>
					</tr>
					<tr>
                      <td> <textarea id="justificativa_gestor" name="justificativa_gestor" rows="20" cols="140" readonly="true"> {{ $avaliacao[0]->justificativa_gestor }} </textarea> </td>
				    </tr>

					<tr>
					 <td colspan="2">
					 <p align="right"><a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="color: #FFFFFF;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
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
