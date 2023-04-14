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
              <h6 class="m-0 font-weight-bold text-primary">Excluir Processo Seletivo:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('destroyProcesso', $processos[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td><input type="text" class="form-control" id="nome" name="nome" value="<?php echo $processos[0]->nome ?>" readonly="true"  /></td>
			        </tr>
                    <tr>
                      <td>Edital:</td>
					  <td><input type="text" class="form-control" id="edital" name="edital" value="<?php echo $processos[0]->edital ?>" readonly="true"  /></td>
                    </tr>
					<tr>
                      <td>Unidade:</td>
					  <td>
					    <input type="hidden" class="form-control" readonly="true" id="unidade_id" name="unidade_id" value="<?php echo $unidades[0]->id ?>" required="true"  />
						<input type="text" class="form-control" readonly="true" id="unidade" name="unidade" value="<?php echo $unidades[0]->nome ?>" readonly="true"  />
					  </td>
                    </tr>
					<tr>
                      <td>Início Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_inicio" name="inscricao_inicio" value="<?php echo $processos[0]->inscricao_inicio ?>" readonly="true" /></td>
                    </tr>
					<tr>
                      <td>Fim Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_fim" name="inscricao_fim" value="<?php echo $processos[0]->inscricao_fim ?>" readonly="true" /></td>
                    </tr>
					<tr>
                      <td>Data Prova:</td>
					  <td><input type="date" class="form-control" id="data_prova" name="data_prova" value="<?php echo $processos[0]->data_prova ?>" readonly="true" /></td>
                    </tr>
					<tr>
                      <td>Data Resultado:</td>
					  <td><input type="date" class="form-control" id="data_resultado" name="data_resultado" value="<?php echo $processos[0]->data_resultado ?>" readonly="true" /></td>
                    </tr>
                </table>
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="excluir_processo" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="processo_excluir" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroProcesso')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Excluir" id="Excluir" name="Excluir" /> 				 
				   </td>
				  </tr>
				</table>
			   </form>
              </div>
            </div>
          </div>

        </div>
      </div>
  <script src="../../../vendor/jquery/jquery.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../../js/sb-admin-2.min.js"></script>
  <script src="../../../vendor/chart.js/Chart.min.js"></script>
  <script src="../../../js/demo/chart-area-demo.js"></script>
  <script src="../../../js/demo/chart-pie-demo.js"></script>
</body>
</html>
