@extends('navbar.default-navbar')
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
              <h6 class="m-0 font-weight-bold text-primary">Alterar Processo Seletivo:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('updateProcesso', $processos[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td><input type="text" class="form-control" id="nome" name="nome" value="<?php echo $processos[0]->nome ?>" required="true" readonly="true" /></td>
			        </tr>
                    <tr>
                      <td>Edital:</td>
					  <td><input type="text" class="form-control" id="edital" name="edital" value="<?php echo $processos[0]->edital ?>" required="true"  /></td>
                    </tr>
					<tr>
					 <td> </td>
					 <td><input type="file" class="form-control" id="edital_" name="edital_" value=""  /></td>
					</tr>
					<tr>
                      <td>Unidade:</td>
					  <td>
					    <input type="hidden" class="form-control" readonly="true" id="unidade_id" name="unidade_id" value="<?php echo $unidades[0]->id ?>" required="true"  />
						<input type="text" class="form-control" readonly="true" id="unidade" name="unidade" value="<?php echo $unidades[0]->nome ?>" required="true"  />
					  </td>
                    </tr>
					<tr>
                      <td>Início Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_inicio" name="inscricao_inicio" value="<?php echo $processos[0]->inscricao_inicio ?>" required="true" /></td>
                    </tr>
					<tr>
                      <td>Fim Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_fim" name="inscricao_fim" value="<?php echo $processos[0]->inscricao_fim ?>" required="true" /></td>
                    </tr>
					<tr>
                      <td>Data Prova:</td>
					  <td><input type="date" class="form-control" id="data_prova" name="data_prova" value="<?php echo $processos[0]->data_prova ?>" required="true" /></td>
                    </tr>
					<tr>
                      <td>Data Resultado:</td>
					  <td><input type="date" class="form-control" id="data_resultado" name="data_resultado" value="<?php echo $processos[0]->data_resultado ?>" required="true" /></td>
                    </tr>
                </table>
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="alterar_processo" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="processo_alterar" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroProcesso')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /> 				 
				   </td>
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
