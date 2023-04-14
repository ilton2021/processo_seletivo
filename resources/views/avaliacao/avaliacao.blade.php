@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
	  @if ($errors->any())
      <div class="alert alert-success">
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
              <h6 class="m-0 font-weight-bold text-primary">Avaliação: (<?php echo $candidato[0]->nome; ?>)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					 <td><b><center> AVALIAÇÃO DE LIDERANÇA: </center></b></td>
					 <td><b><center> AVALIAÇÃO OPERACIONAL: </center></b></td>
					</tr>

					<tr>
					 <td><b><center> <a href="{{ route('avaliacaoLideranca', array($processos[0]->id, $candidato[0]->id)) }}" class="btn btn-info btn-sm">LIDERANÇA</a> </center></b></td>
					 <td><b><center> <a href="{{ route('avaliacaoOperacional', array($processos[0]->id,$candidato[0]->id)) }}" class="btn btn-info btn-sm">OPERACIONAL</a> </center></b></td>
					</tr>

					<tr>
					 <td colspan="2"><p align="right"><br> <a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="margin-top: 5px; color: #FFFFFF;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a> </p></td>
					</tr>
				</table>

				<table border=0 width=1000>
				  <tr>
				   <td colspan="2" align="right">
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
