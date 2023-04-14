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
              <h6 class="m-0 font-weight-bold text-primary">Excluir Quadro de Avisos:</h6>
            </div>
            <div class="card-body"> 
              <div class="table-responsive">
			  <form method="POST" action="{{ route('deleteQuadroAvisos', $quadros[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Descrição:</td>
                      <td>
					  	<textarea readonly="true" class="form-control" id="descricao" name="descricao" rows="8" required="true">{{ $quadros[0]->descricao }} </textarea> 
					  </td>
			        </tr>
					<tr>
					 <td> Processo Seletivo: </td>
					 <td> 
					  @foreach($processos as $pc)
					   @if($pc->id == $quadros[0]->processo_seletivo_id)	
					     <input hidden readonly="true" type="text" id="processo_seletivo_id" class="form-control" name="processo_seletivo_id" value="<?php echo $pc->id; ?>" />
						 <input readonly="true" type="text" id="processo_seletivo" class="form-control" name="processo_seletivo" value="<?php echo $pc->nome; ?>" />
					   @endif
					  @endforeach
					 </td>
					</tr>
					<tr>
					 <td colspan='2'><b> Deseja Realmente Excluir este Aviso??? </b></td>
					</tr>
                </table>
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="arquivo" name="arquivo" value="<?php echo $quadros[0]->arquivo; ?>" /> </td>
				    <td hidden> <input type="text" id="arquivo_caminho" name="arquivo_caminho" value="" /></td>
				    <td hidden> <input type="text" id="acao" name="acao" value="excluir_quadro_aviso" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="quadro_aviso_excluir" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroQuadroAvisos')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-danger btn-sm" style="margin-top: 10px;" value="Excluir" id="Salvar" name="Salvar" /> 				 
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
