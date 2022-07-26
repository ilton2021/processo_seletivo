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
										<h5 class="display-8"><p style="align: center"> <b>INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <img id="hcp" width="120px;" style="margin-top: -30px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
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
				<td align="center"><strong> ALTERAR SEUS DADOS  </strong></td>
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
			  <br><Br>
			  <table style= "margin-top:-50px; margin-left:40px; width:800px;" class="table table-borderless" border="0" bordercolor="DCDCDC">
			  <form method="POST" action="{{ route('updateAreaCandidatoAlterar', $processos[0]->id) }}" enctype="multipart/form-data">
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
						 <td><b>NOME COMPLETO: (*campo obrigatório)</b>
						  <input class="form-control" placeholder="NOME COMPLETO"  type="text" id="nome" name="nome" value="<?php echo $user[0]->nome; ?>" required maxlength="150" />
						 </td>
						 <td style="width: 400px;"><b>E-MAIL: (*campo obrigatório)</b>
						  <input id="email" style="width: 250px;" type="email" class="form-control" name="email" value="<?php echo $user[0]->email; ?>" required placeholder="E-MAIL" maxlength="255">
						 </td>
						 <td style="width: 400px;"><b>CPF: (*campo obrigatório)</b>
						  <input id="cpf" style="width: 250px;" type="text" maxlength="11" class="form-control" name="cpf" max="11" value="<?php echo $user[0]->cpf; ?>" required placeholder="APENAS NÚMEROS" autocomplete="cpf" autofocus /> 
						 </td>
						</tr>
						<tr>
						 <td>  Selecione a <b>VAGA: (*campo obrigatório)</b>
							<select class="form-control" id="vaga" name="vaga" style="width: 400px" required>
							 <option id="vaga" name="vaga" value="">Selecione...</option>
							 @if(!empty($vagas))
								@foreach($vagas as $vaga)
								 @if($user[0]->vaga == $vaga->nome))  
								  <option id="vaga" name="vaga" value="<?php echo $vaga->nome ?>" selected>{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @else
								  <option id="vaga" name="vaga" value="<?php echo $vaga->nome ?>">{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @endif 
								@endforeach
							 @endif
							</select>
						 </td>
						 <td> <b>CELULAR: (*campo obrigatório)</b>
						 <input class="form-control" style="200px;" placeholder="Ex: (81)98888-3333" type="text" maxlength="14" id="telefone" name="telefone" value="<?php echo $user[0]->telefone; ?>" required />
						 </td>
						 <td> TELEFONE FIXO:
						 <input class="form-control" style="200px;" placeholder="Ex: (81)2222-3333" type="text" id="fone_fixo" maxlength="13" name="fone_fixo" value="<?php echo $user[0]->telefone_fixo; ?>" />
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
						<td> <b>CIDADE: (*campo obrigatório)</b>
						 <input class="form-control" style="width:400px" placeholder="CIDADE" type="text" id="lugar_nascimento" name="lugar_nascimento" value="<?php echo $user[0]->lugar_nascimento; ?>" required maxlength="100" />
						</td>
						<td> <b>ESTADO: (*campo obrigatório)</b>
							<select class="form-control" id="estado_nascimento" name="estado_nascimento" style="width:400px" required>
								@foreach($estados as $estado)
								  @if($estado->nome == $user[0]->estado_nascimento)
							       <option id="estado_nasc" name="estado_nasc" value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
								  @else
								   <option id="estado_nasc" name="estado_nasc" value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
								  @endif
								@endforeach
							</select>
						</td>
						</tr>
						<tr>
						<td> <b>PAÍS: (*campo obrigatório)</b>
						   <input class="form-control" placeholder="PAÍS" type="text" id="cidade_nascimento" name="cidade_nascimento" value="<?php echo $user[0]->cidade_nascimento; ?>" required maxlength="50" />
						</td>
						<td> <b>DATA DE NASCIMENTO: (*campo obrigatório)</b>
						    <input class="form-control" type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $user[0]->data_nascimento; ?>" required />
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
						<center><h5 class="modal-title" id="exampleModalLongTitle"><b>ENDEREÇO:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
						<tr>
							<td> <b> CEP: (*campo obrigatório)</b>
							  <input style="width: 300px;" class="form-control" placeholder="CEP" type="text" id="cep" name="cep" value="<?php echo $user[0]->cep; ?>" required maxlength="30" />
							</td>
							<td> <b> RUA: (*campo obrigatório)</b>  
							  <input style="width:300px;" class="form-control" placeholder="RUA" type="text" id="rua" name="rua" value="<?php echo $user[0]->rua; ?>" required maxlength="100" />
							</td>
							<td> <b> NÚMERO: (*campo obrigatório)</b>
							  <input style="width:300px;" class="form-control" placeholder="NÚMERO" type="text" id="numero" name="numero" value="<?php echo $user[0]->numero; ?>" required maxlength="10" />
							</td>
						</tr>
						<tr>
							<td> <b> BAIRRO: (*campo obrigatório)</b>
							  <input style="width:300px;" class="form-control" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="<?php echo $user[0]->bairro; ?>" required maxlength="100" />
							</td>
							<td> <b> CIDADE: (*campo obrigatório)</b>
							  <input style="width:300px;" class="form-control" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="<?php echo $user[0]->cidade; ?>" required maxlength="100" />
							</td>
							<td> <b> ESTADO: (*campo obrigatório)</b>
							   <select class="form-control" id="estado" name="estado" style="width:300px" required>
								@foreach($estados as $estado)
								  @if($estado->nome == $user[0]->estado)
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
							  <input style="width:400px;" class="form-control" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" value="<?php echo $user[0]->complemento; ?>" maxlength="200" />
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
						<td> <b>ESCOLARIDADE: (*campo obrigatório)</b>
						  <select style="width:450px;" id="escolaridade" name="escolaridade" class="form-control">
						 	@if($user[0]->escolaridade == "Ensino Medio Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo" selected>Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Superior Incompleto")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto" selected>Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Superior Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo" selected>Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Mestrado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo" selected>Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Doutorado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo" selected>Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Pos graduacao")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao" selected>Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif($user[0]->escolaridade == "Residencia")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia" selected>Residência</option> 
							@else
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@endif
						 </select>
						</td>
						<td> <b>STATUS DA ESCOLARIDADE: (*campo obrigatório)</b>
						  <select id="status_escolaridade" style="width:450px;" name="status_escolaridade" class="form-control">
							@if($user[0]->status_escolaridade == "Em Andamento")
						 	<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento" selected>Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
							@elseif($user[0]->status_escolaridade == "Trancado")
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado" selected>Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
							@elseif($user[0]->status_escolaridade == "Concluido")
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido" selected>Concluído</option>
							@else
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
							@endif
						 </select>
						</td>
					   </tr>	
					   <tr>
						<td> <b>FORMAÇÃO EM QUAL CURSO? (*campo obrigatório)</b>
						  <textarea class="form-control" style="width:450px;" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="<?php echo $user[0]->formacao; ?>" maxlength="150" required>{{ $user[0]->formacao }}</textarea>
						</td>
						<td> <b>QUAIS CURSOS REALIZOU? (*campo obrigatório)</b>
						  <textarea class="form-control" style="width:450px;" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="<?php echo $user[0]->cursos; ?>" maxlength="500" required>{{ $user[0]->cursos }}</textarea>
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
						<center><h5 class="modal-title" id="exampleModalLongTitle">PCD:</h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
					   <tr>
						<td colspan="2"> 
							Você quer se candidatar para a vaga como Pessoa com Deficiência? 
							<select id="deficiencia_status" name="deficiencia_status" class="form-control" style="width: 100px;" onchange="habilitaDeficiencia('sim')">
							 @if($user[0]->deficiencia == "0")
							  <option id="deficiencia_status" name="deficiencia_status" value="nao" selected>NÃO</option> 
							  <option id="deficiencia_status" name="deficiencia_status" value="sim">SIM</option>  
							 @else
							  <option id="deficiencia_status" name="deficiencia_status" value="nao">NÃO</option> 
							  <option id="deficiencia_status" name="deficiencia_status" value="sim" selected>SIM</option>  
							 @endif
						    </select>
						</td>
					   </tr>
				       <tr>
					    <td>ESPECIFIQUE SUA DEFICIÊNCIA:
							@if($user[0]->deficiencia == "0")
						    <select disabled id="deficiencia" name="deficiencia" class="form-control" style="width: 400px;">
							@else
							<select id="deficiencia" name="deficiencia" class="form-control" style="width: 400px;">
							@endif
						      @if($user[0]->deficiencia == "Auditiva")
						      <option id="deficiencia" name="deficiencia" value="Auditiva" selected>Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Fisica")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica" selected>Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Intelectual")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual" selected>Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Mental")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental" selected>Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Autista")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista" selected>Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Visual")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual" selected>Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @elseif($user[0]->deficiencia == "Outros")
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros" selected>Outros</option>
							  @else
							  <option id="deficiencia" name="deficiencia" value="">Selecione...</option>
						      <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							  <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							  <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							  <option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							  <option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							  <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							  <option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
							  @endif
						    </select>
						</td>
						<td colspan="2"> CID CORRESPONDENTE:
						    @if($user[0]->deficiencia == "0")
						    <input disabled style="width:400px;" class="form-control" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="<?php echo $user[0]->cid; ?>" maxlength="255" />
							@else
							<input style="width:400px;" class="form-control" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="<?php echo $user[0]->cid; ?>" maxlength="255" />
							@endif
						</td>	
					   </tr>
					   <tr>
						<td>
						 <p align="justify">Envie o laudo PCD para complementar o seu cadastro no HCP GESTÃO</p>
						 <p align="justify">O Laudo PCD é importante para garantir que processos seletivos destinados a pessoas com deficiência sejam justos e que deles participem apenas pessoas que tenham alguma deficiência. Desta forma, o HCP Gestão terá como identificar rapidamente aplicações inadequadas, tornando o processo de seleção mais ágil e justo. Como o envio do laudo médico não é obrigatório, você não será automaticamente desclassificado do processo seletivo. No entanto, esse controle será exclusivo do HCP GESTÃO que poderá utilizar esse documento para evitar fraudes. O laudo será coletado e armazenado com base no seu consentimento. Este documento será compartilhado apenas para o processo seletivo em questão conforme nossa Política de Privacidade.</p>
						   ANEXE O LAUDO MÉDICO
						   @if($user[0]->deficiencia == "")
						   <input disabled style="width:450px;" class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" value="" maxlength="600"> 
						   <input disabled style="width:450px;" class="form-control" type="text" id="arquivo_deficiencia_" name="arquivo_deficiencia_" value="<?php echo $user[0]->nomearquivo; ?>" maxlength="600"> 
						   @else
						   <input style="width:450px;" class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" value="" maxlength="600"> 
						   <input disabled style="width:450px;" class="form-control" type="text" id="arquivo_deficiencia_" name="arquivo_deficiencia_" value="<?php echo $user[0]->nomearquivo; ?>" maxlength="600"> 
						   @endif
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
						<center><h5 class="modal-title"id="exampleModalLongTitle">EXPERIÊNCIAS: </h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
					   	<tr>
						  <td colspan="3" align="left"><strong><center> EXPERIÊNCIA 01: </center></strong>
						    @if($user[0]->exp_01_empresa != "")
						      <p align="right"><input type="checkbox" checked onclick="desabilitar6('sim')" id="val6" name="val6" /> Habilitar campos</p></td>
					        @else
						      <p align="right"><input type="checkbox" onclick="desabilitar6('sim')" id="val6" name="val6" /> Habilitar campos</p></td>
						    @endif
						</tr>
						<tr>
						  <td> EMPRESA:
						  	@if($user[0]->exp_01_empresa != "")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="<?php echo $user[0]->exp_01_empresa; ?>" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						    @if($user[0]->exp_01_empresa != "")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo" name="cargo" value="<?php echo $user[0]->exp_01_cargo; ?>" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>				
						<tr>
						  <td> DATA INÍCIO:
						  	@if($user[0]->exp_01_empresa != "")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio" name="data_inicio" value="<?php echo $user[0]->exp_01_data_ini; ?>" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						  	@if($user[0]->exp_01_empresa != "")
							  <input style="width:400px;" class="form-control" type="date" id="data_fim" name="data_fim" value="<?php echo $user[0]->exp_01_data_fim; ?>" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" required />
							@endif  
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
						  	@if($user[0]->exp_01_empresa != "")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="<?php echo $user[0]->exp_01_atribuicoes; ?>" maxlength="300" required>{{ $user[0]->exp_01_atribuicoes }}</textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required></textarea>
							@endif
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
		  				  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						  	@if($user[0]->exp_01_empresa != "")
							  <input class="form-control" type="file" id="arquivo_ctps1" name="arquivo_ctps1" maxlength="600"> 
							  <input class="form-control" type="text" id="arquivo_ctps1_" name="arquivo_ctps1_" value="<?php echo $user[0]->arquivo_ctps1 ; ?>" maxlength="600" readonly> 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="2">
							<center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></center>
						  </td>
						</tr>
						<tr>
						  <td colspan="3" align="left"><strong><center> EXPERIÊNCIA 02: </center></strong>
						 	@if($user[0]->exp_02_empresa != "")
							  <p align="right"><input type="checkbox" checked onclick="desabilitar7('sim')" id="val7" name="val7" /> Habilitar campos</p></td>
							@else
							  <p align="right"><input type="checkbox" onclick="desabilitar7('sim')" id="val7" name="val7" /> Habilitar campos</p></td>
							@endif
						</tr>
						<tr>
						  <td> EMPRESA:
						  	@if($user[0]->exp_02_empresa != "")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="<?php echo $user[0]->exp_02_empresa; ?>" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						  	@if($user[0]->exp_02_empresa != "")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="<?php echo $user[0]->exp_02_cargo; ?>" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>
						<tr>
						  <td> DATA INÍCIO:
						  	@if($user[0]->exp_02_empresa != "")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="<?php echo $user[0]->exp_02_data_ini; ?>" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						  	@if($user[0]->exp_02_empresa != "")
							  <input style="width: 400px;" class="form-control" type="date" id="data_fim2" name="data_fim2" value="<?php echo $user[0]->exp_02_data_fim; ?>" maxlength="15" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" required />
							@endif							
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
						 	@if($user[0]->exp_02_empresa != "")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="<?php echo $user[0]->exp_02_atribuicoes; ?>" maxlength="300" required>{{ $user[0]->exp_02_atribuicoes }}</textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required></textarea>
							@endif
							Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						  	@if($user[0]->exp_02_empresa != "")
							  <input class="form-control" type="file" id="arquivo_ctps2" name="arquivo_ctps2" maxlength="600"> 
							  <input class="form-control" type="text" id="arquivo_ctps2_" name="arquivo_ctps2_" value="<?php echo $user[0]->arquivo_ctps2; ?>" maxlength="600" readonly> 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="2"><center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</center></strong></td>
						</tr>
						<tr>
						  <td colspan="2" align="left"><strong><center> EXPERIÊNCIA 03: </center></strong>
						  	@if($user[0]->exp_03_empresa != "")
							  <p align="right"><input type="checkbox" checked onclick="desabilitar8('sim')" id="val8" name="val8" /> Habilitar campos</p></td>
							@else
							  <p align="right"><input type="checkbox" onclick="desabilitar8('sim')" id="val8" name="val8" /> Habilitar campos</p></td>
							@endif
						</tr>
						<tr>
						  <td> EMPRESA:
						  	@if($user[0]->exp_03_empresa != "")
							  <input style="width:450px;" class="form-control" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="<?php echo $user[0]->exp_03_empresa; ?>" maxlength="150" required />
							@else
							  <input style="width:450px;" disabled class="form-control" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" required />
							@endif
						  </td>
						  <td> CARGO:
						  	@if($user[0]->exp_03_empresa != "")
							  <input style="width: 400px;" class="form-control" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="<?php echo $user[0]->exp_03_cargo; ?>" maxlength="150" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" required />
							@endif
						  </td>
						</tr>
						<tr>
						   <td> DATA INÍCIO:
						    @if($user[0]->exp_03_empresa != "")
							  <input style="width:400px;" class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="<?php echo $user[0]->exp_03_data_ini; ?>" maxlength="15" required />
							@else
							  <input style="width:400px;" disabled class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" required />
							@endif
						  </td>
						  <td> DATA FIM:
						  	@if($user[0]->exp_03_empresa != "")
							  <input style="width: 400px;" class="form-control" type="date" id="data_fim3" name="data_fim3" value="<?php echo $user[0]->exp_03_data_fim; ?>" maxlength="15" required />
							@else
							  <input style="width: 400px;" disabled class="form-control" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" required />
							@endif
						  </td>
						</tr>
						<tr>					
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
						    @if($user[0]->exp_03_empresa != "")
							  <textarea style="width:450px;" class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="<?php echo $user[0]->exp_03_atribuicoes; ?>" maxlength="300" required>{{ $user[0]->exp_03_atribuicoes }}</textarea>
							@else
							  <textarea style="width:450px;" disabled class="form-control" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required></textarea>
							@endif
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
						    @if($user[0]->exp_03_empresa != "")
							  <input class="form-control" type="file" id="arquivo_ctps3" name="arquivo_ctps3" maxlength="600"> 
							  <input class="form-control" type="text" id="arquivo_ctps3_" name="arquivo_ctps3_" value="<?php echo $user[0]->arquivo_ctps3; ?>" maxlength="600" readonly> 
							@else
							  <input class="form-control" disabled type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
							@endif
						  </td>
						</tr>
						<tr>
						  <td colspan="4"><center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</center></strong></td>
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
						<center><h5 class="modal-title" id="exampleModalLongTitle"><b>CURRÍCULO:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
						<tr>
						 <td><strong> Os arquivos permitidos são: .doc, .docx e .pdf </strong></td>
						</tr>
						<tr>
						 <td> <b>(*campo obrigatório)</b>
						  <input class="form-control" type="file" id="arquivo" name="arquivo" style="width:500px" maxlength="200" />
						  <input class="form-control" type="text" id="arquivo_" name="arquivo_" required style="width:500px" maxlength="200" value="<?php echo $user[0]->nomearquivo2; ?>" readonly />
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
						 <td> POSSUI HABILITAÇÃO:
						  <select style="width:300px;" class="form-control" id="habilitacao" name="habilitacao"> 
						   @if($user[0]->habilitacao == "sim")
						    <option id="habilitacao" name="habilitacao" value="nao">Não</option>
						    <option id="habilitacao" name="habilitacao" value="sim" selected>Sim</option>
						   @else
						    <option id="habilitacao" name="habilitacao" value="nao" selected>Não</option>
						    <option id="habilitacao" name="habilitacao" value="sim">Sim</option>
						   @endif
						  </select>						  
						 </td>
						</tr>
						<tr>
						 <td> DISPONIBILIDADE PARA QUAL PERÍODO:
						  <select style="width:300px;" class="form-control" id="periodo" name="periodo">
						   @if($user[0]->periodo_integral == "periodo_integral")
						    <option id="periodo" name="periodo" value="periodo_integral" selected>Disponibilidade para período integral</option>
						    <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para período noturno</option>
						    <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para meio período</option>
						   @elseif($user[0]->periodo_noturno == "periodo_noturno")
						    <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para período integral</option>
						    <option id="periodo" name="periodo" value="periodo_noturno" selected>Disponibilidade para período noturno</option>
						    <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para meio período</option>
						   @elseif($user[0]->meio_periodo == "meio_periodo")
						    <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para período integral</option>
						    <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para período noturno</option>
						    <option id="periodo" name="periodo" value="meio_periodo" selected>Disponibilidade para meio período</option>
						   @endif
						  </select>
						 </td> 
						</tr>
						<tr>
						 <td> DISPONIBILIDADE PARA MUDAR DE CIDADE:
						  <select style="width:300px;" class="form-control" id="outra_cidade" name="outra_cidade">
						   @if($user[0]->outra_cidade == "nao")
						    <option id="outra_cidade" name="outra_cidade" value="nao" selected>Não</option>
						    <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
						   @else
						    <option id="outra_cidade" name="outra_cidade" value="nao">Não</option>
						    <option id="outra_cidade" name="outra_cidade" value="sim" selected>Sim</option>
						   @endif
						  </select>
						 </td>
						</tr>
						<tr>	
						 <td> COMO SOUBE DA VAGA? </td>
						 <td>
						  <select style="width:200px;" class="form-control" id="como_soube" name="como_soube" onchange="comoSoube()"> 
						   @if($user[0]->como_soube == "redes_sociais")
						    <option id="como_soube" name="como_soube" value="redes_sociais" selected> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>
						   @elseif($user[0]->como_soube == "site_hcpgestao")
						  	<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao" selected> Site HCP Gestão </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
						   @elseif($user[0]->como_soube == "indicacao")
						  	<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
							<option id="como_soube" name="como_soube" value="indicacao" selected> Indicação </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
						   @else
						  	<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
							<option id="como_soube" name="como_soube" value="outros" selected> Outros </option>  
						   @endif
						  </select>					  
						 </td> 
						 <td>
						   @if($user[0]->como_soube == "redes_sociais" || $user[0]->como_soube == "site_hcpgestao" || $user[0]->como_soube == "indicacao")
						   <input style= "width:200px;" type="text" id="como_soube2" name="como_soube2" class="form-control" maxlength="255" disabled required value=""/>  
						   @else
						   <input style= "width:200px;" type="text" id="como_soube2" name="como_soube2" class="form-control" maxlength="255" required value="<?php echo $user[0]->como_soube; ?>"/> 
						   @endif
						 </td>
						</tr>
						<tr>
						<td>
						POSSUI PARENTESCO COM COLABORADOR DO HCP GESTÃO? </td>
						<td>
						   <select style= "width:200px;" class="form-control" id="parentesco" name="parentesco" onchange="familiar()"> 
						    @if($user[0]->parentesco == "nao")
						     <option id="parentesco" name="parentesco" value="nao" selected> Não </option>  
							 <option id="parentesco" name="parentesco" value="sim"> Sim </option>  
						    @else
						     <option id="parentesco" name="parentesco" value="nao"> Não </option>  
							 <option id="parentesco" name="parentesco" value="sim" selected> Sim </option>  
							@endif
						   </select>	
						</td>				  
						<td> 
							@if($user[0]->parentesco == "nao")
							<input style= "width:200px;" type="text" id="parentesco_nome" name="parentesco_nome" class="form-control" maxlength="255" disabled required /> </td>
							@else
							<input style= "width:200px;" type="text" id="parentesco_nome" name="parentesco_nome" class="form-control" maxlength="255" required value="<?php echo $user[0]->parentesco_nome; ?>"/> </td>
							@endif
						</td>
						</tr>
						<tr> <br>
						 <td colspan="3" align="right">
						    <a href="javascript:history.back();" class="btn btn-warning btn-sm" style="margin-top: 10px;">VOLTAR</a> 
						 	<input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="SALVAR" id="Salvar" name="Salvar" />
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
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
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