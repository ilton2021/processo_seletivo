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
										<h5 class="display-8"><p style="align: center"><br><b>ÁREA DO CANDIDATO  - DOCUMENTOS </p> <p style="align: center">  PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <br><img id="hcp" width="120px;" style="margin-top: 5px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
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
				if($user[0]->deficiencia != "") {  $soma += 1; } 
				if($user[0]->exp_01_soma != "") { $soma += 1; }
			  ?>
			  <br><br>
			  <form method="POST"  action="{{ route('validarCandidatoConfirmar', array($unidade[0]->id, $processos[0]->id, $user[0]->id)) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

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
						<b>ÁREA DO CANDIDATO - DOCUMENTOS (DEPENDENTES): <br><br>
						Anexe sua documentação para seguirmos para o próximo passo do processo admissional, <font color="red">anexar arquivos em PDF</font>:</b><br><br>
						<a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="margin-top: 5px; color: #FFFFFF;" class="btn btn-warning btn-sm"> VOLTAR <i class="fas fa-undo-alt"></i></a> <br><br><br><br>
					</div> 
				</div>
				<div class="row"> <?php $vac = 0; $nasc = 0; $rg = 0; $cpf = 0; $escol = 0; ?>
				 <div class="col">
				 	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					   @foreach($docs as $doc)
					    @if($doc->id_documento == "17") <?php $vac = 1; ?> @break @else <?php $vac = 0; ?> @endif
					   @endforeach
					   @if($vac == 0) <div class="progress-bar bg-danger w-100">0%</div>
					    @else <div class="progress-bar bg-success w-100">100%</div>
					   @endif
					</div>
					<a href="{{ route('cadastrarDocumentoDep', array($unidade[0]->id,$processos[0]->id,$user[0]->id, 17)) }}">
					 <img src="{{ asset('img/painel/documentos/vacina.jpg') }}" width="80px" height="80px">
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>CARTÃO DE VACINAÇÃO*</b></h6></center>
				  </div>
				  <div class="col">
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					   @foreach($docs as $doc)
					    @if($doc->id_documento == "18") <?php $nasc = 1; ?> @break @else <?php $nasc = 0; ?> @endif
					   @endforeach
					   @if($nasc == 0) <div class="progress-bar bg-danger w-100">0%</div>
					    @else <div class="progress-bar bg-success w-100">100%</div>
					   @endif
					</div>
					<a href="{{ route('cadastrarDocumentoDep', array($unidade[0]->id,$processos[0]->id,$user[0]->id, 18)) }}">
					 <img src="{{ asset('img/painel/documentos/certidaoNascCas.jpg') }}" width="80px" height="80px">
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>CERTIDÃO DE NASCIMENTO*</b></h6></center>
				  </div>
				  <div class="col">
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					   @foreach($docs as $doc)
					    @if($doc->id_documento == "19") <?php $rg = 1; ?> @break @else <?php $rg = 0; ?> @endif
					   @endforeach
					   @if($rg == 0) <div class="progress-bar bg-danger w-100">0%</div>
					    @else <div class="progress-bar bg-success w-100">100%</div>
					   @endif
					</div>
					<a href="{{ route('cadastrarDocumentoDep', array($unidade[0]->id, $processos[0]->id, $user[0]->id, 19)) }}">
					 <img src="{{ asset('img/painel/documentos/rg.jpg') }}" width="80px" height="80px"> 
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>RG*</b></h6></center>
				  </div>
				  <div class="col">
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					   @foreach($docs as $doc)
					    @if($doc->id_documento == "20") <?php $cpf = 1; ?> @break @else <?php $cpf = 0; ?> @endif
					   @endforeach
					   @if($cpf == 0) <div class="progress-bar bg-danger w-100">0%</div>
					    @else <div class="progress-bar bg-success w-100">100%</div>
					   @endif
					</div>
					<a href="{{ route('cadastrarDocumentoDep', array($unidade[0]->id, $processos[0]->id, $user[0]->id, 20)) }}">
					 <img src="{{ asset('img/painel/documentos/cpf.jpg') }}" width="80px" height="80px"> 
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>CPF*</b></h6></center>
				  </div>
				  <div class="col"> 
				  	<div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
					   @foreach($docs as $doc)
					    @if($doc->id_documento == "21") <?php $escol = 1; ?> @break @else <?php $escol = 0; ?> @endif
					   @endforeach
					   @if($escol == 0) <div class="progress-bar bg-danger w-100">0%</div>
					    @else <div class="progress-bar bg-success w-100">100%</div>
					   @endif
					</div>
					<a href="{{ route('cadastrarDocumentoDep', array($unidade[0]->id, $processos[0]->id, $user[0]->id, 21)) }}">
					 <img src="{{ asset('img/painel/documentos/historicoEscolar.jpg') }}" width="80px" height="80px"> 
					</a> <br><br>
					<center><h6 class="modal-title"id="exampleModalLongTitle"><b>ESTABELECIMENTO ESCOLAR*</b></h6></center>
				  </div>
				</div>
			  <br><br>
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