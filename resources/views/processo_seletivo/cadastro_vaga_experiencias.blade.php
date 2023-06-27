@extends('navbar.default-navbar')
<body id="page-top">
	<div class="container" style="margin-top: 80px;">
       <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Competências da Vaga: (Novo)</h1>
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
			  <form method="POST" action="{{ route('storeVagaExp', array($processos[0]->id, $vaga[0]->id)) }}">
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
					<tr>
					  <td colspan="2">Competências:</td>
					  <td>Tipo:</td>
					</tr>
					<tr>
                      <td colspan="2">
						<input type="text" class="form-control" id="exp1" name="exp1" value="{{ old('exp1') }}" required  />
					  </td>
					  <td>
					  	<select id="tipo1" name="tipo1" class="form-control" required> 
							<option value="">Selecione...</option>
							<option value="1">Necessárias</option>
							<option value="2">Desejadas</option>
						</select>
					  </td>
			        </tr>
					<tr>
                      <td colspan="2">
						<input type="text" class="form-control" id="exp2" name="exp2" value="{{ old('exp2') }}" />
					  </td>
					  <td>
					  	<select id="tipo2" name="tipo2" class="form-control"> 
							<option value="-">Selecione...</option>
							<option value="1">Necessárias</option>
							<option value="2">Desejadas</option>
						</select>
					  </td>
			        </tr>
					<tr>
                      <td colspan="2">
						<input type="text" class="form-control" id="exp3" name="exp3" value="{{ old('exp3') }}" />
					  </td>
					  <td>
					  	<select id="tipo3" name="tipo3" class="form-control"> 
							<option value="-">Selecione...</option>
							<option value="1">Necessárias</option>
							<option value="2">Desejadas</option>
						</select>
					  </td>
			        </tr>
					<tr>
                      <td colspan="2">
						<input type="text" class="form-control" id="exp4" name="exp4" value="{{ old('exp4') }}" />
					  </td>
					  <td>
					  	<select id="tipo4" name="tipo4" class="form-control"> 
							<option value="-">Selecione...</option>
							<option value="1">Necessárias</option>
							<option value="2">Desejadas</option>
						</select>
					  </td>
			        </tr>
					<tr>
                      <td colspan="2">
						<input type="text" class="form-control" id="exp5" name="exp5" value="{{ old('exp5') }}" />
					  </td>
					  <td>
					  	<select id="tipo5" name="tipo5" class="form-control"> 
							<option value="-">Selecione...</option>
							<option value="1">Necessárias</option>
							<option value="2">Desejadas</option>
						</select>
					  </td>
			        </tr>
				</table> 
				<table border="0" width="1000px">
				  <tr>
				   <td colspan="2" align="right">
				   <a href="{{route('cadastroVagaExperiencias', array($processos[0]->id, $vaga[0]->id))}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /> 				 
				   </td>
				  </tr>
				</table>
				<table>
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