<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
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
		var i = document.getElementById("celular").value.length; //aqui pega o tamanho do input
		if (i === 0)
		  document.getElementById("celular").value = document.getElementById("celular").value + "(";
		if (i === 3)
		  document.getElementById("celular").value = document.getElementById("celular").value + ")";
		if (i === 9) //aqui faz a divisoes colocando um ponto no terceiro e setimo indice
		  document.getElementById("celular").value = document.getElementById("celular").value + "-";
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
	$("#cpf").keyup(function() {
	     $("#cpf").val(this.value.match(/[0-11]*/));
	});
	
  </script>
  <script type="text/javascript">
		function desabilitar(valor) {
		  var status = document.getElementById('exp1').checked;
		  
		  if (status == true) {
			document.getElementById('dadosExp2').style.display = 'block';
			document.getElementById('Salvar1').style.display = 'none';
		  } else {
			document.getElementById('dadosExp2').style.display = 'none';
			document.getElementById('Salvar1').style.display = 'block';
		  }
		}
		
		function desabilitar2(valor) {
		  var status = document.getElementById('exp_2').checked;
		  
		  if (status == true) {
			document.getElementById('dadosExp3').style.display = 'block';
			document.getElementById('Salvar2').style.display = 'none';
		  } else {
			document.getElementById('dadosExp3').style.display = 'none';
			document.getElementById('Salvar2').style.display = 'block';
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
										<h5 class="display-8"><p style="align: center"> <b>INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos->nome }}</b> </p><img id="hcp" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></td></h5>
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
			  
			  @if($a == 1)
			  <table class="table table-borderless" border="0" width="500" id="inicio">
				<tr>
				<td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processos->nome }}. </strong></td>
				</tr>
			  </table>
			  @endif
			  @if($errors->any())
			  <div class="alert alert-success">
				<ul>
					@foreach ($errors->all() as $error)
					  <li>{{ $error }}</li>
					@endforeach
				</ul>
			  </div>
		 	  @endif 
			  <table class="table table-borderless" border="0" width="100" bordercolor=DCDCDC id="dadosCpf" name="dadosCpf">
			   <form action="{{ route('validar', array($unidade->id, $processos->id, $a)) }}" method="POST" enctype="multipart/form-data">	
			   <input type="hidden" name="_token" value="{{ csrf_token() }}">
				@if($a == 1)
				<tr>
				  <td colspan="2" align="center"><strong> Digite seu cpf para iniciar o cadastro. Vamos lá? </strong></td>
			    </tr>
				@endif
				
				 @if($a == 1) 
				<tr>
				<td>
				 <center>
				  <input id="cpf" style="width:300px" type="text" maxlength="11" class="form-control" name="cpf" max="11" value="{{ old('cpf') }}" required placeholder="APENAS NÚMEROS" autocomplete="cpf" autofocus>
			      <input type="submit" class="btn btn-success" style="margin-top: 10px;" value="INICIAR" id="Salvar" name="Salvar" /> 
				 </center>
				 </td>
				</tr>
				 @else 
					 
			     @endif
				
			  </table>
		</div>

			  <?php $c = str_replace(' ','',$processos->nome); ?>
			  <input hidden type="text" id="processo_nome" name="processo_nome" value="{{ $c }}" />
			  @if($a == 2 || $a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
				 <input hidden id="cpf" type="text" class="form-control" name="cpf" value="<?php echo $cpf; ?>" required placeholder="CPF..." autocomplete="cpf" readonly="true">
			  @endif	
				
			  @if($a == 2)
			  <table class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosVaga" name="dadosVaga">
			   <tr>
				</tr>
				<tr>
				<td> <center>
				 <select class="form-control" id="vaga" name="vaga" style="width: 400px">
				   @if(!empty($vagas))
				    @foreach($vagas as $vaga)
				       <option id="vaga" name="vaga" value="<?php echo $vaga->id ?>">{{ $vaga->nome }} / {{ $vaga->carga_horaria }}</option>	 
				    @endforeach
				   @endif
				 </select>
				 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> 	
				</center> </td>
			   </tr>
			  </table>
			  @endif
	  
			  @if($a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			    <input hidden type="text" id="vaga" name="vaga" value="<?php echo $vaga ?>" readonly="true">
			  @endif
			  
			  @if($a == 3)
			<center>  <table style= "margin-left:35px;" class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosPessoais" name="dadosPessoais">
			    <tr>
				</tr>
				<tr>
				 <td>    <span class="input-group-text">Nome Completo:</span></td>
				 <td>
				   <input class="form-control" placeholder="nome"  type="text" id="nome" name="nome" value="{{ old('nome') }}" required maxlength="150" />
				 </td>
				 <td></td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> E-mail Ativo e Frequente:</span> </td>
				 <td>
				   <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="email" autocomplete="email" maxlength="100">
					@error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
				 </td><td></td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Telefone Celular:</span> </td>
				 <td>
				   <input class="form-control" placeholder="Ex: (81)98888-3333" type="text" maxlength="14" id="celular" name="celular" value="{{ old('celular') }}" required />
				 </td><td></td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Telefone Fixo:</span> </td>
				 <td>
				   <input class="form-control" placeholder="Ex: (81)2222-3333" type="text" id="fone_fixo" maxlength="13" name="fone_fixo" value="{{ old('fone_fixo') }}" />
				 </td>
			 	 
				</tr>
			  </table></center>
			  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>

			  @endif
			  
			  @if($a == 4 || $a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="nome" name="nome" value="<?php echo $nome ?>" required />
			   <input hidden type="text" id="email" name="email" value="<?php echo $email ?>" required />
			   <input hidden type="text" id="celular" name="celular" value="<?php echo $celular ?>" required />
			   <input hidden type="text" id="fone_fixo" name="fone_fixo" value="<?php echo $fone_fixo ?>" required />
			  @endif
			
			@if($a == 4)		
			<table  style= "margin-left:35px;" class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosPessoais2" name="dadosPessoais2">  
			    <tr>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Cidade:</span> </td>
				 <td>
				   <input class="form-control" placeholder="Cidade" type="text" id="cidade_nasc" name="cidade_nasc" value="{{ old('cidade_nasc') }}" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td> <span class="input-group-text">Estado:</span> </td>
				 <td>
				   <select class="form-control" id="estado_nasc" name="estado_nasc">
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
				 <td></td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> País:</span> </td>
				 <td>
				   <input class="form-control" placeholder="País" type="text" id="naturalidade" name="naturalidade" value="{{ old('naturalidade') }}" required maxlength="50" />
				 </td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Data de Nascimento: </span></td>
				 <td>
				   <input class="form-control" type="date" id="data_nasc" name="data_nasc" value="{{ old('data_nasc') }}" required />
				 </td>
				 
				</tr>

			</table>
			<center> <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>

			@endif
			
			  @if($a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="naturalidade" name="naturalidade" value="<?php echo $naturalidade ?>" required />
			   <input hidden type="text" id="estado_nasc" name="estado_nasc" value="<?php echo $estado_nasc ?>" required />
			   <input hidden type="text" id="cidade_nasc" name="cidade_nasc" value="<?php echo $cidade_nasc ?>" required />
			   <input hidden type="date" id="data_nasc" name="data_nasc" value="<?php echo $data_nasc ?>" required />
			  @endif
			
			@if($a == 5)
			<table id="tabelacep" class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosResidencia">
				
				<tr>
				 <td style="width:200px;"><span class="input-group-text"> Qual CEP:</span> </td>
				 <td>
				 <input style="width: 250px;" class="form-control" placeholder="CEP" type="text" id="cep" name="cep" value="{{ old('cep') }}" required maxlength="30" />
				 </td>
				 <td>
				 <span class="input-group-text"> Qual Rua:</span>
				</td>
				<td>
				   <input style="width:250px;" class="form-control" placeholder="RUA" type="text" id="rua" name="rua" value="{{ old('rua') }}" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Qual Número:</span> </td>
				 <td>
				   <input style="width:250px;" class="form-control" placeholder="NÚMERO" type="text" id="numero" name="numero" value="{{ old('numero') }}" required maxlength="10" />
				 </td>
				 <td><span class="input-group-text"> Qual Bairro:</span> </td>
				 <td>
				   <input style="width:250px;" class="form-control" placeholder="BAIRRO" type="text" id="bairro" name="bairro" value="{{ old('bairro') }}" required maxlength="100" />
				 </td>
				</tr>
				
				<tr>
				 <td><span class="input-group-text"> Qual Cidade:</span> </td>
				 <td>
				   <input style="width:250px;" class="form-control" placeholder="CIDADE" type="text" id="cidade" name="cidade" value="{{ old('cidade') }}" required maxlength="100" />
				 </td>
				 <td><span class="input-group-text"> Qual Estado:</span> </td>
				 <td>
				   <input style="width:250px;" class="form-control" placeholder="ESTADO" type="text" id="estado" name="estado" value="{{ old('estado') }}" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td ><span class="input-group-text"> Complemento: </td>
				 <td>
				   <input style="width:250px;" class="form-control" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" value="{{ old('complemento') }}" maxlength="200" />
				   <td style="width:250px;"><span><b>Ex: Bloco C, AP - 203</b></span> </td>
 				</td>				
				</tr>
			  </table>
			  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 50px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>

			  @endif
			  
			  @if($a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="rua" name="rua" value="<?php echo $rua ?>" required />
			   <input hidden type="text" id="numero" name="numero" value="<?php echo $numero ?>" required />
			   <input hidden type="text" id="bairro" name="bairro" value="<?php echo $bairro ?>" required />
			   <input hidden type="text" id="cidade" name="cidade" value="<?php echo $cidade ?>" required />
			   <input hidden type="text" id="estado" name="estado" value="<?php echo $estado ?>" required />
			   <input hidden type="text" id="cep" name="cep" value="<?php echo $cep ?>" required />
			   <input hidden type="text" id="complemento" name="complemento" value="<?php echo $complemento ?>"  />
			  @endif
					
			@if($a == 6)
			 <table class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosEscolaridade">
				<tr style="width:50px;">
				 <td><span class="input-group-text"> Escolaridade: </td>
				 <td>
				   <select style="width:200px;" id="escolaridade" name="escolaridade" class="form-control">
				    <option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
				    <option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
					<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
					<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
				   </select>
				 </td>
				 <td><span class="input-group-text"> Status da Escolaridade: </td>
				 <td>
				   <select id="status_escolaridade" style="width:200px;" name="status_escolaridade" class="form-control">
				     <option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
					 <option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
					 <option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
				   </select>
				 </td>
				</tr>	
				<tr>
				 <td> <span class="input-group-text">Formação em qual curso? </td>
				 <td>
				   <input class="form-control" style="width:200px;" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="{{ old('formacao') }}" maxlength="150" />
				 </td>
				 <td><span class="input-group-text"> Possui alguma PCD: </td>
				 <td>
				   <select id="deficiencia" name="deficiencia" class="form-control" onchange='pegavalorlaudo(this)'>
				     <option id="deficiencia" name="deficiencia" value="0">Não Possuo</option>
					 <option id="deficiencia" name="deficiencia" value="Fisica">Física</option>
					 <option id="deficiencia" name="deficiencia" value="Auditiva">Auditiva</option>
					 <option id="deficiencia" name="deficiencia" value="Visual">Visual</option>
					 <option id="deficiencia" name="deficiencia" value="Intelectual">Intelectual</option>
					 <option id="deficiencia" name="deficiencia" value="Reabilitado">Reabilitado</option>
					 <option id="deficiencia" name="deficiencia" value="Outra">Outra</option>
				   </select>
				 </td>
				</tr>
				<tr>
				 <td><span class="input-group-text"> Quais cursos realizou? </td>
				 <td>
				   <textarea class="form-control" style="width:200px;" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="{{ old('cursos') }}" maxlength="500">{{ old('cursos') }}</textarea>
				 </td>
				 <td style="width:250px;"><span><b>Anexe o Laudo -></b></span> </td>
			 	 <td>
				   <input style="width:200px;" class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" value="" maxlength="600"> 
				 </td>
				</tr>
			</table>
			<center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 60px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
			@endif
			
			@if($a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="escolaridade" name="escolaridade" value="<?php echo $escolaridade ?>"  />
			   <input hidden type="text" id="status_escolaridade" name="status_escolaridade" value="<?php echo $status_escolaridade ?>"  />
			   <input hidden type="text" id="formacao" name="formacao" value="<?php echo $formacao ?>"  />
			   <input hidden type="text" id="cursos" name="cursos" value="<?php echo $cursos ?>" />
			   <input hidden type="text" id="deficiencia" name="deficiencia" value="<?php echo $deficiencia ?>"  />
			   <input hidden type="text" id="arquivo_deficiencia" name="arquivo_deficiencia" value="<?php echo $arquivo_deficiencia ?>" />
			@endif
			
			@if($a == 7)
			  <table class="table table-borderless" border="0" width="500" id="exp2">
				<tr>
				</tr>
			  </table>
			  
			<table style= "margin-top:-50px; width:700px;" class="table table-borderless" border="0" bordercolor=DCDCDC id="dadosExp1">
				<tr>
				  <td>
					<center><p style="margin-left: 180px; margin-top: 70px;"><span> <b>Os seus dados referentes a experiência serão adicionados num formulário. </br>Este formulário será exibido assim que você clicar no botão abaixo. </b> </span></p>	</center>	
					<!-- Button trigger modal -->
					<button style="margin-left: 275px; margin-top:10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
					Clique aqui para adicionar suas experiências.
					</button>

					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" style="margin-left: -400px;" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content" style="width: 1000px;">
						<div class="modal-header">
							<center><h5 class="modal-title"id="exampleModalLongTitle" >Experiências</h5></center>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body" style="width: 900px; background-color: white;">
						  <table>
							<tr>
							 	<td colspan="6" align="right">
							  		Adicionar Experiência 02 <input type="checkbox" onclick="desabilitar('sim')" id="exp1" name="exp1" />
							 	</td>
							</tr>
							<tr>
							 	<td colspan="3" align="center"><strong> Experiência 01: </strong></td>
							</tr>
							<tr>
							 	<td><span style="width: 150px;" class="input-group-text"> Empresa:</span> </td>
							 	<td>
							  		<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Empresa" type="text" id="empresa" name="empresa" value="{{ old('empresa') }}" maxlength="150" />
							 	</td>
							 	<td><span style="width: 150px; " class="input-group-text"> Cargo:</span> </td>
							 	<td>
							  		<input style = "margin-left: 10px; margin-right: 230px;" class="form-control" placeholder="Cargo" type="text" id="cargo" name="cargo" value="{{ old('cargo') }}" maxlength="150" />
							 	</td>
							</tr>				
							<tr>
							 	<td><span style="width: 150px;" class="input-group-text"> Data Início:</span> </td>
							 	<td>
							  		<input style="margin-left: -45px; width:230px;" class="form-control" type="date" id="data_inicio" name="data_inicio" value="{{ old('data_inicio') }}" maxlength="15" />
							 	</td>
							 	<td><span style="width: 150px;" class="input-group-text"> Data Fim: </td>
							 	<td>
							  		<input style = "margin-left: 10px; margin-right: 60px;"class="form-control" type="date" id="data_fim" name="data_fim" value="{{ old('data_fim') }}" maxlength="15" />
							 	</td>
							</tr>
							<tr>		
							</tr>
							<tr>
							 	<td> <span style="width: 150px;" class="input-group-text"> Suas Atribuições: </span> </td>
							 	<td>
							  		<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" />
							 	</td>
							 	<td> CTPS ou Contra Cheque </br> .doc, .docx e .pdf </td>
							 	<td>
							  		<input class="form-control" type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
							 	</td>
							</tr>
							<tr>
								<td colspan="4">
									<center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></center>
								</td>
							</tr>
							<tr>
								<td colspan="6">
								<center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar1" name="Salvar" /> </center>  
								</td>
							</tr>
						  </table>

						  <table class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosExp2" style="display: none; background-color: white;">
							<tr>
								<td colspan="6" align="right" width="800">
							 		Adicionar Experiência 03 <input type="checkbox" onclick="desabilitar2('sim')" id="exp_2" name="exp_2" />
								</td>
							</tr>
							<tr>
								<td colspan="3" align="center"><strong> Experiência 02: </strong></td>
							</tr>
							<tr>
								<td><span style="width: 150px;" class="input-group-text"> Empresa:</span> </td>
								<td>
									<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Empresa" type="text" id="empresa2" name="empresa2" value="{{ old('empresa2') }}" maxlength="150" />
								</td>
								<td><span style="width: 150px; " class="input-group-text"> Cargo:</span> </td>
								<td>
									<input style = "margin-left: 10px; margin-right: 230px;" class="form-control" placeholder="Cargo" type="text" id="cargo2" name="cargo2" value="{{ old('cargo2') }}" maxlength="150" />
								</td>
							</tr>
							<tr>
								<td><span style="width: 150px;" class="input-group-text"> Data Início:</span> </td>
								<td>
									<input style="margin-left: -45px; width:230px; " class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="{{ old('data_inicio2') }}" maxlength="15" />
								</td>
								<td><span style="width: 150px;" class="input-group-text"> Data Fim: </td>
								<td>
									<input style = "margin-left: 10px; margin-right: 60px;"class="form-control" type="date" id="data_fim2" name="data_fim2" value="{{ old('data_fim2') }}" maxlength="15" />
								</td>
							</tr>
							<tr>
								<td><span style="width: 150px;" class="input-group-text"> Suas Atribuições: </span></td>
								<td>
									<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" />
								</td>
								<td> CTPS ou Contra Cheque </br> .doc, .docx e .pdf </td>
								<td>
									<input class="form-control" type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
								</td>
								</tr>
								<tr>
								<td colspan="4"><center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</center></strong></td>
								</tr>
								<tr>
								<td colspan="6">
									<center><input  type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar2" name="Salvar" /> </center>  
								</td>
								</tr>
						  </table>

						  <table class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosExp3" style="display: none; background-color: white;">
						 	<tr>
							  <td colspan="3" align="center"><strong> Experiência 03: </strong></td>
							</tr>
							<tr>
							  <td><span style="width: 150px;" class="input-group-text"> Empresa:</span> </td>
							  <td>
								<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Empresa" type="text" id="empresa3" name="empresa3" value="{{ old('empresa3') }}" maxlength="150" />
							  </td>
							  <td><span style="width: 150px; " class="input-group-text"> Cargo:</span> </td>
							  <td>
								<input style = "margin-left: 10px; margin-right: 230px;" class="form-control" placeholder="Cargo" type="text" id="cargo3" name="cargo3" value="{{ old('cargo3') }}" maxlength="150" />
							  </td>
							</tr>
							<tr>
							  <td><span style="width: 150px;" class="input-group-text"> Data Início:</span> </td>
							  <td>
								<input style="margin-left: -45px; width:230px; " class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="{{ old('data_inicio3') }}" maxlength="15" />
							  </td>
							  <td><span style="width: 150px;" class="input-group-text"> Data Fim: </td>
							  <td>
								<input style = "margin-left: 10px; margin-right: 60px;"class="form-control" type="date" id="data_fim3" name="data_fim3" value="{{ old('data_fim3') }}" maxlength="15" />
							  </td>
							</tr>
							<tr>					
							<tr>
							  <td><span style="width: 150px;" class="input-group-text"> Suas Atribuições: </span></td>
							  <td>
								<input style="margin-left: -45px; width:230px;" class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" />
							  </td>
							  <td> CTPS ou Contra Cheque </br> .doc, .docx e .pdf </td>
							  <td>
								<input class="form-control" type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
							  </td>
							</tr>
							<tr>
							  <td colspan="4"><center><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</center></strong></td>
							</tr>
							<tr>
							  <td colspan="6">
								<center><input colspan="6" type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar3" name="Salvar" /> </center>  
							  </td>
							</tr>
						  </table>			
			</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
	</div>
	</div>
</div>
</div>
			@endif
			
			@if($a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="empresa" name="empresa" value="<?php echo $empresa ?>"  />
			   <input hidden type="text" id="cargo" name="cargo" value="<?php echo $cargo ?>"  />
			   <input hidden type="text" id="atribuicao" name="atribuicao" value="<?php echo $atribuicao ?>"  />
			   <input hidden type="text" id="data_inicio" name="data_inicio" value="<?php echo $data_inicio ?>"  />
			   <input hidden type="text" id="data_fim" name="data_fim" value="<?php echo $data_fim ?>"  />
			   <input hidden type="text" id="arquivo_ctps1" name="arquivo_ctps1" value="<?php echo $arquivo_ctps1 ?>" />
			   <input hidden type="text" id="empresa2" name="empresa2" value="<?php echo $empresa2 ?>"  />
			   <input hidden type="text" id="cargo2" name="cargo2" value="<?php echo $cargo2 ?>"  />
			   <input hidden type="text" id="atribuicao2" name="atribuicao2" value="<?php echo $atribuicao2 ?>"  />
			   <input hidden type="text" id="data_inicio2" name="data_inicio2" value="<?php echo $data_inicio2 ?>"  />
			   <input hidden type="text" id="data_fim2" name="data_fim2" value="<?php echo $data_fim2 ?>"  />
			   <input hidden type="text" id="arquivo_ctps2" name="arquivo_ctps2" value="<?php echo $arquivo_ctps2 ?>" />
			   <input hidden type="text" id="empresa3" name="empresa3" value="<?php echo $empresa3 ?>"  />
			   <input hidden type="text" id="cargo3" name="cargo3" value="<?php echo $cargo3 ?>"  />
			   <input hidden type="text" id="atribuicao3" name="atribuicao3" value="<?php echo $atribuicao3 ?>"  />
			   <input hidden type="text" id="data_inicio3" name="data_inicio3" value="<?php echo $data_inicio3 ?>"  />
			   <input hidden type="text" id="data_fim3" name="data_fim3" value="<?php echo $data_fim3 ?>"  />
			   <input hidden type="text" id="arquivo_ctps3" name="arquivo_ctps3" value="<?php echo $arquivo_ctps3 ?>" />
			@endif
			
			@if($a == 8)
			  <table class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosCurriculo">
				<tr>
				<td align="center" colspan="3"><strong> 
				Os arquivos permitidos são: .doc, .docx e .pdf </strong></td>
				</tr>
				<tr>
					<td>
				<center><input style= "margin-left:300px;" class="form-control-file" type="file" id="arquivo" name="arquivo" required style="width:500px" maxlength="200" /><center>
					</td>	
				</tr>
				<tr>
					<td>
				  <center>
				   <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" />
				  </center>		
				 </td>
				</tr>
			  </table>
			@endif
			
			@if($a == 9 || $a == 10)
			   <input hidden type="text" id="arquivo" name="arquivo" value="<?php echo $arquivo ?>" />
			@endif
			
			@if($a == 9)
			 <table style="margin-left:10px;" class="table table-borderless" border="0" width="500" bordercolor=DCDCDC id="dadosCheck">
				 <tr>
				</tr>
				<tr>
				 <td>
				 <span class="input-group-text">Possui habilitação:</span>
				 </td>
				 <td>
				  <select class="form-control" id="habilitacao" name="habilitacao">
				   <option id="habilitacao" name="habilitacao" value="nao">Não</option>
				   <option id="habilitacao" name="habilitacao" value="sim">Sim</option>
				  </select>
				 </td>
				</tr>
				<tr>
				 <td>
				 <span class="input-group-text"> Tem disponibilidade pra trabalhar em qual período:</span>
				 </td>
				 <td>
				  <select class="form-control" id="periodo" name="periodo">
				   <option id="periodo" name="periodo" value="periodo_integral">Disponibilidade para trabalhar em período integral</option>
				   <option id="periodo" name="periodo" value="periodo_noturno">Disponibilidade para trabalhar em período noturno</option>
				   <option id="periodo" name="periodo" value="meio_periodo">Disponibilidade para trabalhar meio período</option>
				  </select>
				 </td> 
				</tr>
				<tr>
				 <td>
				 <span class="input-group-text">  Disponibilidade para mudar de cidade:</span>
				 </td>
				 <td> 
				  <select class="form-control" id="outra_cidade" name="outra_cidade">
				   <option id="outra_cidade" name="outra_cidade" value="nao">Não</option>
				   <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
				  </select>
				 </td>
				</tr>
			 	<tr>	
				  <td><span class="input-group-text"> Como soube da vaga?</span> </td>
				  <td>
				  <select style= "width:140px;"onchange="comoSoube()" class="form-control" id="como_soube" name="como_soube"> 
				  	<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
					<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
					<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
					<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
				  </select>
				  <td> <input style= "width:200px; margin-left: -225px" type="text" id="como_soube2" name="como_soube2" class="form-control" disabled required/> </td> 
				  </td>
				</tr>
				<tr>
				  <td><span class="input-group-text"> Você possui Parentesco com algum Colaborador do HCP Gestão? </span></td>
				  <td>
				  <select style= "width:100px;" onchange="familiar()" class="form-control" id="parentesco" name="parentesco"> 
				  	<option id="parentesco" name="parentesco" value="nao"> Não </option>  
					<option id="parentesco" name="parentesco" value="sim"> Sim </option>  
					</select>	
					<td> <input style= "width:200px; margin-left: -225px;" type="text" id="parentesco_nome" name="parentesco_nome" class="form-control" disabled required/> </td>
				  </td>
				</tr>
				<tr>
				
				<tr>
			  </table>
			  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>

			@endif
			
			@if($a == 10)
			   <input hidden type="text" id="habilitacao" name="habilitacao" value="<?php echo $habilitacao ?>" />
			   <input hidden type="text" id="periodo" name="periodo" value="<?php echo $periodo ?>" />
			   <input hidden type="text" id="outra_cidade" name="outra_cidade" value="<?php echo $outra_cidade ?>" />
			   <input hidden type="text" id="como_soube" name="como_soube" value="<?php echo $como_soube ?>" />
			   <input hidden type="text" id="parentesco" name="parentesco" value="<?php echo $parentesco ?>" />
			   <input hidden type="text" id="parentesco_nome" name="parentesco_nome" value="<?php echo $parentesco_nome ?>" />
			@endif
			
			@if($a == 10)
			<table style="margin-left: 45px;" class="table table-borderless" border="0" width="500" id="exp2">
			  <tr>
				<td align="center"><strong>Para concluir sua inscrição, basta clicar no botão abaixo:</strong></td>
			  </tr>
			  <td colspan="2">
				<center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Concluir" name="Salvar" /> </center>
			  </td>
			  <td>
			    <input hidden type="text" id="candidato_id" name="candidato_id" value="" />
				<input hidden type="text" id="processo_seletivo_id" name="processo_seletivo_id" value="" />
				<input hidden type="text" id="data_inscricao" name="data_inscricao" value="" /> 
			  </td>
			</table>
			@endif
			<input hidden type="text" id="id_tabela" name="id_tabela" value="" />
			<input hidden type="text" id="id_interno" name="id_interno" value="" />
			<input hidden type="text" id="pais" name="pais" value="" />		
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
<style>
body{
	font-size: 13px;
	background-color: white;
	Font-family: Cambria, Georgia, serif.;
}
h5{
	margin-top: 15px;
}
div#msg{
	font-size: 13px;
}
div#reflexo{	
	background-color: white;
	height: 670px;
	width: 900px;
	border: 0px solid;
	border-radius:25px;
	align: center;
	margin-left: 100px;
	display:block;
	position:absolute;
	box-shadow: 0px 0px 20px 8px #DDDDDC;	
}
img#hcp{
	width:90px;
	height:50px;
	margin-top:-200px;
}
div#titulo{
	border-radius: 10px;
}
#tabelaTitulo{
	
}
table#tabelacep{
	margin-top: 25px;
}
section.sppb-section{
}
</style>
</html>