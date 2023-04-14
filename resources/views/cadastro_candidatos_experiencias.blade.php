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
			  <form method="POST"  action="{{ route('validarCandidatoExperiencias', array($unidade[0]->id, $processos[0]->id, $candidato[0]->id)) }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	  
			  <div class="tab-content" id="pills-tabContent"> 
		 		<div class="modal-content">
				  <div class="modal-content">
				    <div class="modal-header">
					  <center><h6 class="modal-title"id="exampleModalLongTitle"><b>EXPERIÊNCIAS:</b></h6></center>
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
						   <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required>{{ old('atribuicao') }}</textarea>
						 @else
						   <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao" name="atribuicao" value="{{ old('atribuicao') }}" maxlength="300" required>{{ old('atribuicao') }}</textarea>
						 @endif
					    <font size="2">Restam: <span class="caracteres">300 </span> caracteres.</font><br>
					   </div>
					  </div>
					  @if($vagasExp)
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Nesta Experiência você obteve alguma dessas competências:</font></b></label> <br>
						@foreach($vagasExp as $vagaExp)
						  <input type='checkbox' class="vaga_exp1" id="vaga_exp1[]" name="vaga_exp1[]" value="<?php echo $vagaExp->id; ?>" /> {{$vagaExp->descricao}} &nbsp;</input> <br>
						@endforeach
						<input type='checkbox' class="vaga_exp1" id="vaga_exp1[]" name="vaga_exp1[]" value="0" /> Nenhuma Competência &nbsp;</input> 
					   </div>
					  </div>
					  @endif
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
						  <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required>{{ old('atribuicao2') }}</textarea>
						 @else
						  <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao2" name="atribuicao2" value="{{ old('atribuicao2') }}" maxlength="300" required>{{ old('atribuicao2') }}</textarea>
						 @endif
						 <font size="2">Restam: <span class="caracteres">300 </span> caracteres.</font><br>
					   </div> 
					  </div>
					  @if($vagasExp)
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Nesta Experiência você obteve alguma dessas competências:</font></b></label> <br>
						@foreach($vagasExp as $vagaExp)
							<input type='checkbox' class="vaga_exp2" id="vaga_exp2[]" name="vaga_exp2[]" value="<?php echo $vagaExp->id; ?>" /> {{$vagaExp->descricao}} &nbsp;</input> <br>
						@endforeach
						<input type='checkbox' class="vaga_exp2" id="vaga_exp2[]" name="vaga_exp2[]" value="0" /> Nenhuma Competência &nbsp;</input>
					   </div>
					  </div>
					  @endif
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
						  <textarea class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required>{{ old('atribuicao3') }}</textarea>
						 @else
						  <textarea disabled class="form-control form-control-sm" placeholder="SUAS ATRIBUIÇÕES" type="text" id="atribuicao3" name="atribuicao3" value="{{ old('atribuicao3') }}" maxlength="300" required>{{ old('atribuicao3') }}</textarea>
						 @endif
						 <font size="2"> Restam: <span class="caracteres">300 </span> caracteres. </font><br>
					   </div> 
					  </div>
					  @if($vagasExp)
					  <div class="row">
					   <div class="col"> 
					    <label for="inputState" class="form-label"><b><font size="2">Nesta Experiência você obteve alguma dessas competências:</font></b></label> <br>
						 @foreach($vagasExp as $vagaExp)
						   <input type='checkbox' class="vaga_exp3" id="vaga_exp3[]" name="vaga_exp3[]" value="<?php echo $vagaExp->id; ?>" /> {{$vagaExp->descricao}} &nbsp;</input> <br>
						 @endforeach
						<input type='checkbox' class="vaga_exp3" id="vaga_exp3[]" name="vaga_exp3[]" value="0" /> Nenhuma Competência &nbsp;</input>
					   </div>
					  </div>
					  @endif
					  <div class="row">
					  	<div class="col">
					     <center><strong><font size="2" color="red">ATENÇÃO - O preenchimento das datas é obrigatório caso possua experiência.</font></strong></center>
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