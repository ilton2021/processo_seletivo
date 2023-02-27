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
			} else if(x == "nao" || x == "") {
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

		function habilitaComoSoube(valor) {
			var x = document.getElementById('como_soube').value;
			if(x == "outros") {  
				document.getElementById('como_soube2').disabled = false;
			} else {
				document.getElementById('como_soube2').disabled = true;
			}
		}

		function habilitaParente(valor) {
			var x = document.getElementById('parentesco').value;
			if(x == "sim") {
				document.getElementById('parentesco_nome').disabled = false;
			} else {
				document.getElementById('parentesco_nome').disabled = true;
			}
		}

		function habilitaTrabalhoOss(valor) {
			var x = document.getElementById('trabalha_oss').value;
			if(x == "sim") {
				document.getElementById('trabalha_oss2').disabled = false;
			} else {
				document.getElementById('trabalha_oss2').disabled = true;
			}
		}
	 </script>
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
			  <br><br>
			  <table class="table table-borderless" border="0" width="500" id="inicio">
				<tr>
				<td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processos[0]->nome }}. </strong> </td>
				<td> <a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="margin-top: 5px; color: #FFFFFF;" class="btn btn-warning btn-sm"> VOLTAR <i class="fas fa-undo-alt"></i></a></td>
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

			  <form method="POST"  action="{{ route('validarCandidato', array($unidade->id, $processos[0]->id)) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">

		
			  <div id="tabs" class="nav-tabs">
			   <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="pill" href="#tabs1" role="tab" aria-selected="true">INFORMAÇÃO CANDIDATURA</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#tabs2" role="tab" aria-selected="false">DADOS PESSOAIS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#tabs3" role="tab" aria-selected="false">ENDEREÇO</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#tabs4" role="tab" aria-selected="false">PCD</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#tabs5" role="tab" aria-selected="false">EXPERIÊNCIAS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="pill" href="#tabs6" role="tab" aria-selected="false">CURRÍCULO</a>
				</li>
			   </ul>
			  
			  <div class="tab-content" id="pills-tabContent"> 
		 		<div class="tab-pane fade show active" id="tabs1">
				 <div class="modal-content">
					<div class="modal-content">
					 <div class="modal-header">
						<center><h6 class="modal-title"id="exampleModalLongTitle"><b>INFORMAÇÃO CANDIDATURA: (* campos obrigatórios)</b></h6></center>
				   	 </div>
				     <div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">Como você soube dessa vaga? (*)</font></b></label>
						 <select class="form-select form-select-sm" id="como_soube" name="como_soube" onchange="habilitaComoSoube('sim')">
						 	<option value="" selected >Selecione...</option>
							@if(old('como_soube')=="google")<option value="google" selected>Google</option>@else<option value="google">Google</option>@endif
							@if(old('como_soube')=="facebook")<option value="facebook" selected>Facebook</option>@else<option value="facebook">Facebook</option>@endif
							@if(old('como_soube')=="instragram")<option value="instragram" selected>Instagram</option>@else<option value="instragram">Instagram</option>@endif
							@if(old('como_soube')=="whatsapp")<option value="whatsapp" selected>WhatsApp</option>@else<option value="whatsapp">WhatsApp</option>@endif
							@if(old('como_soube')=="indicacao")<option value="indicacao" selected>Indicação de parentes ou amigos</option>@else<option value="indicacao">Indicação de parentes ou amigos</option>@endif
							@if(old('como_soube')=="sites")<option value="sites" selected>Sites de busca de empregos</option>@else<option value="sites">Sites de busca de empregos</option>@endif
							@if(old('como_soube')=="outras_redes")<option value="outras_redes" selected>Outras redes sociais</option>@else<option value="outras_redes">Outras redes sociais</option>@endif
							@if(old('como_soube')=="outros")<option value="outros" selected>Outros</option>@else<option value="outros">Outros</option>@endif
						 </select>
						 @if(old('como_soube')=="outros")
						  <input class="form-control form-control-sm" type="text" id="como_soube2" name="como_soube2" value="{{ old('como_soube2') }}" required maxlength="50" />
						 @else
						  <input class="form-control form-control-sm" disabled type="text" id="como_soube2" name="como_soube2" value="{{ old('como_soube2') }}" required maxlength="50" />
						 @endif
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Você foi indicado por algum parente ou amigo para esta vaga? (*)</font></b></label>
						 <select class="form-select form-select-sm" id="parentesco" name="parentesco" onchange="habilitaParente('sim')">
						 	<option value="">Selecione...</option>
							 @if(old('parentesco')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
							 @if(old('parentesco')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							 @if(old('parentesco')=="nao_responder")<option value="nao_responder" selected>Prefiro não responder</option>@else<option value="nao_responder">Prefiro não responder</option>@endif
						 </select>
						 @if(old('parentesco') == "sim")
						  <input class="form-control form-control-sm" type="text" id="parentesco_nome" name="parentesco_nome" value="{{ old('parentesco_nome') }}" required maxlength="50" />
						 @else
						  <input class="form-control form-control-sm" disabled type="text" id="parentesco_nome" name="parentesco_nome" value="{{ old('parentesco_nome') }}" required maxlength="50" />
						 @endif
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Você trabalha ou trabalhou em alguma unidade da OSS HCP Gestão? (*)</font></b></label>
						 <select class="form-select form-select-sm" id="trabalha_oss" name="trabalha_oss" onchange="habilitaTrabalhoOss('sim')">
						 	<option value="">Selecione...</option>
							 @if(old('trabalha_oss')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif	
							 @if(old('trabalha_oss')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							 @if(old('trabalha_oss')=="nao_responder")<option value="nao_responder" selected>Prefiro não responder</option>@else<option value="nao_responder">Prefiro não responder</option>@endif
						 </select>
						 @if(old('trabalha_oss') == "sim")
						 <select class="form-select form-select-sm" id="trabalha_oss2" name="trabalha_oss2" required> 
						   <option value="">Selecione...</option>
						   @foreach($unidades as $unidade)
						    @if($unidade->id == old('trabalha_oss2'))
							 <option value="<?php echo $unidade->id; ?>" selected>{{ $unidade->nome }}</option>
							@else
							 <option value="<?php echo $unidade->id; ?>">{{ $unidade->nome }}</option>
							@endif
						   @endforeach
						 </select>
						 @else
						 <select disabled class="form-select form-select-sm" id="trabalha_oss2" name="trabalha_oss2" required> 
						   <option value="">Selecione...</option>
						   @foreach($unidades as $unidade)
						    @if($unidade->id == old('trabalha_oss2'))
							 <option value="<?php echo $unidade->id; ?>" selected>{{ $unidade->nome }}</option>
							@else
							 <option value="<?php echo $unidade->id; ?>">{{ $unidade->nome }}</option>
							@endif
						   @endforeach
						 </select>
						 @endif
					   </div>
					   <div class="col"> 
					   </div>
					  </div>
				     </div>
				    </div>
				  </div>
				  <br>
				  <div class="modal-content">
				   <div class="modal-content">
					 <div class="modal-header">
						<center><h6 class="modal-title"id="exampleModalLongTitle"><b>DIVERSIDADE: (* campos obrigatórios)</b></h6></center>
				   	 </div>
				     <div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">Nome Social (Nome que o(a) candidato(a) é chamado socialmente) (*)</font></b></label>
						<input class="form-control form-control-sm" type="text" id="nome_social" name="nome_social" value="{{ old('nome_social') }}" required maxlength="100" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Qual o pronome: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="pronome" name="pronome" required>
							<option value="0">Selecione...</option>	
							@if(old('pronome')=='ela_dela')<option value="ela_dela" selected>Ela/Dela</option>@else<option value="ela_dela">Ela/Dela</option>@endif
						    @if(old('pronome')=='ele_dele')<option value="ele_dele" selected>Ele/Dele</option>@else<option value="ele_dele">Ele/Dele</option>@endif
							@if(old('pronome')=='nao_responder')<option value="nao_responder" selected>Prefiro não responder</option>@else<option value="nao_responder">Prefiro não responder</option>@endif
						 </select>
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Qual sua identidade de gênero: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="genero" name="genero" required>
							<option value="0">Selecione...</option>	
							@if(old('genero')=='assexual')<option value="assexual" selected>Assexual</option>@else<option value="assexual">Assexual</option>@endif
							@if(old('genero')=='bissexual')<option value="bissexual" selected>Bissexual</option>@else<option value="bissexual">Bissexual</option>@endif
							@if(old('genero')=='heterossexual')<option value="heterossexual" selected>Heterossexual</option>@else<option value="heterossexual">Heterossexual</option>@endif
							@if(old('genero')=='homossexual')<option value="homossexual" selected>Homossexual</option>@else<option value="homossexual">Homossexual</option>@endif
							@if(old('genero')=='pansexual')<option value="pansexual" selected>Pansexual</option>@else<option value="pansexual">Pansexual</option>@endif
							@if(old('genero')=='nao_responder')<option value="nao_responder" selected>Prefiro não responder</option>@else<option value="nao_responder">Prefiro não responder</option>@endif
				 		 </select>
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Qual sua cor ou raça: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="cor" name="cor" required>
							<option value="0">Selecione...</option>	
							@if(old('cor')=='amarela')<option value="amarela" selected>Amarela</option>@else<option value="amarela">Amarela</option>@endif
							@if(old('cor')=='branca')<option value="branca" selected>Branca</option>@else<option value="branca">Branca</option>@endif
							@if(old('cor')=='indigena')<option value="indigena" selected>Indígena</option>@else<option value="indigena">Indígena</option>@endif
							@if(old('cor')=='parda')<option value="parda" selected>Parda</option>@else<option value="parda">Parda</option>@endif
							@if(old('cor')=='preta')<option value="preta" selected>Preta</option>@else<option value="preta">Preta</option>@endif
							@if(old('cor')=='nao_responder')<option value="nao_responder" selected>Prefiro não responder</option>@else<option value="nao_responder">Prefiro não responder</option>@endif
						 </select>
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> <br>
						<label for="inputState" class="form-label"><font size="2"><b> <p align="justify">Eu concordo em compartilhar esses dados com o HCP Gestão para que possam ser realizadas ações voltadas à promoção da diversidade: (*) </p></b></font></label>
						<select id="aceito" name="aceito" class="form-select form-select-sm">
						  <option value="0" selected>Selecione...</option>
						  @if(old('aceito') == "nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
						  @if(old('aceito') == "sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
						</select>
					   </div>
					   <div class="col"> </div>
					  </div>
				     </div>
				   </div>
				  </div>
				</div>
			  
			    <div class="tab-pane fade" id="tabs2">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>DADOS PESSOAIS: (* campos obrigatórios)</b></h6></center>
				    </div>
				    <div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">Nome Completo: (*)</font></b></label>
						<input class="form-control form-control-sm" type="text" id="nome" name="nome" placeholder="NOME COMPLETO" value="{{ old('nome') }}" required maxlength="150" />
					   </div>
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">E-mail: (*)</font></b></label>
						<input class="form-control form-control-sm" type="text" id="email" name="email" placeholder="E-MAIL" value="{{ old('email') }}" required maxlength="255" />
					   </div>
					   <div class="col">  
					    <label for="inputState" class="form-label"><b><font size="2">CPF: (*)</font></b></label>
					    <input class="form-control form-control-sm" type="text" id="cpf" name="cpf" placeholder="APENAS NÚMEROS" value="{{ old('cpf') }}" required maxlength="11" max="11" autocomplete="cpf" autofocus /> 
					   </div>
					  </div>
					  <div class="row"> 
						<div class="col"> 
						 <label for="inputState" class="form-label"><b><font size="2">Selecione a VAGA: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="vaga" name="vaga" required>
							<option value="0">Selecione...</option>	
						    @if(!empty($vagas))
								@foreach($vagas as $vaga)
								 @if(old('vaga') == $vaga->nome))  
								  <option value="<?php echo $vaga->nome ?>" selected>{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @else
								  <option value="<?php echo $vaga->nome ?>">{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 @endif 
								@endforeach
							@endif
						 </select>
						</div>
						<div class="col"> 
						  <label for="inputState" class="form-label"><b><font size="2">Celular: (*)</font></b></label>
						  <input class="form-control form-control-sm" id="telefone" name="telefone" type="text" placeholder="Ex: (81)98888-3333"  maxlength="14" value="{{ old('telefone') }}" required />
						</div>
						<div class="col"> 
 						  <label for="inputState" class="form-label"><font size="2">Telefone Fixo:</font></label>
						  <input class="form-control form-control-sm" id="fone_fixo" name="fone_fixo" type="text" placeholder="Ex: (81)2222-3333"  maxlength="13" value="{{ old('fone_fixo') }}" />
						</div>
					  </div>
					</div>
				  </div>
				 </div>
				 <br>
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>NATURALIDADE: (* campos obrigatórios)</b></h6></center>
				    </div>
				    <div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col"> 
					     <label for="inputState" class="form-label"><b><font size="2">Cidade: (*)</font></b></label>
						 <input class="form-control form-select-sm" id="lugar_nascimento" name="lugar_nascimento" type="text" placeholder="CIDADE" value="{{ old('lugar_nascimento') }}" required maxlength="100" />
					   </div>
					   <div class="col"> 
					     <label for="inputState" class="form-label"><b><font size="2">Estado: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="estado_nascimento" name="estado_nascimento" required>
						   <option value="0">Selecione...</option>
						    @foreach($estados as $estado)
							 @if($estado->nome == old('estado_nascimento'))
							  <option value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
							 @else
							  <option value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
							 @endif
							@endforeach
						 </select>
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
					     <label for="inputState" class="form-label"><b><font size="2">País: (*)</font></b></label>
						 <input class="form-control form-control-sm" placeholder="PAÍS" type="text" id="cidade_nascimento" name="cidade_nascimento" value="{{ old('cidade_nascimento') }}" required maxlength="50" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Data De Nascimento: (*)</font></b></label>
						<input class="form-control form-control-sm" type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento') }}" required />
					   </div> 
					  </div>
					</div>
				  </div>
		  	     </div>
				</div>

			    <div class="tab-pane fade" id="tabs3">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>ENDEREÇO: (* campos obrigatórios)</b></h6></center>
				    </div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">CEP: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="CEP" type="text" id="cep" name="cep" value="{{ old('cep') }}" required maxlength="30" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Rua: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="RUA" type="text" id="rua" name="rua" value="{{ old('rua') }}" required maxlength="100" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Número: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="NÚMERO" type="text" id="numero" name="numero" value="{{ old('numero') }}" required maxlength="10" />
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Bairro: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="{{ old('bairro') }}" required maxlength="100" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Cidade: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="{{ old('cidade') }}" required maxlength="100" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Estado: (*)</font></b></label>
						 <select id="estado" name="estado" class="form-select form-select-sm">
						 	<option value="" selected>Selecione...</option>
							 @foreach($estados as $estado)
							  @if($estado->nome == old('estado'))
							    <option value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
							  @else
							    <option value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
							  @endif
						     @endforeach
						 </select>
					   </div>
					  </div>
					  <div class="row">
					    <div class="col">
						 <label for="inputState" class="form-label"><font size="2">Complemento:</font></label>
						 <input class="form-control form-control-sm" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" value="{{ old('complemento') }}" maxlength="200" />
					    </div>
					  </div>
				    </div>
				  </div>
				 </div>
				 <br>
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>ESCOLARIDADE: (* campos obrigatórios)</b></h6></center>
				   	</div>
				    <div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">Escolaridade: (*)</font></b></label>
						 <select id="escolaridade" name="escolaridade" class="form-select form-select-sm">
						    <option value="">Selecione..</option>
						    @if(old('escolaridade') == "Ensino Medio Completo")<option value="Ensino Medio Completo" selected>Ensino Médio Completo</option>@else<option value="Ensino Medio Completo">Ensino Médio Completo</option>@endif
							@if(old('escolaridade') == "Superior Incompleto")<option value="Superior Incompleto" selected>Superior Incompleto</option>@else<option value="Superior Incompleto">Superior Incompleto</option>@endif
							@if(old('escolaridade') == "Superior Completo")<option value="Superior Completo" selected>Superior Completo</option>@else<option value="Superior Completo">Superior Completo</option>@endif
							@if(old('escolaridade') == "Mestrado Completo")<option value="Mestrado Completo" selected>Mestrado Completo</option>@else<option value="Mestrado Completo">Mestrado Completo</option>@endif
							@if(old('escolaridade') == "Doutorado Completo")<option value="Doutorado Completo" selected>Doutorado Completo</option>@else<option value="Doutorado Completo">Doutorado Completo</option>@endif
							@if(old('escolaridade') == "Pos graduacao")<option value="Pos graduacao" selected>Pós-graduação</option>@else<option value="Pos graduacao">Pós-graduação</option>@endif
							@if(old('escolaridade') == "Residencia")<option value="Residencia" selected>Residência</option>@else<option value="Residencia">Residência</option>@endif
						 </select>
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Status Da Escolaridade: (*)</font></b></label>
						 <select id="status_escolaridade" name="status_escolaridade" class="form-select form-select-sm">
						    <option value="">Selecione..</option>
						    @if(old('status_escolaridade') == "Em Andamento")<option value="Em Andamento" selected>Em Andamento</option>@else<option value="Em Andamento">Em Andamento</option>@endif
							@if(old('status_escolaridade') == "Trancado")<option value="Trancado" selected>Trancado</option>@else<option value="Trancado">Trancado</option>@endif
							@if(old('status_escolaridade') == "Concluido")<option value="Concluido" selected>Concluído</option>@else<option value="Concluido">Concluído</option>@endif
						 </select>
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Formação Em Qual Curso? (*)</font></b></label>
					    <textarea class="form-control form-control-sm" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="{{ old('formacao') }}" maxlength="150" required>{{ old('formacao') }}</textarea>
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Quais Cursos Realizou? (*)</font></b></label>
					    <textarea class="form-control form-control-sm" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="{{ old('cursos') }}" maxlength="500" required>{{ old('cursos') }}</textarea>
					   </div>
					  </div>
				    </div>
				  </div>
				 </div>
			    </div>

			    <div class="tab-pane fade" id="tabs4">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>PCD:</b></h6></center>
				    </div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Você quer se candidatar para a vaga como Pessoa com Deficiência?</font></b></label>
						<select id="deficiencia_status" name="deficiencia_status" class="form-select form-select-sm" onchange="habilitaDeficiencia('sim')">
						  <option value="" selected>Selecione...</option>
						  @if(old('deficiencia_status') == "nao")<option value="nao" selected>NÃO</option>@else<option value="nao">NÃO</option>@endif
						  @if(old('deficiencia_status') == "sim")<option value="sim" selected>SIM</option>@else<option value="sim">SIM</option>@endif
						</select>
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Especifique Sua Deficiência:</font></b></label>
						@if(old('deficiencia_status') == "" || old('deficiencia_status') == "nao")
						<select disabled id="deficiencia" name="deficiencia" class="form-select form-select-sm">
						  <option value="">Selecione..</option>
						  @if(old('deficiencia') == "Auditiva")<option value="Auditiva" selected>Auditiva</option>@else<option value="Auditiva">Auditiva</option>@endif
						  @if(old('deficiencia') == "Fisica")<option value="Fisica" selected>Física</option>@else<option value="Fisica">Física</option>@endif
						  @if(old('deficiencia') == "Intelectual")<option value="Intelectual" selected>Intelectual</option>@else<option value="Intelectual">Intelectual</option>@endif
						  @if(old('deficiencia') == "Mental")<option value="Mental" selected>Mental</option>@else<option value="Mental">Mental</option>@endif
						  @if(old('deficiencia') == "Autista")<option value="Autista" selected>Autista</option>@else<option value="Autista">Autista</option>@endif
						  @if(old('deficiencia') == "Visual")<option value="Visual" selected>Visual</option>@else<option value="Visual">Visual</option>@endif
						  @if(old('deficiencia') == "Outros")<option value="Outros" selected>Outros</option>@else<option value="Outros">Outros</option>@endif
						</select>
						@else
						<select id="deficiencia" name="deficiencia" class="form-select form-select-sm">
						  <option value="">Selecione..</option>
						  @if(old('deficiencia') == "Auditiva")<option value="Auditiva" selected>Auditiva</option>@else<option value="Auditiva">Auditiva</option>@endif
						  @if(old('deficiencia') == "Fisica")<option value="Fisica" selected>Física</option>@else<option value="Fisica">Física</option>@endif
						  @if(old('deficiencia') == "Intelectual")<option value="Intelectual" selected>Intelectual</option>@else<option value="Intelectual">Intelectual</option>@endif
						  @if(old('deficiencia') == "Mental")<option value="Mental" selected>Mental</option>@else<option value="Mental">Mental</option>@endif
						  @if(old('deficiencia') == "Autista")<option value="Autista" selected>Autista</option>@else<option value="Autista">Autista</option>@endif
						  @if(old('deficiencia') == "Visual")<option value="Visual" selected>Visual</option>@else<option value="Visual">Visual</option>@endif
						  @if(old('deficiencia') == "Outros")<option value="Outros" selected>Outros</option>@else<option value="Outros">Outros</option>@endif
						</select>
						@endif
					   </div>
					  </div>
					  <div class="row">   
					   <div class="col">  
					    <label for="inputState" class="form-label"><b><font size="2">CID Correspondente:</font></b></label>
					    @if(old('deficiencia_status') == "" || old('deficiencia_status') == "nao")
						<input disabled class="form-control form-control-sm" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="{{ old('cid') }}" maxlength="255" />
						@else
						<input class="form-control form-control-sm" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="{{ old('cid') }}" maxlength="255" />
						@endif
					   </div>
					   <div class="col"><br><p align="justify"><font size="2" color="red"><b>* Envie o laudo PCD para complementar o seu cadastro no HCP GESTÃO</b></font></p></div>
					  </div>
					  <div class="row">   
					   <div class="col">  
					     <br>
						 <p align="justify"><font size="2" color="red"><b>O Laudo PCD é importante para garantir que processos seletivos destinados a pessoas com deficiência sejam justos e que deles participem apenas pessoas que tenham alguma deficiência. Desta forma, o HCP Gestão terá como identificar rapidamente aplicações inadequadas, tornando o processo de seleção mais ágil e justo. 
						 Como o envio do laudo médico não é obrigatório, você não será automaticamente desclassificado do processo seletivo. No entanto, esse controle será exclusivo do HCP GESTÃO que poderá utilizar esse documento para evitar fraudes. O laudo será coletado e armazenado com base no seu consentimento. Este documento será compartilhado apenas 
						 para o processo seletivo em questão conforme nossa Política de Privacidade.</b></font></p>
						 <font size="2"><br>ANEXE O LAUDO MÉDICO</font>
						 @if(old('deficiencia_status') == "" || old('deficiencia_status') == "nao")
						 <input disabled class="form-control form-control-sm" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" maxlength="600" value="{{ old('arquivo_deficiencia') }}"> 
						 <input hidden class="form-control form-control-sm" type="text" id="arquivo_deficiencia_" name="arquivo_deficiencia_" maxlength="600" value=""> 
						 @else
						 <input class="form-control form-control-sm" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" maxlength="600" value="{{ old('arquivo_deficiencia') }}"> 
						 <input hidden class="form-control form-control-sm" type="text" id="arquivo_deficiencia_" name="arquivo_deficiencia_" maxlength="600" value=""> 
						 @endif
					 	 <br><p><b><font size="2" color="red">* Esse documento pode ser nos formatos: PNG, JPG, JPEG, DOC, DOCX ou PDF.</font></b></p>
					   </div>
					  </div>
				    </div>
				  </div>
				 </div>
				</div>

			    <div class="tab-pane fade" id="tabs5">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>EXPERIÊNCIAS:</b></h6></center>
				    </div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					   <b> 
						<p><font color="red" size="2">Atenção!!! </p>
						<p><font size="2">Prezado(a) candidato(a):</font></p>
						<p align="justify" size="2">Ao cadastrar as suas experiências profissionais no formulário de inscrição do processo seletivo, você estará participando do nosso ranking de classificação. Cada experiência cadastrada gera uma pontuação que leva em consideração o seu tempo de experiência profissional. O somatório das suas experiências cadastradas gera uma pontuação total e através dessa pontuação você terá uma colocação no ranking de classificação. <br><br>
						- Só serão consideradas experiências profissionais comprovadas na função; <br>
						- Não serão consideradas experiências profissionais em funções fora do perfil da vaga ofertada; <br>
						- Os candidatos que não cadastrarem as experiências profissionais no formulário de inscrição, não terão pontos computados no ranking de classificação. </p></font>
					   </b>
					   </div>
					  </div>
					</div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2"><center>EXPERIÊNCIA 01:</center></font></b></label>
						 @if(old('val6') == "on")
						  <p align="right"><input type="checkbox" checked onclick="desabilitar6('sim')" id="val6" name="val6" /><font size="2"> Habilitar campos</font></p></td>
					     @else
						  <p align="right"><input type="checkbox" onclick="desabilitar6('sim')" id="val6" name="val6" /><font size="2"> Habilitar campos</font></p></td>
						 @endif
					   </div>
					  </div>
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Empresa:</font></b></label>
						 @if(old('val6') == "on")
						  <input class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" required />
						 @endif
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Cargo:</font></b></label>
						 @if(old('val6') == "on")
						  <input class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" required />
						 @endif
					   </div>
					  </div>
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Data Início:</font></b></label>
						 @if(old('val6') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" required />
				 		 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" required />
				  		 @endif
					   </div>
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">Data Fim:</font></b></label>
						 @if(old('val6') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" required />
						 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" required />
						 @endif 
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Suas Atribuições:</font></b></label>
						 @if(old('val6') == "on")
						   <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required></textarea>
						 @else
						   <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required></textarea>
						 @endif
						 <font size="2">Restam: <span class="caracteres">300 </span> caracteres.</font><br>
					   </div>
					   <div class="col"> 
						<label for="inputState" class="form-label"><b><font size="2">CTPS Ou Contra Cheque (.doc, .docx e .pdf)</font></b></label>
						 @if(old('val6') == "on")
						  <input class="form-control form-control-sm" type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps1_" name="arquivo_ctps1_" value="" maxlength="600"> 
						 @else
						  <input class="form-control form-control-sm" disabled type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600">
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps1_" name="arquivo_ctps1_" value="" maxlength="600">  
						 @endif
					   </div>
					  </div>
					  <div class="row">
					   <div class="col">
					     <center><strong><font size="2" color="red">ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</font></strong></center>
					   </div>
					  </div> <br>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><b><font size="2">EXPERIÊNCIA 02:</font></b></label>
						 @if(old('val7') == "on")
						  <p align="right"><input type="checkbox" checked onclick="desabilitar7('sim')" id="val7" name="val7" /><font size="2"> Habilitar campos </font></p></td>
						 @else
						  <p align="right"><input type="checkbox" onclick="desabilitar7('sim')" id="val7" name="val7" /><font size="2"> Habilitar campos </font></p></td>
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>Empresa:</b></font></label>
						 @if(old('val7') == "on")
						  <input class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" required />
						 @endif
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>Cargo:</b></font></label>
						 @if(old('val7') == "on")
					 	  <input class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" required />
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>Data Início:</b></font></label>
						 @if(old('val7') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" required />
						 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" required />
						 @endif
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>Data Fim:</b></font></label>
						 @if(old('val7') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" required />
						 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" required />
						 @endif	 
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>Suas Atribuições:</b></font></label>
						 @if(old('val7') == "on")
						  <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required></textarea>
						 @else
						  <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required></textarea>
						 @endif
						 <font size="2">Restam: <span class="caracteres">300 </span> caracteres.</font><br>
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"><b>CTPS Ou Contra Cheque (.doc, .docx e .pdf)</b></font></label>
						 @if(old('val7') == "on")
						  <input class="form-control form-control-sm" type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps2_" name="arquivo_ctps2_" value="" maxlength="600">
						 @else
						  <input class="form-control form-control-sm" disabled type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600">
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps2_" name="arquivo_ctps2_" value="" maxlength="600"> 
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					  	<div class="col">
					     <center><strong><font size="2" color="red">ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</font></strong></center>
					   </div> <br><br>
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>EXPERIÊNCIA 03:</b></font></label>
						 @if(old('val8') == "on")
						  <p align="right"><input type="checkbox" checked onclick="desabilitar8('sim')" id="val8" name="val8" /><font size="2"> Habilitar campos </font></p></td>
						 @else
						  <p align="right"><input type="checkbox" onclick="desabilitar8('sim')" id="val8" name="val8" /><font size="2"> Habilitar campos </font></p></td>
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>Empresa:</b></font></label>
						 @if(old('val8') == "on")
						  <input class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="EMPRESA" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" required />
						 @endif
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>Cargo:</b></font></label>
						 @if(old('val8') == "on")
						  <input class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" required />
						 @else
						  <input disabled class="form-control form-control-sm" placeholder="CARGO" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" required />
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>Data Início:</b></font></label>
						 @if(old('val8') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" required />
						 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" required />
						 @endif
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>Data Fim:</b></font></label>
						 @if(old('val8') == "on")
						  <input class="form-control form-control-sm" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" required />
						 @else
						  <input disabled class="form-control form-control-sm" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" required />
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>Suas Atribuições:</b></font></label>
						 @if(old('val8') == "on")
						  <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required></textarea>
						 @else
						  <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required></textarea>
						 @endif
						 <font size="2"> Restam: <span class="caracteres">300 </span> caracteres. </font><br>
					   </div> 
					   <div class="col"> 
						<label for="inputState" class="form-label"><font size="2"> <b>CTPS Ou Contra Cheque (.doc, .docx e .pdf)</b></font></label>
						 @if(old('val8') == "on")
						  <input class="form-control form-control-sm" type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps3_" name="arquivo_ctps3_" value="" maxlength="600"> 
						 @else
						  <input class="form-control form-control-sm" disabled type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
						  <input hidden class="form-control form-control-sm" type="text" id="arquivo_ctps3_" name="arquivo_ctps3_" value="" maxlength="600"> 
						 @endif
					   </div> 
					  </div>
					  <div class="row">
					  	<div class="col">
					     <center><strong><font size="2" color="red">ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</font></strong></center>
					   </div>
					  </div>
					</div>
				  </div>
				 </div>
				</div>
				
				<div class="tab-pane fade" id="tabs6">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>CURRÍCULO: (*campo obrigatório)</b></h6></center>
				    </div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b>Currículo:</b><font size="2" color="red"> <b>(Os arquivos permitidos são: .doc, .docx e .pdf)</b></font> <b>(*)</b></label>
						<input class="form-control form-control-sm" type="file" id="arquivo" name="arquivo" required maxlength="200" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b>Foto: </b><font size="2" color="red"> <b>(Foto 3x4)</b></font> <b>(*)</b></label>
						<input class="form-control form-control-sm" type="file" id="foto" name="foto" required maxlength="200" value="{{ old('foto') }}" />
					   </div>
					  </div>
					</div>
				  </div>
				 </div>
				 <br>
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>DISPONIBILIDADE: (*campos obrigatórios)</b></h6></center>
				    </div>
				 	<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><font size="2"> <b>POSSUI HABILITAÇÃO: (*)</b></font></label>
						 @if(old('val9') == "on")
						  <select disabled class="form-select form-select-sm" id="habilitacao" name="habilitacao" required>
						    <option value="">Selecione...</option> 
							@if(old('habilitacao')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							@if(old('habilitacao')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
						  </select>						  
						 @else
						  <select class="form-select form-select-sm" id="habilitacao" name="habilitacao" required>
						    <option value="">Selecione...</option> 
							@if(old('habilitacao')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							@if(old('habilitacao')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
						  </select>
						 @endif
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><font size="2"><b>DISPONIBILIDADE PARA QUAL PERÍODO: (*)</b></font></label>
						 @if(old('val9') == "on")
						  <select disabled class="form-select form-select-sm" id="periodo" name="periodo" required>
						    <option value="">Selecione...</option> 
							@if(old('periodo')=="periodo_integral")<option value="periodo_integral" selected>Disponibilidade para período integral</option>@else<option value="periodo_integral">Disponibilidade para período integral</option>@endif
							@if(old('periodo')=="periodo_noturno")<option value="periodo_noturno" selected>Disponibilidade para período noturno</option>@else<option value="periodo_noturno">Disponibilidade para período noturno</option>@endif
							@if(old('periodo')=="meio_periodo")<option value="meio_periodo" selected>Disponibilidade para meio período</option>@else<option value="meio_periodo">Disponibilidade para meio período</option>@endif
						  </select>						  
						 @else
						  <select class="form-select form-select-sm" id="periodo" name="periodo" required>
						    <option value="">Selecione...</option> 
						    @if(old('periodo')=="periodo_integral")<option value="periodo_integral" selected>Disponibilidade para período integral</option>@else<option value="periodo_integral">Disponibilidade para período integral</option>@endif
							@if(old('periodo')=="periodo_noturno")<option value="periodo_noturno" selected>Disponibilidade para período noturno</option>@else<option value="periodo_noturno">Disponibilidade para período noturno</option>@endif
							@if(old('periodo')=="meio_periodo")<option value="meio_periodo" selected>Disponibilidade para meio período</option>@else<option value="meio_periodo">Disponibilidade para meio período</option>@endif
						  </select>
						 @endif
					   </div>
				       <div class="col">
					    <label for="inputState" class="form-label"><font size="2"><b>DISPONIBILIDADE PARA MUDAR DE CIDADE: (*)</b></font></label>
						 @if(old('val9') == "on")
						  <select disabled class="form-select form-select-sm" id="outra_cidade" name="outra_cidade" required>
						    <option value="">Selecione...</option> 
							@if(old('outra_cidade')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							@if(old('outra_cidade')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
					      </select>					  
						 @else
						  <select class="form-select form-select-sm" id="outra_cidade" name="outra_cidade" required>
						    <option value="">Selecione...</option> 
						    @if(old('outra_cidade')=="nao")<option value="nao" selected>Não</option>@else<option value="nao">Não</option>@endif
							@if(old('outra_cidade')=="sim")<option value="sim" selected>Sim</option>@else<option value="sim">Sim</option>@endif
						  </select>
						 @endif
					   </div>
				      </div>
					  
					</div>
				  </div>
				 </div> <br>
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-body" style="background-color: white;">
				     <div class="row">
					  <div class="col">
					    <p align="center">
							<input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" onclick="validar()" value="SALVAR" id="Salvar" name="Salvar" /> 
						</p>
					  </div>
					 </div>
				    </div>
				  </div>
				 </div>
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