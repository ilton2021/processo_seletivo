@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Competências da Vaga:</h1>
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
            </div>
		
		  <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
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
					<tr><td colspan="2"><p align="right"><a href="{{route('vagaCadastro', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></p></td></tr>
				</table>
				
				<table class="table table-bordered" id="emptbl" width="100%" cellspacing="0">
					<tr>
					  <td colspan="2"><b>Competências Cadastradas:</b></td>
					  <td>
					   <center>
						<a class="btn btn-dark btn-sm" style="color: #FFFFFF;" href="{{route('vagaExperienciasNovo', array($processos[0]->id, $vaga[0]->id))}}" > Novo <i class="fas fa-check"></i></a>
					   </center>
					  </td> 
					</tr>
					@if($qtd > 0) 
					@foreach($vagasExp as $vagaE)
					<tr> 
					  <td><input type="text" class="form-control" id="exp" name="exp" value="<?php echo $vagaE->descricao; ?>" readonly /> </td>
					  <td><center><a class="btn btn-info btn-sm" style="color: #FFFFFF; margin-top: 10px" href="{{route('vagaExperienciasAlterar', array($processos[0]->id, $vaga[0]->id, $vagaE->id))}}" > Alterar <i class="fas fa-edit"></i></a></center></td> 
					  <td><center><a class="btn btn-danger btn-sm" style="color: #FFFFFF; margin-top: 10px" href="{{route('vagaExperienciasExcluir', array($processos[0]->id, $vaga[0]->id, $vagaE->id))}}" > Excluir <i class="fas fa-times-circle"></i></a></center></td>
					</tr> 
					@endforeach
					@endif
				</table>	
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="nova_vaga" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="vaga_novo" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
              </div>
            </div>
          </div>  
        </div>
      </div>
</body>
</html>