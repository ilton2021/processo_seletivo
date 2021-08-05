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
	  @if (Session::has('mensagem'))
		@if ($text == true)
		<div class="container">
	     <div class="alert alert-success {{ Session::get ('mensagem')['class'] }} ">
		      {{ Session::get ('mensagem')['msg'] }}
		 </div>
		</div>
		@endif
	  @endif
	  <div class="container">
	  
	  <div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
			 <section  class="sppb-section " style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						 <table align="center" border="2" width="500" bordercolor=DCDCDC>
						    <tr>
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos->nome }} </p></td>
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
			  <table class="table table-sm" border="0" width="500" id="inicio">
				<tr>
				<td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processos->nome }}. </strong></td>
				</tr>
			  </table>
			  @endif
			  
			  <table class="table table-sm" border="2" width="100" bordercolor=DCDCDC id="dadosCpf" name="dadosCpf">
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
			      <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="INICIAR" id="Salvar" name="Salvar" /> 
				 </center>
				 </td>
				</tr>
				 @else 
					 
			     @endif
 				
			  </table>
			  <?php $c = str_replace(' ','',$processos->nome); ?>
			  <input hidden type="text" id="processo_nome" name="processo_nome" value="{{ $c }}" />
			  @if($a == 2 || $a == 3 || $a == 4 || $a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
				 <input hidden id="cpf" type="text" class="form-control" name="cpf" value="<?php echo $cpf; ?>" required placeholder="CPF..." autocomplete="cpf" readonly="true">
			  @endif	
				
			  @if($a == 2)
			  <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosVaga" name="dadosVaga">
			   <tr>
				<td colspan="3" align="center"><strong> Qual Vaga deseja se candidatar: </strong></td>
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
			  <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosPessoais" name="dadosPessoais">
			    <tr>
				<td colspan="3" align="center"><strong> Dados Pessoais: </strong></td>
				</tr>
				<tr>
				 <td> Nome Completo: </td>
				 <td>
				   <input class="form-control" placeholder="nome" type="text" id="nome" name="nome" value="" required maxlength="150" />
				 </td>
				 <td></td>
				</tr>
				<tr>
				 <td> E-mail que usa com frequência: </td>
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
				 <td> Telefone Celular: </td>
				 <td>
				   <input class="form-control" placeholder="Ex: (81)98888-3333" type="text" maxlength="14" id="celular" name="celular" value="" required />
				 </td><td></td>
				</tr>
				<tr>
				 <td> Telefone Fixo: </td>
				 <td>
				   <input class="form-control" placeholder="Ex: (81)2222-3333" type="text" id="fone_fixo" maxlength="13" name="fone_fixo" value="" />
				 </td>
			 	 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
				 </td>
				</tr>
			  </table>
			  @endif
			  
			  @if($a == 4 || $a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="nome" name="nome" value="<?php echo $nome ?>" required />
			   <input hidden type="text" id="email" name="email" value="<?php echo $email ?>" required />
			   <input hidden type="text" id="celular" name="celular" value="<?php echo $celular ?>" required />
			   <input hidden type="text" id="fone_fixo" name="fone_fixo" value="<?php echo $fone_fixo ?>" required />
			  @endif
			
			@if($a == 4)		
			<table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosPessoais2" name="dadosPessoais2">  
			    <tr>
				 <td colspan="3" align="center"><strong> Onde você nasceu? </strong></td>
				</tr>
				<tr>
				 <td> Cidade: </td>
				 <td>
				   <input class="form-control" placeholder="Cidade" type="text" id="cidade_nasc" name="cidade_nasc" value="" required maxlength="100" />
				 </td>
				 <td></td>
				</tr>
				<tr>
				 <td> Estado: </td>
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
				 <td> País: </td>
				 <td>
				   <input class="form-control" placeholder="País" type="text" id="naturalidade" name="naturalidade" value="" required maxlength="50" />
				 </td>
				 <td></td>
				</tr>
				<tr>
				 <td> Data de Nascimento: </td>
				 <td>
				   <input class="form-control" type="date" id="data_nasc" name="data_nasc" value="" required />
				 </td>
				 <td>
				   <center> <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
				 </td>
				</tr>
			</table>
			@endif
			
			  @if($a == 5 || $a == 6 || $a == 7 || $a == 8 || $a == 9 || $a == 10)
			   <input hidden type="text" id="naturalidade" name="naturalidade" value="<?php echo $naturalidade ?>" required />
			   <input hidden type="text" id="estado_nasc" name="estado_nasc" value="<?php echo $estado_nasc ?>" required />
			   <input hidden type="text" id="cidade_nasc" name="cidade_nasc" value="<?php echo $cidade_nasc ?>" required />
			   <input hidden type="date" id="data_nasc" name="data_nasc" value="<?php echo $data_nasc ?>" required />
			  @endif
			
			@if($a == 5)
			<table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosResidencia">
				<tr>
				<td colspan="3" align="center"><strong> Onde você mora atualmente? </strong></td>
				</tr>
				<tr>
				 <td> Qual CEP: </td>
				 <td>
				   <input class="form-control" placeholder="CEP" type="text" id="cep" name="cep" required maxlength="30" />
				 </td>
				</tr>
				<tr>
				 <td> Qual Rua: </td>
				 <td>
				   <input class="form-control" placeholder="RUA" type="text" id="rua" name="rua" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td> Qual Número: </td>
				 <td>
				   <input class="form-control" placeholder="NÚMERO" type="text" id="numero" name="numero" required maxlength="10" />
				 </td>
				</tr>
				<tr>
				 <td> Qual Bairro: </td>
				 <td>
				   <input class="form-control" placeholder="BAIRRO" type="text" id="bairro" name="bairro" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td> Qual Cidade: </td>
				 <td>
				   <input class="form-control" placeholder="CIDADE" type="text" id="cidade" name="cidade" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td> Qual Estado: </td>
				 <td>
				   <input class="form-control" placeholder="ESTADO" type="text" id="estado" name="estado" required maxlength="100" />
				 </td>
				</tr>
				<tr>
				 <td> Complemento: </td>
				 <td>
				   <input class="form-control" placeholder="COMPLEMENTO" type="text" id="complemento" name="complemento" maxlength="200" />
				 </td>
				 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
				 </td>
				</tr>
			  </table>
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
			 <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosEscolaridade">
				<tr>
				<td colspan="3" align="center"><strong> Mais um pouquinho sobre você </strong></td>
				</tr>
				<tr>
				 <td> Escolaridade: </td>
				 <td>
				   <select id="escolaridade" name="escolaridade" class="form-control">
				    <option id="escolaridade" name="escolaridade" value="Ensino Medio Completo">Ensino Médio Completo</option> 
				    <option id="escolaridade" name="escolaridade" value="Superior Incompleto">Superior Incompleto</option> 
					<option id="escolaridade" name="escolaridade" value="Superior Completo">Superior Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Mestrado Completo">Mestrado Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Doutorado Completo">Doutorado Completo</option> 
					<option id="escolaridade" name="escolaridade" value="Pos graduacao">Pós-graduação</option> 
					<option id="escolaridade" name="escolaridade" value="Residencia">Residência</option> 
				   </select>
				 </td>
				</tr>
				<tr>
				 <td> Status da Escolaridade: </td>
				 <td>
				   <select id="status_escolaridade" name="status_escolaridade" class="form-control">
				     <option id="status_escolaridade" name="status_escolaridade" value="Em Andamento">Em Andamento</option>
					 <option id="status_escolaridade" name="status_escolaridade" value="Trancado">Trancado</option>
					 <option id="status_escolaridade" name="status_escolaridade" value="Concluido">Concluído</option>
				   </select>
				 </td>
				</tr>
				<tr>
				 <td> Formação em qual curso? </td>
				 <td>
				   <input class="form-control" placeholder="Formação em qual curso?" type="text" id="formacao" name="formacao" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td> Quais cursos realizou? </td>
				 <td>
				   <textarea class="form-control" placeholder="quais cursos realizou?" type="text" id="cursos" name="cursos" value="" maxlength="500"> </textarea>
				 </td>
				</tr>
				<tr>
				 <td> Possui alguma PCD: </td>
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
				 <td> LAUDO PCD: Os arquivos permitidos são: .doc, .docx e .pdf </td>
				 <td>
				   <input class="form-control" type="file" id="arquivo_deficiencia" name="arquivo_deficiencia" value="" maxlength="600"> 
				 </td>
				 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
				 </td>
				</tr>
			  </table>
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
			  <table class="table table-sm" border="0" width="500" id="exp2">
				<tr>
				<td align="center"><strong> Experiência profissional. <br>
				Abaixo estão os campos onde você deve descrever as 3 últimas empresas em que trabalhou. </strong></td>
				</tr>
			  </table>
			  
			  <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosExp1">
				<tr>
				 <td colspan="3" align="right">
				  Adicionar Experiência 02 <input type="checkbox" onclick="desabilitar('sim')" id="exp1" name="exp1" />
				 </td>
				</tr>
				<tr>
				<td colspan="3" align="center"><strong> Experiência 01: </strong></td>
				</tr>
				<tr>
				 <td> Empresa: </td>
				 <td>
				   <input class="form-control" placeholder="Empresa" type="text" id="empresa" name="empresa" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td> Cargo: </td>
				 <td>
				   <input class="form-control" placeholder="Cargo" type="text" id="cargo" name="cargo" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td> Suas Atribuições: </td>
				 <td>
				   <input class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao" name="atribuicao" value="" maxlength="300" />
				 </td>
				</tr>
				<tr>
				 <td> Data Início: </td>
				 <td>
				   <input class="form-control" type="date" id="data_inicio" name="data_inicio" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td> Data Fim (preencher apenas se não estiver trabalhando atualmente.): </td>
				 <td>
				   <input class="form-control" type="date" id="data_fim" name="data_fim" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td> CTPS ou Contra Cheque: Os arquivos permitidos são: .doc, .docx e .pdf </td>
				 <td>
				   <input class="form-control" type="file" id="arquivo_ctps1" name="arquivo_ctps1" value="" maxlength="600"> 
				 </td>
				</tr>
				<tr>
				 <td><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></td>
				 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar1" name="Salvar" /> </center>  
				 </td>
				</tr>
			</table>
				
			<table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosExp2" style="display: none;">
				<tr>
				 <td colspan="6" align="right" width="800">
				  Adicionar Experiência 03 <input type="checkbox" onclick="desabilitar2('sim')" id="exp_2" name="exp_2" />
				 </td>
				</tr>
				<tr>
				<td colspan="5" align="center"><strong> Experiência 02: </strong></td>
				</tr>
				<tr>
				 <td colspan="4" width="660"> Empresa: </td>
				 <td colspan="1" width="450">
				   <input class="form-control" placeholder="Empresa" type="text" id="empresa2" name="empresa2" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Cargo: </td>
				 <td>
				   <input class="form-control" placeholder="Cargo" type="text" id="cargo2" name="cargo2" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Suas Atribuições: </td>
				 <td>
				   <input class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao2" name="atribuicao2" value="" maxlength="300" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Data Início: </td>
				 <td>
				   <input class="form-control" type="date" id="data_inicio2" name="data_inicio2" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Data Fim (preencher apenas se não estiver trabalhando atualmente.): </td>
				 <td>
				   <input class="form-control" type="date" id="data_fim2" name="data_fim2" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> CTPS ou Contra Cheque: Os arquivos permitidos são: .doc, .docx e .pdf </td>
				 <td>
				   <input class="form-control" type="file" id="arquivo_ctps2" name="arquivo_ctps2" value="" maxlength="600"> 
				 </td>
				</tr>
				<tr>
				 <td colspan="4"><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></td>
				 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar2" name="Salvar" /> </center>  
				 </td>
				</tr>
			  </table>

			  <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosExp3" style="display: none;">
				<tr>
				<td colspan="5" align="center"><strong> Experiência 03: </strong></td>
				</tr>
				<tr>
				 <td colspan="4" width="660"> Empresa: </td>
				 <td colspan="1" width="450">
				   <input class="form-control" placeholder="Empresa" type="text" id="empresa3" name="empresa3" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Cargo: </td>
				 <td>
				   <input class="form-control" placeholder="Cargo" type="text" id="cargo3" name="cargo3" value="" maxlength="150" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Suas Atribuições: </td>
				 <td>
				   <input class="form-control" placeholder="Suas Atribuições" type="text" id="atribuicao3" name="atribuicao3" value="" maxlength="300" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Data Início: </td>
				 <td>
				   <input class="form-control" type="date" id="data_inicio3" name="data_inicio3" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> Data Fim (preencher apenas se não estiver trabalhando atualmente.): </td>
				 <td>
				   <input class="form-control" type="date" id="data_fim3" name="data_fim3" value="" maxlength="15" />
				 </td>
				</tr>
				<tr>
				 <td colspan="4"> CTPS ou Contra Cheque: Os arquivos permitidos são: .doc, .docx e .pdf </td>
				 <td>
				   <input class="form-control" type="file" id="arquivo_ctps3" name="arquivo_ctps3" value="" maxlength="600"> 
				 </td>
				</tr>
				<tr>
				 <td colspan="4"><strong>ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</strong></td>
				 <td>
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar3" name="Salvar" /> </center>  
				 </td>
				</tr>
			  </table>
			  
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
			  <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosCurriculo">
				<tr>
				<td align="center" colspan="3"><strong> É de extrema importância anexar o SEU CURRICULO. <br>
				Os arquivos permitidos são: .doc, .docx e .pdf </strong></td>
				</tr>
				<tr>
				<td>
				  <center>
				   <input class="form-control" type="file" id="arquivo" name="arquivo" required style="width:500px" maxlength="200" />
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
			 <table class="table table-sm" border="2" width="500" bordercolor=DCDCDC id="dadosCheck">
				<tr>
				 <td align="center" colspan="3"><strong>Precisamos saber sobre sua disponibilidade, marque as opções abaixo:</strong></td>
				</tr>
				<tr>
				 <td>
				  Possui habilitação:
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
				  Tem disponibilidade pra trabalhar em qual período:
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
				   Disponibilidade para mudar de cidade:
				 </td>
				 <td> 
				  <select class="form-control" id="outra_cidade" name="outra_cidade">
				   <option id="outra_cidade" name="outra_cidade" value="nao">Não</option>
				   <option id="outra_cidade" name="outra_cidade" value="sim">Sim</option>
				  </select>
				 </td>
				</tr>
			 	<tr>
				  <td> Como soube da vaga? </td>
				  <td>
				  <select class="form-control" id="como_soube" name="como_soube"> 
				  	<option id="como_soube" name="como_soube" value="redes_sociais"> Redes Sociais </option>
					<option id="como_soube" name="como_soube" value="site_hcpgestao"> Site HCP Gestão </option>  
					<option id="como_soube" name="como_soube" value="indicacao"> Indicação </option>  
					<option id="como_soube" name="como_soube" value="outros"> Outros </option>  
				  </select>
				  </td>
				  <td> <input type="text" id="como_soube2" name="como_soube2" class="form-control"  /> </td>
				</tr>
				<tr>
				  <td> Você possui Parentesco com algum Colaborador do HCP Gestão? </td>
				  <td>
				  <select class="form-control" id="parentesco" name="parentesco"> 
				  	<option id="parentesco" name="parentesco" value="nao"> Não </option>  
					<option id="parentesco" name="parentesco" value="sim"> Sim </option>  
				  </td>
				  <td> <input type="text" id="parentesco_nome" name="parentesco_nome" class="form-control" placeholder="Nome do Colaborador"  /> </td>
				</tr>
				<tr>
				 <td colspan="2">
				  <center><input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Prosseguir" id="Salvar" name="Salvar" /> </center>
				 </td>
				<tr>
			  </table>
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
			<table class="table table-sm" border="0" width="500" id="exp2">
			  <tr>
				<td align="center"><strong>Para concluir sua inscrição clique no botão Concluir.</strong></td>
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
	 </script>
	 
  </body>
</html>