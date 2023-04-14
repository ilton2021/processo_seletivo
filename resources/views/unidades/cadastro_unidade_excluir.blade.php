@extends('navbar.default-navbar')
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
    <div class="container" style="margin-top: 80px;">
        <div class="container">
			    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Excluir Unidades:</h6>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
              </ul>
            </div>
            @endif
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" action="{{ route('destroyUnidade', $unidades[0]->id) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td><input type="text" class="form-control" id="nome" name="nome" value="<?php echo $unidades[0]->nome; ?>" readonly="true" /></td>
			              </tr>
                    <tr>
                      <td>Imagem:</td>
                      <td><input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo $unidades[0]->imagem; ?>" readonly="true" /></td>
                    </tr>
                    <tr><td><br><br></td></tr>
                    <tr>
                      <td><strong>Endereço:<strong></td>
                    </tr>
				          	<tr>
                      <td>Rua:</td>
					            <td><input type="text" class="form-control" id="rua" name="rua" value="<?php echo $endereco[0]->rua; ?>" readonly="true"  /></td>
                    </tr>
					          <tr>
                      <td>Número:</td>
					            <td><input type="text" class="form-control" id="numero" name="numero" value="<?php echo $endereco[0]->numero; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>Bairro:</td>
					            <td><input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $endereco[0]->bairro; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>Cidade:</td>
					            <td><input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $endereco[0]->cidade; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>Estado:</td>
					            <td><input type="text" class="form-control" id="estado" name="estado" value="<?php echo $endereco[0]->estado; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>País:</td>
					            <td><input type="text" class="form-control" id="pais" name="pais" value="<?php echo $endereco[0]->pais; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>CEP:</td>
					            <td><input type="text" class="form-control" id="cep" name="cep" value="<?php echo $endereco[0]->cep; ?>" readonly="true" /></td>
                    </tr>
					          <tr>
                      <td>Complemento:</td>
					            <td><input type="text" class="form-control" id="complemento" name="complemento" value="<?php echo $endereco[0]->complemento; ?>" readonly="true" /></td>
                    </tr>
                </table>
                <table>
                  <tr>
                    <td hidden> <input type="text" id="acao" name="acao" value="alterar_unidade" /> </td>
                  <td hidden> <input type="text" id="tela" name="tela" value="unidade_alterar" /> </td>
                  <td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
                  </tr>
                </table>
				
                <table border=0 width=1000>
                  <tr >
                  <td colspan="2" align="right">
                    <a href="{{route('cadastroUnidade')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
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
</body>
</html>