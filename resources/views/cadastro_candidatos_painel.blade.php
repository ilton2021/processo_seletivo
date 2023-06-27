<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Processo Seletivo - Cadastro Candidato</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/validacao.js') }}"> </script>
</head>
    <body> 
	  <div class="container">
	   <div id="reflexo"> 
	    <div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
			 <section  class="sppb-section" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			    <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" id='titulo'> <br> <br>
					  	<table class="table table-borderless" align="center" id="tabelatitulo" style="margin-bottom: 15px;">
						    <tr>
								<td>
								 <div style="text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-45px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
									<div class="container">
										<h5 class="display-8"><p style="align: center"><br><b>INSCRIÇÃO </p> <p style="align: center">  PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <br><img id="hcp" width="120px;" style="margin-top: 5px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
									</div>
								 </div>	
								</td>
							</tr>
						</table>
					  </div>
					</div>
				   </div>
				</div>
			  </section>	 
			</div>
			  <?php 
			    $soma = 0;
				if($candidato[0]->deficiencia != "") {  $soma += 1; } 
				if($candidato[0]->exp_01_soma != "") { $soma += 1; }
				if($qtdQ > 0) { $soma += 1; }
			  ?>
			  <br><br>
			  <form method="POST"  action="{{ route('validarCandidatoConfirmar', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id)) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

			  <table class="table table-borderless" border="0" width="500" id="inicio">
				<tr>
				@if($soma != 3)
				<td align="center">
					<strong><font color="red">Seu cadastro ainda NÃO FOI FINALIZADO, informe as opções a seguir.</font></strong> <br><br>
				    <strong>Seu número de Inscrição é: {{ $candidato[0]->numeroInscricao }}</strong>
				</td>
				@else
				<td align="center"><strong><font color="green">Seu cadastro foi FINALIZADO, clique no Botão Concluir.</font></strong> </td>
				<td> <input type="submit" class="btn btn-success btn-sm" value="Concluir" id="Salvar" name="Salvar" /> </td>
				@endif
				</tr>
			  </table>
			  @if($errors->any())
			  <div class="alert alert-success">
				<ul>
					@foreach ($errors->all() as $error)
					  <li>{{ $error }}</li>
					@endforeach
				</ul>
			  </div>
		 	  @endif 
		      </div>
			  <?php $c = str_replace(' ','',$processos[0]->nome); ?>
			  <br><br>
			  
			  <div class="container text-center">
				<div class="row">
					<div class="col">
						<b>Experiências, Questionário e PCD são obrigatórios *</b>
					</div> <br><br>
				</div>
				<div class="row">
				  <div class="col">
				    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
						@if($candidato[0]->exp_01_soma != "")
						 <div class="progress-bar bg-success w-100">100%</div>
						@else
						 <div class="progress-bar bg-danger w-0">0%</div>
						@endif
					</div> <br>
				  	<a href="{{ route('painelCandidatoExperienciasAviso', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id, 1)) }}">
					 <img src="{{ asset('img/painel/experiencias.jpg') }}" width="100px" height="100px">
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>EXPERIÊNCIAS *</b></h6></center>
				  </div>
				  <div class="col">
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
						@if($qtdQ > 0)
						 <div class="progress-bar bg-success w-100">100%</div>
						@else
						 <div class="progress-bar bg-danger w-0">0%</div>
						@endif
					</div> <br>
				  	<a href="{{ route('painelCandidatoQuestionario', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id, 1)) }}">
					 <img src="{{ asset('img/painel/questionario.png') }}" width="100px" height="100px"> 
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>QUESTIONÁRIO *</b></h6></center>
				  </div>
				  <div class="col">
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
						@if($candidato[0]->deficiencia != "")
						 <div class="progress-bar bg-success w-100">100%</div>
						@else
						 <div class="progress-bar bg-danger w-0">0%</div>
						@endif
					</div> <br>
				    <a href="{{ route('painelCandidatoPCD', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id, 1)) }}">
					 <img src="{{ asset('img/painel/pcd.png') }}" width="100px" height="100px"> 
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>PCD *</b></h6></center>
				  </div>
				</div>
			  </div>

			  	
		  	  <input hidden type="text" id="candidato_id" name="candidato_id" value="" />
			  <input hidden type="text" id="processo_seletivo_id" name="processo_seletivo_id" value="" />
			  <input hidden type="text" id="data_inscricao" name="data_inscricao" value="" />
			</form> 
		  </div>
		</div>
	  </div>
	 </div>	 
</body>
</html>