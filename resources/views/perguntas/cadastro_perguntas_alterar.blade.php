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
              <h6 class="m-0 font-weight-bold text-primary">Alterar Perguntas:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			  <form method="POST" action="{{ route('updatePerguntas', $perguntas[0]->id) }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Descrição:</td>
                      <td><textarea type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $perguntas[0]->descricao ?>" required>{{ $perguntas[0]->descricao }}</textarea></td>
			        </tr>
                </table>
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="alterar_perguntas" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="perguntas_alterar" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroPerguntas')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
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
