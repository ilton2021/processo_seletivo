@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Competências da Vaga: (Alterar)</h1>
       </div>
        <div class="container-fluid">
			@if ($errors->any())
			<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			</div>
			@endif
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Vagas do Processo Seletivo:</h6>
            </div> <?php $a = 0; ?>
		
		  <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
			   <form method="POST" action="{{ route('updateVagaExp', array($processos[0]->id, $vaga[0]->id, $vagaExp[0]->id)) }}">
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
			    <table class="table table-bordered" id="emptbl" width="100%" cellspacing="0">
					<tr>
					  <td>Processo Seletivo:</td>
					  <td><input type="text" class="form-control" id="processo_seletivo" name="processo_seletivo" value="<?php echo $processos[0]->nome ?>" readonly /> </td>
					  <td hidden><input type="text" class="form-control" id="processo_seletivo_id" name="processo_seletivo_id" value="<?php echo $processos[0]->id ?>" readonly /> </td>
					</tr>
					<tr>
					  <td>Vaga:</td>
					  <td><input type="text" class="form-control" id="vaga" name="vaga" value="<?php echo $vaga[0]->nome ?>" readonly /> </td>
					  <td hidden><input type="text" class="form-control" id="vaga_id" name="vaga_id" value="<?php echo $vaga[0]->id ?>" readonly /> </td>
					</tr>
				</table>
				
				<table class="table table-bordered" id="emptbl" width="100%" cellspacing="0">
					<tr>
					  <td colspan="2"><b>Competência:</b></td>
					</tr>
					<tr> 
					  <td><input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $vagaExp[0]->descricao; ?>" required /> </td>
					  <td>
						<select class="form-control" id="tipo" name="tipo">
							@if($vagaExp[0]->tipo == 1)
							 <option value="1" selected>Necessárias</option>
							 <option value="2">Desejadas</option>
							@else
							 <option value="1">Necessárias</otpion>
							 <option value="2" selected>Desejadas</option>
							@endif
						</select>
					  </td>
					</tr>
				</table>	
				
				<table border="0" width="1000px">
				  <tr>
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroVagaExperiencias', array($processos[0]->id, $vaga[0]->id))}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Alterar" id="Salvar" name="Salvar" /> 				 
				   </td>
				  </tr>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="nova_vaga" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="vaga_novo" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
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