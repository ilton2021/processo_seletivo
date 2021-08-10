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
              <h6 class="m-0 font-weight-bold text-primary">Cadastro Candidato:</h6>
            </div>
            <div class="card-body"> 
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeCandidato2', $processos[0]->id) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td> <input type="text" id="nome" name="nome" class="form-control" required="true" value="{{ old('nome') }}" /> </td>
			        </tr>
					<tr>
                      <td>CPF:</td>
					  <td><input type="text" class="form-control" id="cpf" name="cpf" required="true" value="{{ old('cpf') }}" /></td>
                    </tr>
					<tr>
					<tr>
                      <td>E-mail:</td>
                      <td> <input type="text" id="email" name="email" class="form-control" required="true" value="{{ old('email') }}" /> </td>
				    </tr>
                      <td>Vaga:</td>
                      <td> 
					   <select class="form-control" id="vaga" name="vaga">
					   @foreach($vagas as $vaga)
					    <option id="vaga" name="vaga">{{ $vaga->nome }}</option> 
					   @endforeach
					   </select>
					  </td>
			        </tr>
					<tr>
                      <td>Telefone:</td>
					  <td> <input type="text" id="telefone" name="telefone" class="form-control" /> </td>
                    </tr>
					<tr>
                      <td>Data Inscrição:</td>
					  <td><input type="date" class="form-control" id="data_inscricao" name="data_inscricao" required="true" /></td>
                    </tr>
					
					<tr>
                      <td>Currículo:</td>
					  <td><input type="file" class="form-control" id="nome_arquivo2" name="nome_arquivo2" value="" /></td>
                    </tr>
                </table>
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="novo_candidato_manual" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="candidato_manual_novo" /> </td>
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
