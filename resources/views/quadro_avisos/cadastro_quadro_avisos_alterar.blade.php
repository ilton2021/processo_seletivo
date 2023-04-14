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
              <h6 class="m-0 font-weight-bold text-primary">Alterar Quadro de Avisos:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('updateQuadroAvisos', $quadros[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Descrição:</td>
                      <td>
					  	<textarea class="form-control" id="descricao" name="descricao" rows="8" required="true">{{ $quadros[0]->descricao }} </textarea> 
					  </td>
			        </tr>
                    <tr>
                      <td>Processo Seletivo:</td>
					  <td>
						<select class="form-control" id="processo_seletivo_id" name="processo_seletivo_id" readonly="true">
						  @foreach($processos as $pc)
						   @if($pc->id == $quadros[0]->processo_seletivo_id)
							 <option value="<?php echo $pc->id ?>" id="processo_seletivo_id" name="processo_seletivo_id" selected>{{ $pc->nome }}</option>
						   @endif
						  @endforeach
						</select>
					  </td>
                    </tr>
					<tr>
                      <td>Arquivo:</td>
                      <td><input type="file" class="form-control" id="arquivo_novo" name="arquivo_novo" value="" /></td>
					</tr>
					<tr>
					  <td> </td>  
					  <td><input readonly="true" type="text" class="form-control" id="arquivo" name="arquivo" value="<?php echo $quadros[0]->arquivo; ?>" required="true" /></td>
				    </tr>
                </table>
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="arquivo_caminho" name="arquivo_caminho" value="" /></td>
				    <td hidden> <input type="text" id="acao" name="acao" value="alterar_quadro_aviso" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="quadro_aviso_alterar" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroQuadroAvisos')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
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