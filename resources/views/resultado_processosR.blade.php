@extends('navbar.default-navbar')
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
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
		@endif <?php $qtd = sizeof($processos2); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Resultado Processo Seletivo - Resultado Final:</h6>
            </div> 
			<div class="card-body">
              <div class="table-responsive"> 
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
				<form method="POST" action="{{ route('storeAvaliacaoR', array($idP, $candidato, $vaga)) }}">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <tr>
					 <td align="right" colspan="7" border="0"> 
					  <a href="{{route('cadastrarResultados', $idP)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 </td>
					</tr>
					<tr>
                      <td><strong>Resultado Final:</strong></td>
					  <td>
					    <select class="form-control" id="modo" name="modo">
						  @if($processos2[0]->status_resultado == "Aprovado (a)")
						  <option id="modo" name="modo" value="3">Aprovado (a)</option>
						  @elseif($processos2[0]->status_resultado == "NПлкo Aprovado (a)")
						  <option id="modo" name="modo" value="4">N&atilde;o Aprovado (a)</option>
						  @elseif($processos2[0]->status_resultado == "Cadastro de Reserva")
						  <option id="modo" name="modo" value="5">Cadastro de Reserva</option>
						  @elseif($processos2[0]->status_resultado == "Desistente")
						  <option id="modo" name="modo" value="6">Desistente</option>
						  @elseif($processos2[0]->status_resultado == "Desabilitado")
						  <option id="modo" name="modo" value="7">Desabilitado</option>
						  @else
						  <option id="modo" name="modo" value="0">Selecione...</option>
						  <option id="modo" name="modo" value="3">Aprovado (a)</option>
						  <option id="modo" name="modo" value="4">N&atilde;o Aprovado (a)</option>
						  <option id="modo" name="modo" value="5">Cadastro de Reserva</option>
						  <option id="modo" name="modo" value="6">Desistente</option>
						  <option id="modo" name="modo" value="7">Desabilitado</option>
						  @endif
						</select>
						</td>
				    </tr>
					<tr>
                      <td>Digite uma mensagem ao Candidato:</td>
                      @if($processos2[0]->msg_resultado == "")
					  <th><textarea class="form-control" id="mensagem" name="mensagem" required></textarea></th>
					  @else
					  <th><textarea class="form-control" id="mensagem" name="mensagem" rows="5" value="<?php echo $processos2[0]->msg_resultado; ?>" required>{{ $processos2[0]->msg_resultado }}</textarea></th>
				      @endif
                    </tr>
					<tr>
					  <td colspan="2" align="right"><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /></td>
					</tr>
					<tr>
					  <td hidden> <input hidden type="text" id="tela" name="tela" value="resultado" /> </td>
					  <td hidden> <input hidden type="text" id="acao" name="acao" value="cadastro_resultado" /> </td>
					  <td hidden> <input hidden type="text" id="user_id" name="user_id" value="" /> </td>
					  <td hidden> <input hidden type="text" id="processo_seletivo_id" name="processo_seletivo_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="candidato_id" name="candidato_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="unidade_id" name="unidade_id" value="" /></td>
					  <td hidden> <input hidden type="text" id="resultado" name="resultado" value="" /></td>
					  <td hidden> <input hidden type="text" id="vaga_id" name="vaga_id" value="" /></td>	
					</tr>
				  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>