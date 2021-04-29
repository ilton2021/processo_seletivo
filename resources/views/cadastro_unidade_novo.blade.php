@extends('navbar.default-navbar')
	<div class="container" style="margin-top: 80px;">
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Unidades:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeUnidade') }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td><input type="text" class="form-control" id="nome" name="nome" value="" required="true"  /></td>
			        </tr>
                    <tr>
                      <td>Imagem:</td>
                      <td><input type="file" class="form-control" id="imagem" name="imagem" value="" required="true"  /></td>
				    </tr>
					<tr><td><br><br></td></tr>
					<tr>
                      <td><strong>Endereço:<strong></td>
                    </tr>
					<tr>
                      <td>Rua:</td>
					  <td><input type="text" class="form-control" id="rua" name="rua" value="" required="true"  /></td>
                    </tr>
					<tr>
                      <td>Número:</td>
					  <td><input type="text" class="form-control" id="numero" name="numero" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Bairro:</td>
					  <td><input type="text" class="form-control" id="bairro" name="bairro" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Cidade:</td>
					  <td><input type="text" class="form-control" id="cidade" name="cidade" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Estado:</td>
					  <td><input type="text" class="form-control" id="estado" name="estado" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>País:</td>
					  <td><input type="text" class="form-control" id="pais" name="pais" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>CEP:</td>
					  <td><input type="text" class="form-control" id="cep" name="cep" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Complemento:</td>
					  <td><input type="text" class="form-control" id="complemento" name="complemento" value="" /></td>
                    </tr>
                </table>
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="nova_unidade" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="unidade_novo" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>  
				
				</table>
				
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroUnidade')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
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