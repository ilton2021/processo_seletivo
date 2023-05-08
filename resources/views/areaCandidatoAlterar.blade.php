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
  <script src="{{ asset('js/validacaoAlteracao.js') }}"> </script>
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
				document.getElementById('grau_parentesco').disabled = false;
				document.getElementById('grau_parentesco_nome').disabled = false;
			} else {
				document.getElementById('parentesco_nome').disabled = true;
				document.getElementById('grau_parentesco').disabled = true;
				document.getElementById('grau_parentesco_nome').disabled = true;
			}
		}

		function habilitaTrabalhoOss(valor) {
			var x = document.getElementById('trabalha_oss').value;
			if(x == "sim") {
				document.getElementById('trabalha_oss2').disabled = false;
				document.getElementById('rpa').disabled 		  = false;
			} else {
				document.getElementById('trabalha_oss2').disabled = true;
				document.getElementById('rpa').disabled 		  = true;
			}
		}

		function habilitaTrabalhoRPA(valor) {
			var x = document.getElementById('rpa').value; 
			if(x == "sim") {
				document.getElementById('rpa_setor').disabled = false;
			} else { 
				document.getElementById('rpa_setor').disabled = true;
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
										<h5 class="display-8"><p style="align: center"><br><b>INSCRIÇÃO </p> <p style="align: center">  PROCESSO SELETIVO: {{ $processo[0]->nome }}</b> <br><img id="hcp" width="120px;" style="margin-top: 5px;" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></p></td></h5>
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
				  <td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processo[0]->nome }}. </strong></td>
				  <td>
					<a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="margin-top: 5px; color: #FFFFFF;" class="btn btn-warning btn-sm"> VOLTAR <i class="fas fa-undo-alt"></i></a>
				  </td>
				</tr>
			  </table>
			  <table class="table table-borderless" border="0" width="500" id="inicio">
				<tr>
				  <td align="center"><b>ALTERAR INFORMAÇÕES:</b></td>
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
			  <?php $c = str_replace(' ','',$processo[0]->nome); ?>
			  <br><br>

			  <form method="POST" action="{{ route('updateAreaCandidatoAlterar', array($unidade[0]->id,$processo[0]->id,$user[0]->id)) }}">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">


			  <div id="tabs" class="nav-tabs">
			   <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist" style="margin-left: 300px;">
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
					<a class="nav-link" data-toggle="pill" href="#tabs4" role="tab" aria-selected="false">DISPONIBILIDADE</a>
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
					   <div class="col"> <?php $a = 0; ?>
						<label for="inputState" class="form-label"><b><font size="2">Como você soube dessa vaga? (*)</font></b></label>
						 <select id="como_soube" name="como_soube" class="form-select form-select-sm" onchange="habilitaComoSoube('sim')">
						 	<option value="" selected >Selecione...</option>
							<?php if($user[0]->como_soube == "google"){ $a = 1; ?><option value="google" selected>Google</option><?php } else { ?><option value="google">Google</option><?php } ?>
							<?php if($user[0]->como_soube == "facebook"){ $a = 1; ?><option value="facebook" selected>Facebook</option><?php } else { ?><option value="facebook">Facebook</option><?php } ?>
							<?php if($user[0]->como_soube == "instragram"){ $a = 1; ?><option value="instragram" selected>Instagram</option><?php } else { ?><option value="instragram">Instagram</option><?php } ?>
							<?php if($user[0]->como_soube == "whatsapp"){ $a = 1; ?><option value="whatsapp" selected>WhatsApp</option><?php } else { ?><option value="whatsapp">WhatsApp</option><?php } ?>
							<?php if($user[0]->como_soube == "indicacao"){ $a = 1; ?><option value="indicacao" selected>Indicação de parentes ou amigos</option><?php } else { ?><option value="indicacao">Indicação de parentes ou amigos</option><?php } ?>
							<?php if($user[0]->como_soube == "sites"){ $a = 1; ?><option value="sites" selected>Sites de busca de empregos</option><?php } else { ?><option value="sites">Sites de busca de empregos</option><?php } ?>
							<?php if($user[0]->como_soube == "outras_redes"){ $a = 1; ?><option value="outras_redes" selected>Outras redes sociais</option><?php } else { ?><option value="outras_redes">Outras redes sociais</option><?php } ?>
							<?php if($a == 0){ ?><option value="outros" selected>Outros</option><?php } else { ?><option value="outros">Outros</option><?php } ?>
						 </select>
						 <?php if($a == 0){ ?>
						  <input class="form-control form-control-sm" type="text" id="como_soube2" name="como_soube2" value="<?php echo $user[0]->como_soube; ?>" required maxlength="50" />
						 <?php } else { ?>
						  <input class="form-control form-control-sm" disabled type="text" id="como_soube2" name="como_soube2" value="{{ old('como_soube2') }}" required maxlength="50" />
						 <?php } ?>
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Você tem algum parente que trabalhe em alguma unidade gerida pelo HCP Gestão?</font></b></label>
						 <select id="parentesco" name="parentesco" class="form-select form-select-sm" onchange="habilitaParente('sim')">
						 	<option value="">Selecione...</option>  
							 <?php if($user[0]->parentesco == "sim") { ?><option value="sim" selected>Sim</option><?php } else { ?> <option value="sim">Sim</option><?php } ?>
							 <?php if($user[0]->parentesco == "nao") { ?><option value="nao" selected>Não</option><?php } else { ?> <option value="nao">Não</option><?php } ?>
							 <?php if($user[0]->parentesco == "nao_responder") { ?><option value="nao_responder" selected>Prefiro não responder</option><?php } else { ?> <option value="nao_responder">Prefiro não responder</option><?php } ?>
						 </select>
						 <?php if($user[0]->parentesco == "sim") { ?>
							<select class="form-select form-select-sm" id="parentesco_nome" name="parentesco_nome" required> 
						 <?php } else { ?>
							<select disabled class="form-select form-select-sm" id="parentesco_nome" name="parentesco_nome" required> 
						 <?php } ?>
						 <option value="">Selecione...</option>
						   @foreach($unidades as $unidade)
						    <?php if($unidade->id == $user[0]->parentesco_nome) {  ?>
							 <option value="<?php echo $unidade->id; ?>" selected>{{ $unidade->nome }}</option>
							<?php } else { ?>
							 <option value="<?php echo $unidade->id; ?>">{{ $unidade->nome }}</option>
							<?php } ?>
						   @endforeach
						  </select>
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Você trabalha ou trabalhou em alguma unidade da OSS HCP Gestão? (*)</font></b></label>
						 <select id="trabalha_oss" name="trabalha_oss" class="form-select form-select-sm" onchange="habilitaTrabalhoOss('sim')">
						 	<option value="">Selecione...</option>
							 <?php if($user[0]->trabalha_oss == "sim") { ?><option value="sim" selected>Sim</option><?php } else { ?><option value="sim">Sim</option><?php } ?>	
							 <?php if($user[0]->trabalha_oss == "nao") { ?><option value="nao" selected>Não</option><?php } else { ?><option value="nao">Não</option><?php } ?>
							 <?php if($user[0]->trabalha_oss == "nao_responder") { ?><option value="nao_responder" selected>Prefiro não responder</option><?php } else { ?><option value="nao_responder">Prefiro não responder</option><?php } ?>
						 </select>
						 <?php if($user[0]->trabalha_oss == "sim") { ?>
							<select class="form-select form-select-sm" id="trabalha_oss2" name="trabalha_oss2" required> 
						 <?php } else { ?>
							<select disabled class="form-select form-select-sm" id="trabalha_oss2" name="trabalha_oss2" required> 
						 <?php } ?>	
						   <option value="">Selecione...</option>
						   @foreach($unidades as $unidade)
						    <?php if($unidade->id == $user[0]->trabalha_oss2) {  ?>
							 <option value="<?php echo $unidade->id; ?>" selected>{{ $unidade->nome }}</option>
							<?php } else { ?>
							 <option value="<?php echo $unidade->id; ?>">{{ $unidade->nome }}</option>
							<?php } ?>
						   @endforeach
						  </select>
						  <label for="inputState" class="form-label"><b><font size="2">Trabalha ou Trabalhou como RPA?</font></b></label>
						  <?php if($user[0]->trabalha_oss == "sim") { ?>
						  <select class="form-select form-select-sm" id="rpa" name="rpa" required onchange="habilitaTrabalhoRPA('sim')"> 
						   <option value="">Selecione...</option>
						    <?php if($user[0]->rpa == "sim") { ?>
							 <option value="sim" selected>Sim</option>
							 <option value="nao">Não</option>
							<?php } else { ?>
							 <option value="sim">Sim</option>
							 <option value="nao" selected>Não</option>
							<?php } ?>
						 </select>
						 <?php } else { ?>
						 <select disabled class="form-select form-select-sm" id="rpa" name="rpa" required onchange="habilitaTrabalhoRPA('sim')"> 
						   <option value="">Selecione...</option>
						    <?php if($user[0]->rpa == "sim") { ?>
							 <option value="sim" selected>Sim</option>
							 <option value="nao">Não</option>
							<?php } else { ?>
							 <option value="sim">Sim</option>
							 <option value="nao" selected>Não</option>
							<?php } ?>
						 </select>
						 <?php } ?>
						 <?php if($user[0]->trabalha_oss == "sim" && $user[0]->rpa == "sim") { ?>
						  <input class="form-control form-control-sm" placeholder="Qual Setor?" type="text" id="rpa_setor" name="rpa_setor" value="<?php echo $user[0]->rpa_setor; ?>" required maxlength="50" />
						 <?php } else { ?>
						  <input class="form-control form-control-sm" placeholder="Qual Setor?" disabled type="text" id="rpa_setor" name="rpa_setor" value="<?php echo $user[0]->rpa_setor; ?>" required maxlength="50" />
						 <?php } ?>
					   </div>
					   <div class="col"> 
					   <label for="inputState" class="form-label"><b><font size="2">Grau de Parentesco? (*)</font></b></label>
					      <?php if($user[0]->parentesco == "sim") { ?>
					   	   <select class="form-select form-select-sm" id="grau_parentesco" name="grau_parentesco" onchange="habilitaParente('sim')">
						 	<option value="">Selecione...</option>
							 <?php if($user[0]->grau_parentesco=="irmao") { ?><option value="irmao" selected>Irmã(o)</option><?php } else { ?><option value="irmao">Irmã(o)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="primo") { ?><option value="primo" selected>Primo(a)</option><?php } else { ?><option value="primo">Primo(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="mae") { ?><option value="mae" selected>Mãe</option><?php } else { ?><option value="mae">Mãe</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="pai") { ?><option value="pai" selected>Pai</option><?php } else { ?><option value="pai">Pai</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="cunhado") { ?><option value="cunhado" selected>Cunhado(a)</option><?php } else { ?><option value="cunhado">Cunhado(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="sogro") { ?><option value="sogro" selected>Sogro(a)</option><?php } else { ?><option value="sogro">Sogro(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="tio") { ?><option value="tio" selected>Tio(a)</option><?php } else { ?><option value="tio">Tio(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="conjugue") { ?><option value="conjugue" selected>Conjuguê</option><?php } else { ?><option value="conjugue">Conjuguê</option><?php } ?>
						 </select>
						 <input class="form-control form-control-sm" type="text" id="grau_parentesco_nome" name="grau_parentesco_nome" value="<?php echo $user[0]->grau_parentesco_nome; ?>" maxlength="100" />
						 <?php } else { ?>
						  <select disabled class="form-select form-select-sm" id="grau_parentesco" name="grau_parentesco" onchange="habilitaParente('sim')">
						 	<option value="">Selecione...</option>
							 <?php if($user[0]->grau_parentesco=="irmao") { ?><option value="irmao" selected>Irmã(o)</option><?php } else { ?><option value="irmao">Irmã(o)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="primo") { ?><option value="primo" selected>Primo(a)</option><?php } else { ?><option value="primo">Primo(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="mae") { ?><option value="mae" selected>Mãe</option><?php } else { ?><option value="mae">Mãe</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="pai") { ?><option value="pai" selected>Pai</option><?php } else { ?><option value="pai">Pai</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="cunhado") { ?><option value="cunhado" selected>Cunhado(a)</option><?php } else { ?><option value="cunhado">Cunhado(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="sogro") { ?><option value="sogro" selected>Sogro(a)</option><?php } else { ?><option value="sogro">Sogro(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="tio") { ?><option value="tio" selected>Tio(a)</option><?php } else { ?><option value="tio">Tio(a)</option><?php } ?>
							 <?php if($user[0]->grau_parentesco=="conjugue") { ?><option value="conjugue" selected>Conjuguê</option><?php } else { ?><option value="conjugue">Conjuguê</option><?php } ?>
						  </select>
						 <input disabled class="form-control form-control-sm" type="text" id="grau_parentesco_nome" name="grau_parentesco_nome" value="<?php echo $user[0]->grau_parentesco_nome; ?>" maxlength="100" />		
						 <?php } ?>
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
						<input class="form-control form-control-sm" type="text" id="nome_social" name="nome_social" value="<?php echo $user[0]->nome_social; ?>" required maxlength="100" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Qual o pronome: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="pronome" name="pronome" required>
							<option value="">Selecione...</option>	  
							<?php if($user[0]->pronome == "ela_dela") { ?><option value="ela_dela" selected>Ela/Dela</option><?php } else { ?><option value="ela_dela">Ela/Dela</option><?php } ?>
							<?php if($user[0]->pronome == "ele_dele") { ?><option value="ele_dele" selected>Ele/Dele</option><?php } else { ?><option value="ele_dele">Ele/Dele</option><?php } ?>
							<?php if($user[0]->pronome == "nao_responder") { ?><option value="nao_responder" selected>Prefiro não responder</option><?php } else { ?><option value="nao_responder">Prefiro não responder</option><?php } ?>
						 </select>
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Qual sua identidade de gênero: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="genero" name="genero" required>
							<option value="">Selecione...</option>	  
							<?php if($user[0]->genero == "assexual") { ?><option value="assexual" selected>Assexual</option><?php } else { ?><option value="assexual">Assexual</option><?php } ?>
							<?php if($user[0]->genero == "bissexual") { ?><option value="bissexual" selected>Bissexual</option><?php } else { ?><option value="bissexual">Bissexual</option><?php } ?>
							<?php if($user[0]->genero == "heterossexual") { ?><option value="heterossexual" selected>Heterossexual</option><?php } else { ?><option value="heterossexual">Heterossexual</option><?php } ?>
							<?php if($user[0]->genero == "homossexual") { ?><option value="homossexual" selected>Homossexual</option><?php } else { ?><option value="homossexual">Homossexual</option><?php } ?>
							<?php if($user[0]->genero == "pansexual") { ?><option value="pansexual" selected>Pansexual</option><?php } else { ?><option value="pansexual">Pansexual</option><?php } ?>
							<?php if($user[0]->genero == "nao_responder") { ?><option value="nao_responder" selected>Prefiro não responder</option><?php } else { ?><option value="nao_responder">Prefiro não responder</option><?php } ?>
				 		 </select>
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Qual sua cor ou raça: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="cor" name="cor" required>
							<option value="">Selecione...</option>	
							<?php if($user[0]->cor == "amarela") { ?><option value="amarela" selected>Amarela</option><?php } else { ?><option value="amarela">Amarela</option><?php } ?>
							<?php if($user[0]->cor == "branca") { ?><option value="branca" selected>Branca</option><?php } else { ?><option value="branca">Branca</option><?php } ?>
							<?php if($user[0]->cor == "indigena") { ?><option value="indigena" selected>Indígena</option><?php } else { ?><option value="indigena">Indígena</option><?php } ?>
							<?php if($user[0]->cor == "parda") { ?><option value="parda" selected>Parda</option><?php } else { ?><option value="parda">Parda</option><?php } ?>
							<?php if($user[0]->cor == "preta") { ?><option value="preta" selected>Preta</option><?php } else { ?><option value="preta">Preta</option><?php } ?>
							<?php if($user[0]->cor == "nao_responder") { ?><option value="nao_responder" selected>Prefiro não responder</option><?php } else { ?><option value="nao_responder">Prefiro não responder</option><?php } ?>
						 </select>
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> <br>
						<label for="inputState" class="form-label"><font size="2"><b> <p align="justify">Eu concordo em compartilhar esses dados com o HCP Gestão para que possam ser realizadas ações voltadas à promoção da diversidade: (*) </p></b></font></label>
						<select id="aceito" name="aceito" class="form-select form-select-sm">
						  <option value="0" selected>Selecione...</option>
						  <?php if($user[0]->aceito == "nao") { ?><option value="nao" selected>Não</option><?php } else { ?><option value="nao">Não</option><?php } ?>
						  <?php if($user[0]->aceito == "sim") { ?><option value="sim" selected>Sim</option><?php } else { ?><option value="sim">Sim</option><?php } ?>
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
						<input class="form-control form-control-sm" placeholder="NOME COMPLETO" type="text" id="nome" name="nome" value="<?php echo $user[0]->nome; ?>" required maxlength="150" />
					   </div>
					   <div class="col">
						<label for="inputState" class="form-label"><b><font size="2">E-mail: (*)</font></b></label>
						<input id="email" type="email" class="form-control form-control-sm" name="email" value="<?php echo $user[0]->email; ?>" required placeholder="E-MAIL" maxlength="255">
					   </div>
					   <div class="col">  
					    <label for="inputState" class="form-label"><b><font size="2">CPF: (*)</font></b></label>
					    <input id="cpf" type="text" maxlength="11" class="form-control form-control-sm" name="cpf" max="11" value="<?php echo $user[0]->cpf; ?>" required placeholder="APENAS NÚMEROS" autocomplete="cpf" autofocus /> 
					   </div>
					  </div>
					  <div class="row"> 
						<div class="col"> 
						 <label for="inputState" class="form-label"><b><font size="2">Selecione a VAGA: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="vaga" name="vaga" required>
						    @if(!empty($vagas))
								@foreach($vagas as $vaga)
								 <?php if($user[0]->vaga == $vaga->nome) { ?>
								  <option value="<?php echo $vaga->nome ?>" selected>{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 <?php } else { ?> 
								  <option value="<?php echo $vaga->nome ?>">{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
								 <?php } ?>
								@endforeach
							@endif
						 </select>
						</div>
						<div class="col"> 
						  <label for="inputState" class="form-label"><b><font size="2">Celular: (*)</font></b></label>
						  <input class="form-control form-control-sm" placeholder="Ex: (81)98888-3333" type="text" maxlength="14" id="telefone" name="telefone" value="<?php echo $user[0]->telefone; ?>" required />
						</div>
						<div class="col"> 
 						  <label for="inputState" class="form-label"><font size="2">Telefone Fixo:</font></label>
						  <input class="form-control form-control-sm" placeholder="Ex: (81)2222-3333" type="text" maxlength="13" id="fone_fixo" name="fone_fixo" value="<?php echo $user[0]->telefone_fixo; ?>" />
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
						 <input class="form-control form-select-sm" placeholder="CIDADE" type="text" id="lugar_nascimento" name="lugar_nascimento" value="<?php echo $user[0]->lugar_nascimento; ?>" required maxlength="100" />
					   </div>
					   <div class="col"> 
					     <label for="inputState" class="form-label"><b><font size="2">Estado: (*)</font></b></label>
						 <select class="form-select form-select-sm" id="estado_nascimento" name="estado_nascimento" required>
						   <option value="">Selecione...</option>
						    @foreach($estados as $estado)
							 <?php if($estado->nome == $user[0]->estado_nascimento) { ?>
							  <option value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
							 <?php } else { ?>
							  <option value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
							 <?php } ?>
							@endforeach
						 </select>
					   </div> 
					  </div>
					  <div class="row">
					   <div class="col"> 
					     <label for="inputState" class="form-label"><b><font size="2">País: (*)</font></b></label>
						 <input class="form-control form-control-sm" placeholder="PAÍS" type="text" id="cidade_nascimento" name="cidade_nascimento" value="<?php echo $user[0]->cidade_nascimento; ?>" required maxlength="50" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Data De Nascimento: (*)</font></b></label>
						<input class="form-control form-control-sm" type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $user[0]->data_nascimento; ?>" required />
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
						<input class="form-control form-control-sm" placeholder="CEP" type="text" id="cep" name="cep" value="<?php echo $user[0]->cep; ?>" required maxlength="30" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Rua: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="RUA" type="text" id="rua" name="rua" value="<?php echo $user[0]->rua; ?>" required maxlength="100" />
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Número: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="NÚMERO" type="text" id="numero" name="numero" value="<?php echo $user[0]->numero; ?>" required maxlength="10" />
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Bairro: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="<?php echo $user[0]->bairro; ?>" required maxlength="100" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Cidade: (*)</font></b></label>
						<input class="form-control form-control-sm" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="<?php echo $user[0]->cidade; ?>" required maxlength="100" />
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Estado: (*)</font></b></label>
						 <select id="estado" name="estado" class="form-select form-select-sm">
						 	<option value="" selected>Selecione...</option>
							 @foreach($estados as $estado)
							  <?php if($estado->nome == $user[0]->estado) { ?>
							    <option value="<?php echo $estado->nome; ?>" selected>{{ $estado->nome }}</option>
							  <?php } else { ?>
							    <option value="<?php echo $estado->nome; ?>">{{ $estado->nome }}</option>
							  <?php } ?>
						     @endforeach
						 </select>
					   </div>
					  </div>
					  <div class="row">
					    <div class="col">
						 <label for="inputState" class="form-label"><font size="2">Complemento:</font></label>
						 <input class="form-control form-control-sm" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" value="<?php echo $user[0]->complemento; ?>" maxlength="200" />
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
						    <?php if($user[0]->escolaridade == "Ensino Medio Completo") { ?><option value="Ensino Medio Completo" selected>Ensino Médio Completo</option><?php } else { ?><option value="Ensino Medio Completo">Ensino Médio Completo</option><?php } ?>
							<?php if($user[0]->escolaridade == "Superior Incompleto") { ?><option value="Superior Incompleto" selected>Superior Incompleto</option><?php } else { ?><option value="Superior Incompleto">Superior Incompleto</option><?php } ?>
							<?php if($user[0]->escolaridade == "Superior Completo") { ?><option value="Superior Completo" selected>Superior Completo</option><?php } else { ?><option value="Superior Completo">Superior Completo</option><?php } ?>
							<?php if($user[0]->escolaridade == "Mestrado Completo") { ?><option value="Mestrado Completo" selected>Mestrado Completo</option><?php } else { ?><option value="Mestrado Completo">Mestrado Completo</option><?php } ?>
							<?php if($user[0]->escolaridade == "Doutorado Completo") { ?><option value="Doutorado Completo" selected>Doutorado Completo</option><?php } else { ?><option value="Doutorado Completo">Doutorado Completo</option><?php } ?>
							<?php if($user[0]->escolaridade == "Pos graduacao") { ?><option value="Pos graduacao" selected>Pós-graduação</option><?php } else { ?><option value="Pos graduacao">Pós-graduação</option><?php } ?>
							<?php if($user[0]->escolaridade == "Residencia") { ?><option value="Residencia" selected>Residência</option><?php } else { ?><option value="Residencia">Residência</option><?php } ?>
						 </select>
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Status Da Escolaridade: (*)</font></b></label>
						 <select id="status_escolaridade" name="status_escolaridade" class="form-select form-select-sm">
						    <option value="">Selecione..</option>  
						    <?php if($user[0]->status_escolaridade == "Em Andamento") { ?><option value="Em Andamento" selected>Em Andamento</option><?php } else { ?> <option value="Em Andamento">Em Andamento</option><?php } ?>
							<?php if($user[0]->status_escolaridade == "Trancado") { ?><option value="Trancado" selected>Trancado</option><?php } else { ?> <option value="Trancado">Trancado</option><?php } ?>
							<?php if($user[0]->status_escolaridade == "Concluido") { ?><option value="Concluido" selected>Concluído</option><?php } else { ?> <option value="Concluido">Concluído</option><?php } ?>
						 </select>
					   </div>
					  </div>
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Formação Em Qual Curso? (*)</font></b></label>
					    <textarea class="form-control form-control-sm" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="<?php echo $user[0]->formacao; ?>" maxlength="150" required><?php echo $user[0]->formacao; ?></textarea>
					   </div>
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Quais Cursos Realizou? (*)</font></b></label>
					    <textarea class="form-control form-control-sm" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="<?php echo $user[0]->cursos; ?>" maxlength="500" required><?php echo $user[0]->cursos; ?></textarea>
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
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>DISPONIBILIDADE: (*campos obrigatórios)</b></h6></center>
				    </div>
				 	<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><font size="2"> <b>POSSUI REGISTRO PROFISSIONAL:</b></font></label>
						<select class="form-select form-select-sm" id="habilitacao" name="habilitacao">
						    <option value="">Selecione...</option> 
							<?php if($user[0]->habilitacao=="crm") { ?><option value="crm" selected>CRM</option><?php } else { ?><option value="crm">CRM</option><?php } ?>
							<?php if($user[0]->habilitacao=="crefito") { ?><option value="crefito" selected>CREFITO</option><?php } else { ?><option value="crefito">CREFITO</option><?php } ?>
							<?php if($user[0]->habilitacao=="crc") { ?><option value="crc" selected>CRC</option><?php } else { ?><option value="crc">CRC</option><?php } ?>
							<?php if($user[0]->habilitacao=="corem") { ?><option value="corem" selected>COREM</option><?php } else { ?><option value="corem">COREM</option><?php } ?>
							<?php if($user[0]->habilitacao=="crp") { ?><option value="crp" selected>CRP</option><?php } else { ?><option value="crp">CRP</option><?php } ?>
							<?php if($user[0]->habilitacao=="crn") { ?><option value="crn" selected>CRN</option><?php } else { ?><option value="crn">CRN</option><?php } ?>
							<?php if($user[0]->habilitacao=="crf") { ?><option value="crf" selected>CRF</option><?php } else { ?><option value="crf">CRF</option><?php } ?>
							<?php if($user[0]->habilitacao=="cress") { ?><option value="cress" selected>CRESS</option><?php } else { ?><option value="cress">CRESS</option><?php } ?>
							<?php if($user[0]->habilitacao=="crea") { ?><option value="crea" selected>CREA</option><?php } else { ?><option value="crea">CREA</option><?php } ?>
						  </select>					  
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><font size="2"><b>DISPONIBILIDADE PARA QUAL PERÍODO: (*)</b></font></label>
						  <select class="form-select form-select-sm" id="periodo" name="periodo" required>
						    <option value="">Selecione...</option> 
							<?php if($user[0]->periodo_integral == "periodo_integral") { ?><option value="periodo_integral" selected>Disponibilidade para período integral</option><?php } else { ?><option value="periodo_integral">Disponibilidade para período integral</option><?php } ?>
							<?php if($user[0]->periodo_noturno == "periodo_noturno") { ?><option value="periodo_noturno" selected>Disponibilidade para período noturno</option><?php } else { ?><option value="periodo_noturno">Disponibilidade para período noturno</option><?php } ?>
							<?php if($user[0]->meio_periodo == "meio_periodo") { ?><option value="meio_periodo" selected>Disponibilidade para meio período</option><?php } else { ?><option value="meio_periodo">Disponibilidade para meio período</option><?php } ?>
						  </select>						  
					   </div>
				       <!--div class="col">
					    <label for="inputState" class="form-label"><font size="2"><b>DISPONIBILIDADE PARA MUDAR DE CIDADE: (*)</b></font></label>
						  <select class="form-select form-select-sm" id="outra_cidade" name="outra_cidade" required>
						    <option value="">Selecione...</option> 
							<?php if($user[0]->outra_cidade == "nao") { ?><option value="nao" selected>Não</option><?php } else { ?><option value="nao">Não</option><?php } ?>
							<?php if($user[0]->outra_cidade == "sim") { ?><option value="sim" selected>Sim</option><?php } else { ?><option value="sim">Sim</option><?php } ?>
					      </select>					  
					   </div-->
				      </div>
					</div>
				  </div>
				 </div> <br>
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-body" style="background-color: white;">
				     <div class="row">
					  <div class="col">
					    <p align="center"><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" onclick="validar()" value="SALVAR" id="Salvar" name="Salvar" /> </p>
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