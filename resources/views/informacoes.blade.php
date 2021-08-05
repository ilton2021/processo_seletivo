@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
       @if (Session::has('mensagem'))
		@if ($text == true)
		<div class="container">
	     <div class="alert alert-danger {{ Session::get ('mensagem')['class'] }} ">
		      {{ Session::get ('mensagem')['msg'] }}
		 </div>
		</div>
		@endif
	   @endif
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Informações do Candidato:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					 <td colspan="2"><b> Dados Pessoais: </b></td>
					</tr>
					<tr>
                      <td>Nome:</td>
                      <td>{{ $processos2[0]->nome }}</td>
			        </tr>
                    <tr>
                      <td>CPF:</td>
					  <td>
					   {{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $processos2[0]->cpf) }}
					  </td>
                    </tr>
					<tr>
                      <td>E-mail:</td>
					  <td>{{ $processos2[0]->email }}</td>
                    </tr>
					<tr>
                      <td>Telefone Celular - Telefone Fixo:</td>
					  <td>{{ $processos2[0]->telefone }} - {{ $processos2[0]->telefone_fixo }}</td>
                    </tr>
					<tr>
                      <td>Currículo:</td>
                      <td>
					  @if($processos[0]->origem == 1)
					  <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/curriculo')}}/{{($processos[0]->nome)}}/{{($processos2[0]->nomearquivo2)}}"> <i class="fas fa-file-alt"></i></a></center></th>
					  @else
					  <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" 
						href="{{asset('http://hcp.org.br/processoseletivo')}}/{{($processos[0]->nome)}}/{{('admin/lab/uploads')}}/{{($processos2[0]->nomearquivo2)}}"> <i class="fas fa-file-alt"></i></a></center></th>
					  @endif
					  </td>
				    </tr>
					<tr>
					 <td colspan="2"><b>Endereço:</b></td> 
					</tr>
					<tr>
                      <td>Rua - Nº:</td>
					  <td>{{ $processos2[0]->rua }} - {{ $processos2[0]->numero }}</td>
                    </tr>
					<tr>
                      <td>Bairro:</td>
					  <td>{{ $processos2[0]->bairro }}</td>
                    </tr>
					<tr>
                      <td>Cidade - Estado:</td>
					  <td>{{ $processos2[0]->cidade }} - {{ $processos2[0]->estado }}</td>
                    </tr>
					<tr>
                      <td colspan="2"><b>Experiência Profissional:</b></td>
				    </tr>
					<tr>
                      <td>Empresa:</td>
					  <td>{{ $processos2[0]->exp_01_empresa }}</td>
                    </tr>
					<tr>
                      <td>Cargo:</td>
					  <td>{{ $processos2[0]->exp_01_cargo }}</td>
                    </tr>
					<tr>
                      <td>Atribuições:</td>
					  <td>{{ $processos2[0]->exp_01_atribuicoes }}</td>
                    </tr>
					<tr>
                      <td>CTPS:</td>
					  <td>
					    <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/ctps1')}}/{{($processos[0]->nome)}}/{{($processos2[0]->arquivo_ctps1)}}"> <i class="fas fa-file-alt"></i></a></center></th>
					  </td>
                    </tr>
					<tr>
                      <td>Data Início:</td>
					  <td>{{ $processos2[0]->exp_01_data_ini }}</td>
                    </tr>
					<tr>
                      <td>Data Fim:</td>
					  <td>{{ $processos2[0]->exp_01_data_fim }}</td>
                    </tr>
					@if($processos2[0]->exp_02_empresa)
					<tr>
                      <td>Empresa2:</td>
					  <td>{{ $processos2[0]->exp_02_empresa }}</td>
                    </tr>
					<tr>
                      <td>Cargo:</td>
					  <td>{{ $processos2[0]->exp_02_cargo }}</td>
                    </tr>
					<tr>
                      <td>Atribuições:</td>
					  <td>{{ $processos2[0]->exp_02_atribuicoes }}</td>
                    </tr>
					<tr>
                      <td>CTPS:</td>
					  <td>
					   <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/ctps1')}}/{{($processos[0]->nome)}}/{{($processos2[0]->arquivo_ctps2)}}"> <i class="fas fa-file-alt"></i></a></center></th>
					  </td>
                    </tr>
					<tr>
                      <td>Data Início:</td>
					  <td>{{ $processos2[0]->exp_02_data_ini }}</td>
                    </tr>
					<tr>
                      <td>Data Fim:</td>
					  <td>{{ $processos2[0]->exp_02_data_fim }}</td>
                    </tr>
					@endif
					@if($processos2[0]->exp_03_empresa)
					<tr>
                      <td>Empresa2:</td>
					  <td>{{ $processos2[0]->exp_03_empresa }}</td>
                    </tr>
					<tr>
                      <td>Cargo:</td>
					  <td>{{ $processos2[0]->exp_03_cargo }}</td>
                    </tr>
					<tr>
                      <td>Atribuições:</td>
					  <td>{{ $processos2[0]->exp_03_atribuicoes }}</td>
                    </tr>
					<tr>
                      <td>CTPS:</td>
					  <td>
					   <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/ctps1')}}/{{($processos[0]->nome)}}/{{($processos2[0]->arquivo_ctps3)}}"> <i class="fas fa-file-alt"></i></a></center></th>
					  </td>
                    </tr>
					<tr>
                      <td>Data Início:</td>
					  <td>{{ $processos2[0]->exp_03_data_ini }}</td>
                    </tr>
					<tr>
                      <td>Data Fim:</td>
					  <td>{{ $processos2[0]->exp_03_data_fim }}</td>
                    </tr>
					@endif
					<tr>
					<td>&nbsp;</td>
					</tr>
					<tr>
					 <td> <b>Como Soube da Vaga?</b></td>
					 @if($processos2[0]->como_soube == "site_hcpgestao")
					 <td> {{ 'Site do HCP Gestão' }} </td>		
					 @elseif($processos2[0]->como_soube == "redes_sociais")
					 <td> {{ 'Redes Sociais' }} </td>		
					 @elseif($processos2[0]->como_soube == "indicacao")
					 <td> {{ 'Indicação' }} </td>		
					 @else
					 <td> {{ $processos2[0]->como_soube }} </td>		
					 @endif
					</tr>
					<tr>
					 <td> <b>Possui Parentesco com algum Colaborador do HCP Gestão?</b></td>
					 @if($processos2[0]->parentesco == "nao")
					 <td> {{ 'Não' }} </td>
					 @else	
					 <td> {{ 'Sim - ' .$processos2[0]->parentesco_nome }} </td>		
					 @endif
					</tr>
                </table>
				
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastrarResultados', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
				   </td>
				  </tr>
				</table>
			  </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
