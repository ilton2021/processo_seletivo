<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/7656d93ed3.js" crossorigin="anonymous"></script>
<script type="text/javascript">
			function ativarDesc(valor){
				var x = document.getElementById('pesq2'); 
				var y = x.options[x.selectedIndex].text;
				if(y == "RANKING" || y == "QUESTIONÁRIO"){
					document.getElementById('pesq').hidden = true;
					document.getElementById('pesq').disabled = true;
				} else {
					document.getElementById('pesq').hidden = false;
					document.getElementById('pesq').disabled = false;
				}
			}
</script>
<body id="page-top">
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
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ranking dos Candidatos:</h6>
            </div>
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
            <form method="POST" action="{{ route('pesquisarRanking', $processos[0]->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <thead>
              <tr>
                <td style="width: 600px">
                  <input style="width: 600px" type="text" id="pesq" name="pesq" class="form-control form-control-sm" placeholder="" required />
                  <input hidden type="text" id="vaga_id" name="vaga_id" value="<?php echo $vagas[0]->id; ?>" />
                </td>
                <td>
                <select class="form-control form-control-sm" id="pesq2" name="pesq2" onchange="ativarDesc('sim')"> 
                  <option value="nome">NOME</option>
                  <option value="rank">RANKING</option>
                  <option value="quest">QUESTIONÁRIO</option>
                </select>
                </td> 
                <td>
                  <center><input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" /></center>
                </td>
                <td align="right" colspan="4" border="0">
                  <center><a class="text-success" style="margin-left:5px;" href="{{route('exportCandidatosRank', array($processos[0]->id, $processos[0]->nome, $vagas[0]->nome))}}" title="Download"><img src="{{asset('img/csv.png')}}" alt="" width="50"></a></center>
                </td>
                <td>
                  <center><a href="{{route('rankingVagas', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></center>
                </td>
              </tr>
              </thead>
            </form>
            </table>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                 	<tr>
                      <td style="width: 400px">NOME</td>
                      <td style="width: 200px"><center>VAGA</center></td>
                      <td><center>RANKING</center></td>
                      <td><center>QUESTIONÁRIO</center></td>
                      <td><center>EXPERIÊNCIA</center></td>
                      <td><center>DETALHES</center></td>
                  </tr>
                  <tr> 
                   @foreach($processos2 as $cand2)
                    <td title="<?php echo $cand2->nome; ?>"> {{ strtoupper(substr($cand2->nome, 0, 35)) }} </td> 
                    <td title="<?php echo $cand2->vaga; ?>">{{ substr($cand2->vaga, 0, 30) }}</td>
                    <td title="Ranking: Nº de Meses * 0,16666"><center>{{ $cand2->exps_soma }}</center></td>
                    <td><center>{{ $cand2->soma_quest }}</center></td>
                    <td><center>
                    @if($cand2->exp_01_empresa)
                    <button title="Detalhes Experiências" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop1_<?php echo $cand2->id; ?>">
                     <i class="fas fa-file-alt"></i>
                    </button>
                    <div class="modal fade bd-example-modal-xl" id="staticBackdrop1_<?php echo $cand2->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" width="1000px;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">DETALHES - EXPERIÊNCIAS</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="6">EMPRESA 01:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Empresa</font></th>
                           <th scope="col"><font size="2">Cargo</font></th>
                           <th scope="col"><font size="2"><center>Data Início</center></font></th>
                           <th scope="col"><font size="2"><center>Data Fim</center></font></th>
                           <th scope="col"><font size="2"><center>Total</center></font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td title="<?php echo $cand2->exp_01_empresa; ?>"> {{ substr($cand2->exp_01_empresa, 0, 30) }} </td>
                           <td title="<?php echo $cand2->exp_01_cargo; ?>"> {{ substr($cand2->exp_01_cargo, 0, 30) }} </td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_01_data_ini)) }}</center></td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_01_data_fim)) }}</center></td>
                           <td><center> {{ $cand2->exp_01_soma }} </center></td>
                          </tr>
                         </tbody>
                        </table> 
                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="6">EMPRESA 02:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Empresa</font></th>
                           <th scope="col"><font size="2">Cargo</font></th>
                           <th scope="col"><font size="2"><center>Data Início</center></font></th>
                           <th scope="col"><font size="2"><center>Data Fim</center></font></th>
                           <th scope="col"><font size="2"><center>Total</center></font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td title="<?php echo $cand2->exp_02_empresa; ?>"> {{ substr($cand2->exp_02_empresa, 0, 30) }} </td>
                           <td title="<?php echo $cand2->exp_02_cargo; ?>"> {{ substr($cand2->exp_02_cargo, 0, 30) }} </td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_02_data_ini)) }}</center></td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_02_data_fim)) }}</center></td>
                           <td><center> {{ $cand2->exp_02_soma }} </center></td>
                          </tr>
                         </tbody>
                        </table>
                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="6">EMPRESA 03:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Empresa</font></th>
                           <th scope="col"><font size="2">Cargo</font></th>
                           <th scope="col"><font size="2"><center>Data Início</center></font></th>
                           <th scope="col"><font size="2"><center>Data Fim</center></font></th>
                           <th scope="col"><font size="2"><center>Total</center></font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td title="<?php echo $cand2->exp_03_empresa; ?>"> {{ substr($cand2->exp_03_empresa, 0, 30) }} </td>
                           <td title="<?php echo $cand2->exp_03_cargo; ?>"> {{ substr($cand2->exp_03_cargo, 0, 30) }} </td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_03_data_ini)) }}</center></td>
                           <td><center>{{ date('d/m/Y', strtotime($cand2->exp_03_data_fim)) }}</center></td>
                           <td><center> {{ $cand2->exp_03_soma }} </center></td>
                          </tr>
                         </tbody>
                        </table>
                       </div>
                      </div>
                    </div>                                              
                    @endif</center>
                    </td>
                    <td><center>
                    <button title="Detalhes Experiências" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop_<?php echo $cand2->id; ?>">
                     <i class="fas fa-file-alt"></i>
                    </button>
                    <div class="modal fade bd-example-modal-xl" id="staticBackdrop_<?php echo $cand2->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl" width="1000px;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">DETALHES</h5>
                          <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <th scope="col"><font size="2">ID</font></th>
                           <th scope="col"><font size="2">Nome</font></th>
                           <th scope="col"><font size="2">Matrícula</font></th>
                           <th scope="col"><font size="2">Habilitação</font></th>
                           <th scope="col"><font size="2">Período</font></th>
                           <th scope="col"><font size="2">Mudar de Cidade</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->id }} </td>
                           <td> {{ $cand2->nome }} </td>
                           <td> {{ $cand2->numeroInscricao }} </td>
                           <td> {{ $cand2->habilitacao }} </td>
                           <td> 
                             <?php if($cand2->periodo_integral != "") { echo $cand2->periodo_integral; } ?> 
                             <?php if($cand2->periodo_noturno != "") { echo $cand2->periodo_noturno; } ?> 
                             <?php if($cand2->meio_periodo != "") { echo $cand2->meio_periodo; } ?> 
                           </td>
                           <td> {{ $cand2->outra_cidade }} </td>
                          </tr>
                         </tbody>
                        </table>
                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="6">DADOS PESSOAIS:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Vaga</font></th>
                           <th scope="col"><font size="2">CPF</font></th>
                           <th scope="col"><font size="2">E-mail</font></th>
                           <th scope="col"><font size="2">Telefone</font></th>
                           <th scope="col"><font size="2">Telefone Fixo</font></th>
                           <th scope="col"><font size="2">Data Inscrição</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->vaga }} </td>
                           <td> {{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cand2->cpf) }} </td>
                           <td> {{ $cand2->email }} </td>
                           <td> {{ $cand2->telefone }} </td>
                           <td> {{ $cand2->telefone_fixo }} </td>
                           <td> {{ date('d/m/Y', strtotime($cand2->data_inscricao)) }} </td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="5">DADOS DIVERSIDADE:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Nome Social</font></th>
                           <th scope="col"><font size="2">Pronome</font></th>
                           <th scope="col"><font size="2">Gênero</font></th>
                           <th scope="col"><font size="2">Cor ou Raça</font></th>
                           <th scope="col"><font size="2">Concorda em Compartilhar Os Dados</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->nome_social }} </td>
                           <td> {{ $cand2->pronome }} </td>
                           <td> {{ $cand2->genero }} </td>
                           <td> {{ $cand2->cor }} </td>
                           <td> {{ $cand2->aceito }} </td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="3">INFORMAÇÃO CANDIDATURA:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Como Soube da Vaga</font></th>
                           <th scope="col"><font size="2">Foi Indicado Por Algum Parente</font></th>
                           <th scope="col"><font size="2">Você Trabalha ou Trabalhou no HCPGESTÃO</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->nome_social }} </td>
                           <td> <?php if($cand2->parentesco == 'nao'){ echo "NÃO"; } else { echo "SIM - " .$cand2->parentesco_nome; } ?> </td>
                           <td> <?php if($cand2->trabalha_oss == 'nao'){ echo "NÃO"; } else { echo "SIM - " .$cand2->trabalha_oss2; } ?> </td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="7">DADOS ENDEREÇO:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">CEP</font></th>
                           <th scope="col"><font size="2">Rua</font></th>
                           <th scope="col"><font size="2">Número</font></th>
                           <th scope="col"><font size="2">Bairro</font></th>
                           <th scope="col"><font size="2">Cidade</font></th>
                           <th scope="col"><font size="2">Estado</font></th>
                           <th scope="col"><font size="2">Complemento</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->cep }} </td>
                           <td> {{ $cand2->rua }} </td>
                           <td> {{ $cand2->numero }} </td>
                           <td> {{ $cand2->bairro }} </td>
                           <td> {{ $cand2->cidade }} </td>
                           <td> {{ $cand2->estado }} </td>
                           <td> {{ $cand2->complemento }}</td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead>
                          <tr>
                           <td colspan="4">DADOS NATURALIDADE:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Cidade</font></th>
                           <th scope="col"><font size="2">Estado</font></th>
                           <th scope="col"><font size="2">País</font></th>
                           <th scope="col"><font size="2">Data de Nascimento</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->lugar_nascimento }} </td>
                           <td> {{ $cand2->estado_nascimento }} </td>
                           <td> {{ $cand2->cidade_nascimento }} </td>
                           <td> {{ date('d/m/Y', strtotime($cand2->data_nascimento)) }} </td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead class="thead-dark">
                          <tr>
                           <td colspan="4">DADOS ESCOLARIDADE:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">Escolaridade</font></th>
                           <th scope="col"><font size="2">Status Escolaridade</font></th>
                           <th scope="col"><font size="2">Formação</font></th>
                           <th scope="col"><font size="2">Cursos</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> {{ $cand2->escolaridade }} </td>
                           <td> {{ $cand2->status_escolaridade }} </td>
                           <td> {{ $cand2->formacao }} </td>
                           <td> {{ $cand2->cursos }} </td>
                          </tr>
                         </tbody>
                        </table>

                        <table class="table table-striped table-dark" border="2">
                         <thead class="thead-dark">
                          <tr>
                           <td colspan="4">DADOS PCD:</td>
                          </tr>
                          <tr>
                           <th scope="col"><font size="2">PCD</font></th>
                           <th scope="col"><font size="2">Deficiência</font></th>
                           <th scope="col"><font size="2">CID</font></th>
                           <th scope="col"><font size="2">Laudo</font></th>
                          </tr>
                         </thead>
                         <tbody>
                          <tr>
                           <td> <?php if($cand2->deficiencia == '0'){ echo "NÃO"; } else { echo "SIM"; } ?> </td>
                           <td> <?php if($cand2->deficiencia == '0'){ echo "-"; } else { echo $cand2->deficiencia; } ?> </td>
                           <td> {{ $cand2->cid }} </td>
                           <td>
                            @if($cand2->deficiencia != '0')
                            <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/')}}//{{($cand2->nomearquivo)}}"> <i class="fas fa-file-alt"></i></a>
                            @endif 
                           </td>
                          </tr>
                         </tbody>
                        </table>
                       </div>
                      </div>
                    </div>                                              
                    </center>
                    </td>
                   </tr>
                 @endforeach 
                </table>
              </div>
              <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                  <tr>
                    <th style="font-size:20px;">
                      <p style="margin-left: -400px;"> {{ $processos2->appends(['pesq' => isset($pesq) ? $pesq : '','pesq2' => isset($pesq2) ? $pesq2 : ''])->links() }} </p>
                    </th>
                  </tr>
                </table>
               </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
