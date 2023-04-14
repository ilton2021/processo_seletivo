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
			  <br>
			  <form method="POST"  action="{{ route('validarCandidatoPCD', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id)) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 	<div class="tab-pane" id="tabs4">
				 <div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title" id="exampleModalLongTitle"><b>PCD:</b></h6></center>
				    </div>
					<div class="modal-body" style="background-color: white;">
					  <div class="row">
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Você quer se candidatar para a vaga como Pessoa com Deficiência?</font></b></label>
						<select id="deficiencia_status" name="deficiencia_status" class="form-select form-select-sm" onchange="habilitaDeficiencia('sim')" required>
						  <option value="" selected>Selecione...</option>
						  @if(old('deficiencia_status') == "nao")<option value="nao" selected>NÃO</option>@else<option value="nao">NÃO</option>@endif
						  @if(old('deficiencia_status') == "sim")<option value="sim" selected>SIM</option>@else<option value="sim">SIM</option>@endif
						</select>
					   </div>
					   <div class="col">
					    <label for="inputState" class="form-label"><b><font size="2">Especifique Sua Deficiência:</font></b></label>
						@if(old('deficiencia_status') == "" || old('deficiencia_status') == "nao")
						<select disabled id="deficiencia" name="deficiencia" class="form-select form-select-sm" required>
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
						<select id="deficiencia" name="deficiencia" class="form-select form-select-sm" required>
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
						<input class="form-control form-control-sm" placeholder="CID CORRESPONDENTE" type="text" id="cid" name="cid" value="{{ old('cid') }}" maxlength="255" required />
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
						 <input class="form-control form-control-sm" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" maxlength="600" value="{{ old('arquivo_deficiencia') }}" required> 
						 <input hidden class="form-control form-control-sm" type="text" id="arquivo_deficiencia_" name="arquivo_deficiencia_" maxlength="600" value=""> 
						 @endif
					 	 <br><p><b><font size="2" color="red">* Esse documento pode ser nos formatos: PNG, JPG, JPEG, DOC, DOCX ou PDF.</font></b></p>
					   </div>
					  </div>
				    </div>
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