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
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('js/utils.js') }}" rel="stylesheet">
  <link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>

   document.addEventListener('keydown', function(event) { //pega o evento de precionar uma tecla
	  if(event.keyCode != 46 && event.keyCode != 8){//verifica se a tecla precionada nao e um backspace e delete
		var i = document.getElementById("telefone").value.length; //aqui pega o tamanho do input
		if (i === 0)
		  document.getElementById("telefone").value = document.getElementById("telefone").value + "(";
		if (i === 3)
		  document.getElementById("telefone").value = document.getElementById("telefone").value + ")";
		if (i === 9) //aqui faz a divisoes colocando um ponto no terceiro e setimo indice
		  document.getElementById("telefone").value = document.getElementById("telefone").value + "-";
	  }
	});
	document.addEventListener('keydown', function(event) { //pega o evento de precionar uma tecla
	  if(event.keyCode != 46 && event.keyCode != 8){//verifica se a tecla precionada nao e um backspace e delete
		var i = document.getElementById("fone_fixo").value.length; //aqui pega o tamanho do input
		if (i === 0)
		  document.getElementById("fone_fixo").value = document.getElementById("fone_fixo").value + "(";
		if (i === 3)
		  document.getElementById("fone_fixo").value = document.getElementById("fone_fixo").value + ")";
		if (i === 8) //aqui faz a divisoes colocando um ponto no terceiro e setimo indice
		  document.getElementById("fone_fixo").value = document.getElementById("fone_fixo").value + "-";
	  }
	});
	
  </script>
  <script> 
		$(document).on("keydown", "#atribuicao", function () {
			var caracteresRestantes = 300;
			var caracteresDigitados = parseInt($(this).val().length);
			var caracteresRestantes = caracteresRestantes - caracteresDigitados;

			$(".caracteres").text(caracteresRestantes);
		});
		$(document).on("keydown", "#atribuicao2", function () {
			var caracteresRestantes = 300;
			var caracteresDigitados = parseInt($(this).val().length);
			var caracteresRestantes = caracteresRestantes - caracteresDigitados;

			$(".caracteres").text(caracteresRestantes);
		});
		$(document).on("keydown", "#atribuicao3", function () {
			var caracteresRestantes = 300;
			var caracteresDigitados = parseInt($(this).val().length);
			var caracteresRestantes = caracteresRestantes - caracteresDigitados;

			$(".caracteres").text(caracteresRestantes);
		});
		function habilitaDeficiencia(valor) {

			var x = document.getElementById('deficiencia_status').value; 
			if(x == "sim") {
				document.getElementById('deficiencia').disabled = false;  
				document.getElementById('cid').disabled = false;
				document.getElementById('arquivo_deficiencia').disabled = false;
			} else if(x == "nao") {
				document.getElementById('deficiencia').disabled = true;
				document.getElementById('cid').disabled = true;
				document.getElementById('arquivo_deficiencia').disabled = true;
			}
		}

		function desabilitar6(valor) {
			var x = document.getElementById('val6').checked;
			if(x == true){
				document.getElementById('empresa').disabled  	  = false;
				document.getElementById('cargo').disabled 		  = false;
				document.getElementById('data_inicio').disabled   = false;
				document.getElementById('data_fim').disabled 	  = false;
				document.getElementById('atribuicao').disabled    = false;
				document.getElementById('arquivo_ctps1').disabled = false;
			} else {
				document.getElementById('empresa').disabled  	  = true;
				document.getElementById('cargo').disabled 		  = true;
				document.getElementById('data_inicio').disabled   = true;
				document.getElementById('data_fim').disabled 	  = true;
				document.getElementById('atribuicao').disabled    = true;
				document.getElementById('arquivo_ctps1').disabled = true;
			}
		}

		function desabilitar7(valor) {
			var x = document.getElementById('val7').checked;
			if(x == true){
				document.getElementById('empresa2').disabled  	  = false;
				document.getElementById('cargo2').disabled 		  = false;
				document.getElementById('data_inicio2').disabled  = false;
				document.getElementById('data_fim2').disabled 	  = false;
				document.getElementById('atribuicao2').disabled   = false;
				document.getElementById('arquivo_ctps2').disabled = false;
			} else {
				document.getElementById('empresa2').disabled  	  = true;
				document.getElementById('cargo2').disabled 		  = true;
				document.getElementById('data_inicio2').disabled  = true;
				document.getElementById('data_fim2').disabled 	  = true;
				document.getElementById('atribuicao2').disabled   = true;
				document.getElementById('arquivo_ctps2').disabled = true;
			}
		}

		function desabilitar8(valor) {
			var x = document.getElementById('val8').checked;
			if(x == true){
				document.getElementById('empresa3').disabled  	  = false;
				document.getElementById('cargo3').disabled 		  = false;
				document.getElementById('data_inicio3').disabled  = false;
				document.getElementById('data_fim3').disabled 	  = false;
				document.getElementById('atribuicao3').disabled   = false;
				document.getElementById('arquivo_ctps3').disabled = false;
			} else {
				document.getElementById('empresa3').disabled  	  = true;
				document.getElementById('cargo3').disabled 		  = true;
				document.getElementById('data_inicio3').disabled  = true;
				document.getElementById('data_fim3').disabled 	  = true;
				document.getElementById('atribuicao3').disabled   = true;
				document.getElementById('arquivo_ctps3').disabled = true;
			}
		}
	 </script>
</head>
    <body>
	  <div class="container">
	   <div id="reflexo"> 
	    <div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
			 <section  class="sppb-section " style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			    <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" id='titulo'> <br> <br>
					  	<table  class="table table-borderless" align="center" id="tabelatitulo"  style="margin-bottom: 15px;">
						    <tr>
								<td>
								 <div style= "text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-45px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
									<div class="container">
										<h5 class="display-8"><p style="align: center"> <b>INSCRI????O <br> PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <img id="hcp" width="120px;" style="margin-top: -30px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
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
			  <br><br>
			  <table class="table table-borderless" border="0" width="500" id="inicio">
				<tr>
				<td align="center"><strong> Ol??! Seja bem vindo ao processo seletivo simplificado {{ $processos[0]->nome }}. </strong></td>
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
			  <br><Br>
			  <table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor="DCDCDC">
			  <form method="POST" action="{{ route('validarCandidato', array($unidade->id, $processos[0]->id)) }}" enctype="multipart/form-data">
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>DADOS PESSOAIS:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 980px; background-color: white;">
					  <table>
						<tr>
						 <td><b>NOME COMPLETO: (*campo obrigat??rio)</b>
						  <input class="form-control" placeholder="NOME COMPLETO"  type="text" id="nome" name="nome" value="{{ old('nome') }}" required maxlength="150" />
						 </td>
						 <td style="width: 400px;"><b>E-MAIL: (*campo obrigat??rio)</b>
						  <input id="email" style="width: 250px;" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-MAIL" maxlength="255">
						 </td>
						 <td style="width: 400px;"><b>CPF: (*campo obrigat??rio)</b>
						  <input id="cpf" style="width: 250px;" type="text" maxlength="11" class="form-control" name="cpf" max="11" value="{{ old('cpf') }}" required placeholder="APENAS N??MEROS" autocomplete="cpf" autofocus /> 
						 </td>
						</tr>
						<tr>
						 <td>  Selecione a <b>VAGA: (*campo obrigat??rio)</b>
							<select class="form-control" id="vaga" name="vaga" style="width: 400px" required>
							<option id="vaga" name="vaga" value="">Selecione...</option>
							@if(!empty($vagas))
								@foreach($vagas as $vaga)
								 @if(old('vaga') == $vaga->nome))  
								  <option id="vaga" name="vaga" value="<?php echo $vaga->nome ?>" selected>{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @else
								  <option id="vaga" name="vaga" value="<?php echo $vaga->nome ?>">{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @endif 
								@endforeach
							@endif
							</select>
						 </td>
						 <td> <b>CELULAR: (*campo obrigat??rio)</b>
						 <input class="form-control" style="200px;" placeholder="Ex: (81)98888-3333" type="text" maxlength="14" id="telefone" name="telefone" value="{{ old('telefone') }}" required />
						 </td>
						 <td> TELEFONE FIXO:
						 <input class="form-control" style="200px;" placeholder="Ex: (81)2222-3333" type="text" id="fone_fixo" maxlength="13" name="fone_fixo" value="{{ old('fone_fixo') }}" />
						 </td>
						</tr>
					  </table>
					</div>
				   </div>
				</table>
				<br><br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor="DCDCDC">
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>NATURALIDADE:</b></h5></center>
				   	 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>    	
					   <tr>
						<td> <b>CIDADE: (*campo obrigat??rio)</b>
						 <input class="form-control" style="width:400px" placeholder="CIDADE" type="text" id="lugar_nascimento" name="lugar_nascimento" value="{{ old('lugar_nascimento') }}" required maxlength="100" />
						</td>
						<td> <b>ESTADO: (*campo obrigat??rio)</b>
							<select class="form-control" id="estado_nascimento" name="estado_nascimento" style="width:400px" required>
							 <option id="estado_nascimento" name="estado_nascimento" value="">Selecione...</option>	
							 @foreach($estados as $estado)
							  @if($estado->nome == old('estado_nascimento'))
							    <option id="estado_nascimento" name="estado_nascimento" value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
							  @else
							    <option id="estado_nascimento" name="estado_nascimento" value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
							  @endif
							 @endforeach
							</select>
						</td>
						</tr>
						<tr>
						<td> <b>PA??S: (*campo obrigat??rio)</b>
						   <input class="form-control" placeholder="PA??S" type="text" id="cidade_nascimento" name="cidade_nascimento" value="{{ old('cidade_nascimento') }}" required maxlength="50" />
						</td>
						<td> <b>DATA DE NASCIMENTO: (*campo obrigat??rio)</b>
						    <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required />
						</td>
				 	  </tr>
					</table>
				  </div>
				 </div>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			    <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title" id="exampleModalLongTitle"><b>ENDERE??O:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
						<tr>
							<td> <b> CEP: (*campo obrigat??rio)</b>
							  <input style="width: 300px;" class="form-control" placeholder="CEP" type="text" id="cep" name="cep" value="{{ old('cep') }}" required maxlength="30" />
							</td>
							<td> <b> RUA: (*campo obrigat??rio)</b>  
							  <input style="width:300px;" class="form-control" placeholder="RUA" type="text" id="rua" name="rua" value="{{ old('rua') }}" required maxlength="100" />
							</td>
							<td> <b> N??MERO: (*campo obrigat??rio)</b>
							  <input style="width:300px;" class="form-control" placeholder="N??MERO" type="text" id="numero" name="numero" value="{{ old('numero') }}" required maxlength="10" />
							</td>
						</tr>
						<tr>
							<td> <b> BAIRRO: (*campo obrigat??rio)</b>
							  <input style="width:300px;" class="form-control" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="{{ old('bairro') }}" required maxlength="100" />
							</td>
							<td> <b> CIDADE: (*campo obrigat??rio)</b>
							  <input style="width:300px;" class="form-control" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="{{ old('cidade') }}" required maxlength="100" />
							</td>
							<td> <b> ESTADO: (*campo obrigat??rio)</b>
								<select class="form-control" id="estado" name="estado" style="width:300px" required>
								 <option id="estado" name="estado" value="">Selecione...</option>
								 @foreach($estados as $estado)
								  @if($estado->nome == old('estado'))
							       <option id="estado" name="estado" value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
								  @else
								   <option id="estado" name="estado" value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
								  @endif
								 @endforeach
							    </select>
							</td>
						</tr>
						<tr>
							<td colspan="2"> COMPLEMENTO:
							  <input style="width:400px;" class="form-control" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" value="{{ old('complemento') }}" maxlength="200" />
							</td>				
						</tr>
					</table>
				   </div>
				  </div>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>ESCOLARIDADE:</b></h5></center>	
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
				       <tr style="width:50px;">
						<td> <b>ESCOLARIDADE: (*campo obrigat??rio)</b>
						  <select style="width:450px;" id="escolaridade" name="escolaridade" class="form-control">
						 	@if(old('escolaridade') == "Ensino Medio Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo" selected>Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Superior Incompleto")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto" selected>Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Superior Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo" selected>Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Mestrado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo" selected>Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Doutorado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo" selected>Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Pos graduacao")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao" selected>P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@elseif(old('escolaridade') == "Residencia")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia" selected>Resid??ncia</option> 
							@else
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino M??dio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">P??s-gradua????o</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Resid??ncia</option> 
							@endif
						 </select>
						</td>
						<td> <b>STATUS DA ESCOLARIDADE: (*campo obrigat??rio)</b>
						  <select id="status_escolaridade" style="width:450px;" name="status_escolaridade" class="form-control">
							@if(old('status_escolaridade') == "Em Andamento")
						 	<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento" selected>Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Conclu??do</option>
							@elseif(old('status_escolaridade') == "Trancado")
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado" selected>Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Conclu??do</option>
							@elseif(old('status_escolaridade') == "Concluido")
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido" selected>Conclu??do</option>
							@else
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Conclu??do</option>
							@endif
						 </select>
						</td>
					   </tr>	
					   <tr>
						<td> <b>FORMA????O EM QUAL CURSO? (*campo obrigat??rio)</b>
						  <textarea class="form-control" style="width:450px;" placeholder="Forma????o em qual curso?" type="text" id="formacao" name="formacao" value="{{ old('formacao') }}" maxlength="150" required>{{ old('formacao') }}</textarea>
						</td>
						<td> <b>QUAIS CURSOS REALIZOU? (*campo obrigat??rio)</b>
						  <textarea class="form-control" style="width:450px;" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="{{ old('cursos') }}" maxlength="500" required>{{ old('cursos') }}</textarea>
						</td>
					   </tr>
					</table>
				   </div>
				  </div>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title"id="exampleModalLongTitle">PCD:</h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
					   <tr>
						<td colspan="2"> 
							Voc?? quer se candidatar para a vaga como Pessoa com Defici??ncia? 
							<select id="deficiencia_status" name="deficiencia_status" class="form-control" style="width: 100px;" onchange="habilitaDeficiencia('sim')">
							 <option id="deficiencia_status" name="deficiencia_status" value="nao" selected>N??O</option>
							 <option id="deficiencia_status" name="deficiencia_status" value="sim">SIM</option>  
							</select>
						</td>
					   </tr>
				       <tr>
					    <td>ESPECIFIQUE SUA DEFICI??NCIA:
						    <select disabled id="deficiencia" name="deficiencia" class="form-control" style="width: 400px;">
						      <option id="deficiencia" name="deficiencia" value="">Selecione..</option>
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">F??sica</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
						    </select>
						</td>
						<td colspan="2"> CID CORRESPONDENTE:
							<input disabled style="width:400px;" class="form-control" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="{{ old('cid') }}" maxlength="255" />
						</td>	
					   </tr>
					   <tr>
						<td>
						 <p align="justify">Envie o laudo PCD para complementar o seu cadastro no HCP GEST??O</p>
						 <p align="justify">O Laudo PCD ?? importante para garantir que processos seletivos destinados a pessoas com defici??ncia sejam justos e que deles participem apenas pessoas que tenham alguma defici??ncia. Desta forma, o HCP Gest??o ter?? como identificar rapidamente aplica????es inadequadas, tornando o processo de sele????o mais ??gil e justo. 
						 Como o envio do laudo m??dico n??o ?? obrigat??rio, voc?? n??o ser?? automaticamente desclassificado do processo seletivo. No entanto, esse controle ser?? exclusivo do HCP GEST??O que poder?? utilizar esse documento para evitar fraudes. O laudo ser?? coletado e armazenado com base no seu consentimento. Este documento ser?? compartilhado apenas 
						 para o processo seletivo em quest??o conforme nossa Pol??tica de Privacidade.</p>
						 ANEXE O LAUDO M??DICO
						 <input disabled style="width:450px;" class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" maxlength="600"> 
					 	 <br><p><b>Esse documento pode ser nos formatos: PNG, JPG, JPEG, DOC, DOCX ou PDF.</b></p>
						</td>
					   </tr>
					  </table>
					 </div>
					</div>
				  </td>
				 </tr>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title"id="exampleModalLongTitle">EXPERI??NCIAS: </h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
					   	<tr>
						  <td colspan="3" align="left"><strong><center> EXPERI??NCIA 01: </center></strong>
						    @if(old('val6') == "on")
						      <p align="right"><input type="checkbox" checked onclick="desabilitar6('sim')" id="val6" name="val6" /> Habilitar campos</p></td>
					        @else
						      <p align="right"><input type="checkbox" onclick="desabilitar6('sim')" id="val6" name="val6" /> Habilitar campos</p></td>
						    @endif
						</tr>
						<tr>
						  <td> EMPRESA:
							@if(old('val6') == "on")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						    @if(old('val6') == "on")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>				
						<tr>
						  <td> DATA IN??CIO:
						    @if(old('val6') == "on")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						    @if(old('val6') == "on")
							  <input style="width:400px;" class="form-control" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" required />
							@endif  
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUI????ES:
						    @if(old('val6') == "on")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required></textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required></textarea>
							@endif
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
		  				  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						    @if(old('val6') == "on")
							  <input class="form-control" type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600" > 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="2">
							<center><strong>ATEN????O - O preenchimento das datas ?? obrigat??rio caso possua experi??ncia.</strong></center>
						  </td>
						</tr>
						<tr>
						  <td colspan="3" align="left"><strong><center> EXPERI??NCIA 02: </center></strong>
						    @if(old('val7') == "on")
							  <p align="right"><input type="checkbox" checked onclick="desabilitar7('sim')" id="val7" name="val7" /> Habilitar campos</p></td>
							@else
							  <p align="right"><input type="checkbox" onclick="desabilitar7('sim')" id="val7" name="val7" /> Habilitar campos</p></td>
							@endif
						</tr>
						<tr>
						  <td> EMPRESA:
						    @if(old('val7') == "on")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						    @if(old('val7') == "on")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>
						<tr>
						  <td> DATA IN??CIO:
						    @if(old('val7') == "on")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						    @if(old('val7') == "on")
							  <input style="width: 400px;" class="form-control" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" required />
							@endif							
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUI????ES:
						    @if(old('val7') == "on")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required></textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required></textarea>
							@endif
							Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						    @if(old('val7') == "on")
							  <input class="form-control" type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="2"><center><strong>ATEN????O - O preenchimento das datas ?? obrigat??rio caso possua experi??ncia.</center></strong></td>
						</tr>
						<tr>
						  <td colspan="2" align="left"><strong><center> EXPERI??NCIA 03: </center></strong>
						    @if(old('val8') == "on")
							  <p align="right"><input type="checkbox" checked onclick="desabilitar8('sim')" id="val8" name="val8" /> Habilitar campos</p></td>
							@else
							  <p align="right"><input type="checkbox" onclick="desabilitar8('sim')" id="val8" name="val8" /> Habilitar campos</p></td>
							@endif
						</tr>
						<tr>
						  <td> EMPRESA:
						    @if(old('val8') == "on")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						    @if(old('val8') == "on")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>
						<tr>
						   <td> DATA IN??CIO:
						    @if(old('val8') == "on")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						    @if(old('val8') == "on")
							  <input style="width: 400px;" class="form-control" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" required />
							@endif
						  </td>
						</tr>
						<tr>					
						<tr>
						  <td> SUAS ATRIBUI????ES:
						    @if(old('val8') == "on")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required></textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUI????ES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required></textarea>
							@endif
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						    @if(old('val8') == "on")
							  <input class="form-control" type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="4"><center><strong>ATEN????O - O preenchimento das datas ?? obrigat??rio caso possua experi??ncia.</center></strong></td>
						</tr>
					 </table>			
				   </div>
				  </div>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title" id="exampleModalLongTitle"><b>CURR??CULO:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
						<tr>
						 <td><strong> Os arquivos permitidos s??o: .doc, .docx e .pdf </strong></td>
						</tr>
						<tr>
						 <td> <b>(*campo obrigat??rio)</b>
						  <input class="form-control" type="file" id="arquivo" name="arquivo" required style="width:500px" maxlength="200" />
						 </td>	
						</tr>
					  </table>
					 </div>
					</div>
				</table>
				<br>
				<table style= "margin-top:-50px; margin-left:40px; width:1000px;" class="table table-borderless" border="0" bordercolor=DCDCDC>
			     <tr>
				  <td>
					<div class="modal-content" style="width: 1000px;">
					 <div class="modal-header">
						<center><h5 class="modal-title" id="exampleModalLongTitle"><b>DISPONIBILIDADE:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table border="0" style="width:950px;">
						<tr>
						 <td> POSSUI HABILITA????O:
						  @if(old('val9') == "on")
						  <select style="width:300px;" disabled class="form-control" id="habilitacao" name="habilitacao">
						   <option id="habilitacao" name="habilitacao" value="nao">N??o</option>
						   <option id="habilitacao" name="habilitacao" value="sim">Sim</option>
						  </select>						  
						  @else
						  <select style="width:300px;" class="form-control" id="habilitacao" name="habilitacao">
						   <option id="habilitacao" name="habilitacao" value="nao">N??o</option>
						   <option id="habilitacao" name="habilitacao" value="sim">Sim</option>
						  </select>
						  @endif
						 </td>
						 </tr>
						<tr>
						 <td> DISPONIBILIDADE PARA QUAL PER??ODO:
						  @if(old('val9') == "on")
						  <select style="width:300px;" disabled class="form-control" id="periodo" name="periodo">
						   <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para per??odo integral</option>
						   <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para per??odo noturno</option>
						   <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para meio per??odo</option>
						  </select>						  
						  @else
						  <select style="width:300px;" class="form-control" id="periodo" name="periodo">
						   <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para per??odo integral</option>
						   <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para per??odo noturno</option>
						   <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para meio per??odo</option>
						  </select>
						  @endif
					 	 </td> 
						</tr>
						<tr>
						 <td> DISPONIBILIDADE PARA MUDAR DE CIDADE:
						   @if(old('val9') == "on")
						   <select style="width:300px;" disabled class="form-control" id="outra_cidade" name="outra_cidade">
						    <option id="outra_cidade" name="outra_cidade" value="nao">N??o</option>
						    <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
						   </select>					  
						   @else
						   <select style="width:300px;" class="form-control" id="outra_cidade" name="outra_cidade">
						    <option id="outra_cidade" name="outra_cidade" value="nao">N??o</option>
						    <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
						   </select>
						   @endif
						 </td>
						</tr>
						<tr>	
						 <td> COMO SOUBE DA VAGA? </td>
						 <td>
						   @if(old('val9') == "on")
						   <select style= "width:200px;" disabled class="form-control" id="como_soube" name="como_soube"> 
						    <option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gest??o </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indica????o </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>
						   </select>					  
						   @else
						   <select style= "width:200px;" onchange="comoSoube()" class="form-control" id="como_soube" name="como_soube"> 
							<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gest??o </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indica????o </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
						   </select>
						   @endif
						 </td> 
						 <td> 
						   <input style= "width:200px;" type="text" id="como_soube2" name="como_soube2" class="form-control" maxlength="255" disabled required/> 
						 </td>
						</tr>
						<tr>
						<td>
						POSSUI PARENTESCO COM COLABORADOR DO HCP GEST??O? </td>
						<td>
						    @if(old('val9') == "on")
						    <select style= "width:200px;" disabled class="form-control" id="parentesco" name="parentesco">  
							 <option id="parentesco" name="parentesco" value="nao"> N??o </option>  
							 <option id="parentesco" name="parentesco" value="sim"> Sim </option>  
						    </select>					  
						    @else
						    <select style= "width:200px;" onchange="familiar()" class="form-control" id="parentesco" name="parentesco"> 
							 <option id="parentesco" name="parentesco" value="nao"> N??o </option>  
							 <option id="parentesco" name="parentesco" value="sim"> Sim </option>  
							</select>	
							@endif
							<td> <input style= "width:200px;" type="text" id="parentesco_nome" name="parentesco_nome" class="form-control" maxlength="255" disabled required/> </td>
						</td>
						</tr>
						<tr> <br>
						 <td colspan="3" align="right">
							<input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /> </p>
						 </td>
						</tr>
					</table>
				   </div>
				  </div>
				</table>
				<input hidden type="text" id="candidato_id" name="candidato_id" value="" />
				<input hidden type="text" id="processo_seletivo_id" name="processo_seletivo_id" value="" />
				<input hidden type="text" id="data_inscricao" name="data_inscricao" value="" />
			</table>
			</form> 
		  </div>
		</div>
	  </div>
	 </div>
	 
	 <script type="text/javascript">
	 $("#cep").focusout(function(){
		//In??cio do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde vir?? os dados
			//?? importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui voc?? deve preencher o tipo de dados que ser?? lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS ?? referente a fun????o que ser?? executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O par??metro dentro da fun????o se refere ao nome da vari??vel
			//que voc?? vai dar para ler esse objeto.
			success: function(resposta){
				$("#rua").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#estado").val(resposta.uf);
				$("#numero").focus();
			}
		});
	 });


function habilitar(){
	if(document.getElementById('check').checked){
		document.getElementById('data_fim').disabled = true;
	} else {
		document.getElementById('data_fim').disabled = false;
	}
}

function comoSoube(){
	var optionSelect = document.getElementById("como_soube").value;
	if(optionSelect == "outros"){
		document.getElementById("como_soube2").disabled = false;
	} else {
		document.getElementById("como_soube2").disabled = true;
	}
}
		
function familiar(){
	var parente = document.getElementById("parentesco").value;
	if(parente == "sim"){
		document.getElementById("parentesco_nome").disabled = false;
	}else{
		document.getElementById("parentesco_nome").disabled = true;
	}
}
</script>
	 
</body>

</html>