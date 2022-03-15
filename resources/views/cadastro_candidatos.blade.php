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
				document.getElementById('deficiencia').hidden = false;  
				document.getElementById('cid').hidden = false;
				document.getElementById('pcd1').hidden = false; 
				document.getElementById('pcd2').hidden = false; 
				document.getElementById('pcd3').hidden = false; 
				document.getElementById('pcd4').hidden = false; 
				document.getElementById('pcd5').hidden = false; 
				document.getElementById('pcd6').hidden = false; 
				document.getElementById('arquivo_deficiencia').hidden = false;
			} else if(x == "nao") {
				document.getElementById('deficiencia').hidden = true;
				document.getElementById('cid').hidden = true;
				document.getElementById('pcd1').hidden = true;
				document.getElementById('pcd2').hidden = true; 
				document.getElementById('pcd3').hidden = true; 
				document.getElementById('pcd4').hidden = true; 
				document.getElementById('pcd5').hidden = true; 
				document.getElementById('pcd6').hidden = true;
				document.getElementById('arquivo_deficiencia').hidden = true;
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
										<h5 class="display-8"><p style="align: center"> <b>INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> <img id="hcp" width="120px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
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
				<td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processos[0]->nome }}. </strong></td>
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
						 <td><b>NOME COMPLETO: (*campo obrigatório)</b>
						  <input class="form-control"  placeholder="Nome Completo"  type="text" id="nome" name="nome" value="{{ old('nome') }}" required maxlength="150" />
						 </td>
						 <td><b>E-MAIL: (*campo obrigatório)</b>
						  <input id="email" style="width: 250px;" type="text" class="form-control" name="email" value="{{ old('email') }}" required placeholder="email" maxlength="255">
						 </td>
						 <td><b>CPF: (*campo obrigatório)</b>
						  <input id="cpf" style="width: 250px;" type="text" maxlength="11" class="form-control" name="cpf" max="11" value="{{ old('cpf') }}" required placeholder="APENAS NÚMEROS" autocomplete="cpf" autofocus /> 
						 </td>
						</tr>
						<tr>
						 <td>  Selecione a <b>VAGA: (*campo obrigatório)</b>
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
						 <td> <b>CELULAR: (*campo obrigatório)</b>
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
						<td>
						<b>CIDADE: (*campo obrigatório)</b>
						<input class="form-control" style="width:400px" placeholder="Cidade" type="text" id="lugar_nascimento" name="lugar_nascimento" value="{{ old('lugar_nascimento') }}" required maxlength="100" />
						</td>
						<td>
						<b>ESTADO: (*campo obrigatório)</b>
						<select class="form-control" id="estado_nascimento" name="estado_nascimento" style="width:400px" required>
							<option id="estado_nasc" name="estado_nasc" value="">Selecione...</option>
							<option id="estado_nasc" name="estado_nasc" value='Acre'>Acre</option>
							<option id="estado_nasc" name="estado_nasc" value='Alagoas'>Alagoas</option>
							<option id="estado_nasc" name="estado_nasc" value='Amazonas'>Amazonas</option>
							<option id="estado_nasc" name="estado_nasc" value='Amapá'>Amapá</option>
							<option id="estado_nasc" name="estado_nasc" value='Bahia'>Bahia</option>
							<option id="estado_nasc" name="estado_nasc" value='Ceará'>Ceará</option>
							<option id="estado_nasc" name="estado_nasc" value='Distrito Federal'>Distrito&nbsp;Federal</option>
							<option id="estado_nasc" name="estado_nasc" value='Espírito Santo'>Espírito&nbsp;Santo</option>
							<option id="estado_nasc" name="estado_nasc" value='Goiás'>Goiás</option>
							<option id="estado_nasc" name="estado_nasc" value='Maranhão'>Maranhão</option>
							<option id="estado_nasc" name="estado_nasc" value='Minas Gerais'>Minas&nbsp;Gerais</option>
							<option id="estado_nasc" name="estado_nasc" value='Mato Grosso do Sul'>Mato&nbsp;Grosso&nbsp;do&nbsp;Sul</option>
							<option id="estado_nasc" name="estado_nasc" value='Mato Grosso'>Mato&nbsp;Grosso</option>
							<option id="estado_nasc" name="estado_nasc" value='Pará'>Pará</option>
							<option id="estado_nasc" name="estado_nasc" value='Paraíba'>Paraíba</option>
							<option id="estado_nasc" name="estado_nasc" value='Pernambuco'>Pernambuco</option>
							<option id="estado_nasc" name="estado_nasc" value='Piauí'>Piauí</option>
							<option id="estado_nasc" name="estado_nasc" value='Paraná'>Paraná</option>
							<option id="estado_nasc" name="estado_nasc" value='Rio de Janeiro'>Rio&nbsp;de&nbsp;Janeiro</option>
							<option id="estado_nasc" name="estado_nasc" value='Rio Grande do Norte'>Rio&nbsp;Grande&nbsp;do&nbsp;Norte</option>
							<option id="estado_nasc" name="estado_nasc" value='Rondônia'>Rondônia</option>
							<option id="estado_nasc" name="estado_nasc" value='Roraima'>Roraima</option>
							<option id="estado_nasc" name="estado_nasc" value='Rio Grande do Sul'>Rio&nbsp;Grande&nbsp;do&nbsp;Sul</option>
							<option id="estado_nasc" name="estado_nasc" value='Santa Catarina'>Santa&nbsp;Catarina</option>
							<option id="estado_nasc" name="estado_nasc" value='Sergipe'>Sergipe</option>
							<option id="estado_nasc" name="estado_nasc" value='São Paulo'>São&nbsp;Paulo</option>
							<option id="estado_nasc" name="estado_nasc" value='Tocantins'>Tocantins</option>
						</select>
						</td>
						</tr>
						<tr>
						<td>
						<b>PAÍS: (*campo obrigatório)</b>
						<input class="form-control" placeholder="País" type="text" id="cidade_nascimento" name="cidade_nascimento" value="{{ old('cidade_nascimento') }}" required maxlength="50" />
						</td>
						<td>
						<b>DATA DE NASCIMENTO: (*campo obrigatório)</b>
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
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>ENDEREÇO:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
						<tr>
							<td> <b>CEP: (*campo obrigatório)</b>
							 <input style="width: 300px;" class="form-control" placeholder="CEP" type="text" id="cep" name="cep" value="{{ old('cep') }}" required maxlength="30" />
							</td>
							<td> <b>RUA: (*campo obrigatório)</b>
							 <input style="width:300px;" class="form-control" placeholder="RUA" type="text" id="rua" name="rua" value="{{ old('rua') }}" required maxlength="100" />
							</td>
							<td> <b>NÚMERO: (*campo obrigatório)</b>
							 <input style="width:300px;" class="form-control" placeholder="NÚMERO" type="text" id="numero" name="numero" value="{{ old('numero') }}" required maxlength="10" />
							</td>
						</tr>
						<tr>
							<td> <b>BAIRRO: <b>(*campo obrigatório)</b>
							 <input style="width:300px;" class="form-control" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="{{ old('bairro') }}" required maxlength="100" />
							</td>
							<td> <b>CIDADE: <b>(*campo obrigatório)</b>
							 <input style="width:300px;" class="form-control" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="{{ old('cidade') }}" required maxlength="100" />
							</td>
							<td> <b>ESTADO: <b>(*campo obrigatório)</b>
							 <input style="width:300px;" class="form-control" placeholder="ESTADO" type="text" id="estado" name="estado" value="{{ old('estado') }}" required maxlength="100" />
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
						<td> <b>ESCOLARIDADE: (*campo obrigatório)</b>
						 <select style="width:450px;" id="escolaridade" name="escolaridade" class="form-control">
						 	@if(old('escolaridade') == "Ensino Medio Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo" selected>Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Superior Incompleto")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto" selected>Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Superior Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo" selected>Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Mestrado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo" selected>Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Doutorado Completo")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo" selected>Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Pos graduacao")
							<option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
							<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
							<option id="escolaridade" name="escolaridade" value="Pos graduacao" selected>Pós-graduação</option> 
							<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
							@elseif(old('escolaridade') == "Residencia")
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
							@if(old('status_escolaridade') == "Em Andamento")
						 	<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento" selected>Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
							@elseif(old('status_escolaridade') == "Trancado")
							<option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Trancado" selected>Trancado</option>
							<option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
							@elseif(old('status_escolaridade') == "Concluido")
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
						 <textarea class="form-control" style="width:450px;" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="{{ old('formacao') }}" maxlength="150" required>{{ old('formacao') }}</textarea>
						</td>
						<td> <b>QUAIS CURSOS REALIZOU? (*campo obrigatório)</b>
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
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>PCD:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>  
					   <tr>
						<td colspan="2"> 
							Você quer se candidatar para a vaga como Pessoa com Deficiência? 
							<select id="deficiencia_status" name="deficiencia_status" class="form-control" style="width: 100px;" onchange="habilitaDeficiencia('sim')">
							 @if(old('deficiencia_status') == "nao")
							 <option id="deficiencia_status" name="deficiencia_status" value="nao" selected>NÃO</option>
							 <option id="deficiencia_status" name="deficiencia_status" value="sim">SIM</option> 
							 @elseif(old('deficiencia_status') == "sim")
							 <option id="deficiencia_status" name="deficiencia_status" value="nao">NÃO</option>
							 <option id="deficiencia_status" name="deficiencia_status" value="sim" selected>SIM</option>
							 @else
							 <option id="deficiencia_status" name="deficiencia_status" value="nao">NÃO</option>
							 <option id="deficiencia_status" name="deficiencia_status" value="sim">SIM</option>
							 @endif
						    </select>
						</td>
					   </tr>
				       <tr>
					    <td> <b><label id="pcd"><label id="pcd1" name="pcd1" hidden>ESPECIFIQUE SUA DEFICIÊNCIA: (*campo obrigatório)</label></b>
						 <select id="deficiencia" name="deficiencia" class="form-control" style="width: 400px;" hidden>
						    <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
							<option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
							<option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
							<option id="deficiencia" name="deficiencia" value="Mental">Mental</option>
							<option id="deficiencia" name="deficiencia" value="Autista">Transtorno do Espectro Autista</option>
							<option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
							<option id="deficiencia" name="deficiencia" value="Outros">Outros</option>
						 </select>
						</td>
						<td colspan="2"> <label id="pcd2" name="pcd2" hidden><b>CID CORRESPONDENTE: (*campo obrigatório)</b></label>
						   <input style="width:400px;" class="form-control" hidden placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="{{ old('cid') }}" maxlength="255" required />
						</td>	
					   </tr>
					   <tr>
						<td>
						 <p align="justify"><label id="pcd3" name="pcd3" hidden>Envie o laudo PCD para complementar o seu cadastro no HCP GESTÃO</label></p>
						 <p align="justify"><label id="pcd4" name="pcd4" hidden>O Laudo PCD é importante para garantir que processos seletivos destinados a pessoas com deficiência sejam justos e que deles participem apenas pessoas que tenham alguma deficiência. Desta forma, o HCP Gestão terá como identificar rapidamente aplicações inadequadas, tornando o processo de seleção mais ágil e justo. Como o envio do laudo médico não é obrigatório, você não será automaticamente desclassificado do processo seletivo. No entanto, esse controle será exclusivo do HCP GESTÃO que poderá utilizar esse documento para evitar fraudes. O laudo será coletado e armazenado com base no seu consentimento. Este documento será compartilhado apenas para o processo seletivo em questão conforme nossa Política de Privacidade.</label></p>
						 <b><label id="pcd"><label id="pcd5" name="pcd5" hidden>ANEXE O LAUDO MÉDICO</label></b>
					 	 <input style="width:450px;" hidden class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" value="" maxlength="600"> 
						 <br><p><label id="pcd"><label id="pcd6" name="pcd6" hidden>Esse documento pode ser nos formatos: <b>PNG, JPG, JPEG, DOC, DOCX ou PDF.</label></b></p>
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
						<center><h5 class="modal-title"id="exampleModalLongTitle">EXPERIÊNCIAS: <b>(*Não Obrigatório)</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
					   	<tr>
						  <td colspan="3" align="left"><strong> EXPERIÊNCIA 01: </strong></td>
						</tr>
						<tr>
						  <td> EMPRESA:
							<input style="width:450px;" class="form-control" placeholder="Empresa" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" />
						  </td>
						  <td> CARGO:
							<input style="width: 400px;" class="form-control" placeholder="Cargo" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" />
						  </td>
						</tr>				
						<tr>
						  <td> DATA INÍCIO:
							<input style="width:400px;" class="form-control" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" />
						  </td>
						  <td> DATA FIM:
							<input style = "width:400px;"class="form-control" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" />
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
						   <textarea style="width:450px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300"></textarea>
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
		  				  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
							<input class="form-control" type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
						  </td>
						</tr>
						<tr>
						  <td colspan="2">
							<center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></center>
						  </td>
						</tr>
						<tr>
						  <td colspan="3" align="left"><strong> EXPERIÊNCIA 02: </strong></td>
						</tr>
						<tr>
						  <td> EMPRESA:
							<input style="width:450px;" class="form-control" placeholder="Empresa" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" />
						  </td>
						  <td> CARGO:
							<input style = "width: 400px;" class="form-control" placeholder="Cargo" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" />
						  </td>
						</tr>
						<tr>
						  <td> DATA INÍCIO:
							<input style="width:400px; " class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" />
						  </td>
						  <td> DATA FIM:
							<input style="width: 400px;"class="form-control" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" />
						  </td>
						</tr>
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
							<textarea style="width:450px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300"></textarea>
							Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
							<input class="form-control" type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
						  </td>
						</tr>
						<tr>
						  <td colspan="2"><center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</center></strong></td>
						</tr>
						<tr>
						  <td colspan="3" align="left"><strong> EXPERIÊNCIA 03: </strong></td>
						</tr>
						<tr>
						  <td> EMPRESA:
							<input style="width:450px;" class="form-control" placeholder="Empresa" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" />
						  </td>
						  <td> CARGO:
							<input style="width: 400px;" class="form-control" placeholder="Cargo" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" />
						  </td>
						</tr>
						<tr>
						   <td> DATA INÍCIO:
							<input style="width:400px; " class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" />
						  </td>
						  <td> DATA FIM:
							<input style="width: 400px;"class="form-control" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" />
						  </td>
						</tr>
						<tr>					
						<tr>
						  <td> SUAS ATRIBUIÇÕES:
						   <textarea style="width:450px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300"></textarea>
						   Restam: <span class="caracteres">300 </span> caracteres.<br>
						  </td>
						  <td> CTPS OU CONTRA CHEQUE </br> <b>.doc, .docx e .pdf</b>
							<input class="form-control" type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
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
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>CURRÍCULO:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table>
						<tr>
						 <td><strong> Os arquivos permitidos são: .doc, .docx e .pdf </strong></td>
						</tr>
						<tr>
						 <td> <b>(*campo obrigatório)</b>
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
						<center><h5 class="modal-title"id="exampleModalLongTitle"><b>DISPONIBILIDADE:</b></h5></center>
					 </div>
				     <div class="modal-body" style="width: 900px; background-color: white;">
					  <table border="0" style="width:950px;">
						<tr>
						 <td> POSSUI HABILITAÇÃO:
						  <select style="width:300px;" class="form-control" id="habilitacao" name="habilitacao">
						   <option id="habilitacao" name="habilitacao" value="nao">Não</option>
						   <option id="habilitacao" name="habilitacao" value="sim">Sim</option>
						  </select>
						 </td>
						 </tr>
						<tr>
						 <td> DISPONIBILIDADE PARA QUAL PERÍODO:
						  <select style="width:300px;" class="form-control" id="periodo" name="periodo">
						   <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para período integral</option>
						   <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para período noturno</option>
						   <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para meio período</option>
						  </select>
					 	 </td> 
						</tr>
						<tr>
						 <td> DISPONIBILIDADE PARA MUDAR DE CIDADE:
						   <select style="width:300px;" class="form-control" id="outra_cidade" name="outra_cidade">
						    <option id="outra_cidade" name="outra_cidade" value="nao">Não</option>
						    <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
						   </select>
						 </td>
						</tr>
						<tr>	
						 <td> COMO SOUBE DA VAGA? </td><td>
						  <select style= "width:200px;"onchange="comoSoube()" class="form-control" id="como_soube" name="como_soube"> 
							<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
							<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
							<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
							<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
						  </select>
						 </td> 
						 <td> 
						   <input style= "width:200px;" type="text" id="como_soube2" name="como_soube2" class="form-control" maxlength="255" disabled required/> 
						 </td>
						</tr>
						<tr>
						<td>
						POSSUI PARENTESCO COM COLABORADOR DO HCP GESTÃO? </td><td>
						<select style= "width:200px;" onchange="familiar()" class="form-control" id="parentesco" name="parentesco"> 
							<option id="parentesco" name="parentesco" value="nao"> Não </option>  
							<option id="parentesco" name="parentesco" value="sim"> Sim </option>  
							</select>	
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
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#rua").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#estado").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
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