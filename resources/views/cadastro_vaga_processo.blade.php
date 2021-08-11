@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Vaga:</h1>
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
              <h6 class="m-0 font-weight-bold text-primary">Vagas do Processo Seletivo: (<?php echo $processos[0]->nome; ?>)</h6>
            </div>
			
			<div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeVaga', $processos[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <tr>
					 <td>Nome:</td>
					 <td>Código Vaga:</td>
					 <td>Categoria:</td>
					 <td>Carga Horária</td>
					 <td>Salário Bruto:</td>
					 <td>Vagas:</td>
					 <td>Taxa:</td>
					 <td><center>Alterar</center></td>
					 <td><center>Excluir</center></td>
				   </tr>
				   @foreach($vagas as $vaga)
				   <tr>
				     <td>{{ $vaga->nome }}</td>
					 <td>{{ $vaga->codigo_vaga }}</td>
					 <td>{{ $vaga->categoria_profissional }}</td>
					 <td>{{ $vaga->carga_horaria }}</td>
					 <td>{{ $vaga->salario_bruto }}</td> 
					 <td>{{ $vaga->quantidade }}</td>
					 <td>{{ $vaga->taxa }}</td>
					 <td><center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{route('vagaAlterar', array($processos[0]->id, $vaga->id))}}" > <i class="fas fa-edit"></i></a></center></td>
					 <td><center><a class="btn btn-danger btn-sm" style="color: #FFFFFF;" href="{{route('vagaExcluir', array($processos[0]->id, $vaga->id))}}" > <i class="fas fa-times-circle"></i></a></center></td>
				   </tr>
				   @endforeach
				</table>
			   </form>
              </div>
            </div>
          </div>
		
		  <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cadastro Vagas:</h6>
            </div>	
			
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeVaga', $processos[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
					 <td>Processo Seletivo:</td>
					 <td><input type="text" class="form-control" id="processo_seletivo" name="processo_seletivo" value="<?php echo $processos[0]->nome ?>" readonly="true" /> </td>
					 <td hidden><input type="text" class="form-control" id="processo_seletivo_id" name="processo_seletivo_id" value="<?php echo $processos[0]->id ?>" readonly="true" /> </td>
					</tr>
					<tr>
                      <td>Cargo:</td>
                      <td><input type="text" class="form-control" id="nome" name="nome" value="" required="true"  /></td>
			        </tr>
                    <tr>
                      <td>Código da Vaga:</td>
                      <td><input type="text" class="form-control" id="codigo_vaga" name="codigo_vaga" value="" required="true"  /></td>
				    </tr>
					<tr>
                      <td>Categoria Profissional:</td>
					  <td><input type="text" class="form-control" id="categoria_profissional" name="categoria_profissional" value="" required="true"  /></td>
                    </tr>
					<tr>
                      <td>Carga Horária:</td>
					  <td><input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Salário Bruto:</td>
					  <td><input type="text" class="form-control" id="salario_bruto" name="salario_bruto" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Requisitos:</td>
					  <td><textarea type="text" class="form-control" id="requisitos" name="requisitos" value="" ></textarea></td>
                    </tr>
					<tr>
                      <td>Critérios:</td>
					  <td><textarea type="text" class="form-control" id="criterios" name="criterios" value="" ></textarea></td>
                    </tr>
					<tr>
                      <td>Status:</td>
					  <td>
						<select class="form-control" id="status" name="status">
						 <option id="status" name="status" value="Em Aberto">Em Aberto</option>
						 <option id="status" name="status" value="Encerrado">Encerrado</option>
						</select>
					  </td>
                    </tr>
					<tr>
                      <td>Insalubridade:</td>
					  <td><input type="text" class="form-control" id="insalubridade" name="insalubridade" value="" /></td>
                    </tr>
					<tr>
                      <td>Taxa:</td>
					  <td><input type="text" class="form-control" id="taxa" name="taxa" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Quantidade de Vagas:</td>
					  <td><input type="number" class="form-control" id="quantidade" name="quantidade" value="" required="true" /></td>
                    </tr>
                </table>
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="nova_vaga" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="vaga_novo" /> </td>
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