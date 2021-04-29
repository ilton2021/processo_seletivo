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
</head>
    <body>
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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos[0]->nome }} </p></td>
							</tr>
						 </table>
						 <br>
						 <table class="table table-sm" border="0" width="500" id="inicio">
						   <tr>
							<td align="center"><strong> Olá! Seja bem vindo ao processo seletivo simplificado {{ $processos[0]->nome }}. </strong></td>
						   </tr>
						   <tr>
						    <td>
							  <p>
								<b><center>Antes de iniciar o Processo Seletivo é importante:</center></b> <br>
								<ul>
									<li><b>Ler todo o edital com atenção: <a href="{{asset('storage')}}/{{$processos[0]->edital_caminho}}" target='_blank'>Regulamento - {{ $processos[0]->nome }}</a>.</b></li>
									<li><b>Ler toda documentação necessária para admissão: <a href="{{ asset('storage/doc.pdf')}}" target='_blank'>Documentos</a></b></li>
									<li><b>Anexar seu currículo atualizado em formato de arquivo PDF ou DOC.</b></li>
									<li><b>Caso seja PCD (Pessoas com Deficiência), anexar declaração de portador de deficiência em formato de arquivo PDF ou DOC.</b></li>
									<li><b>Informar seus dados corretamente, você poderá ser excluído do Processo Seletivo.</b></li>
									<li><b>Sem estes dados não é possível completar o Processo Seletivo.</b></li>
									<li style='color:red;'><b>Inscrição de {{ date('d/m/Y', strtotime($processos[0]->inscricao_inicio)) }} até {{ date('d/m/Y', strtotime($processos[0]->inscricao_fim)) }}</b></li>
								</ul>
							  </p>
							</td>
						   </tr>
						   <tr>
						    <td>
						    <form method="get" action="{{ route('cadastroCandidato', array($processos[0]->unidade_id, $processos[0]->id)) }}">	
							  <center><button id="div" href="" class='btn btn-success' target="_blank">Inscrição</button></center>
							</form>
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
			 		
			</form> 
		  </div>
		</div>
	  </div>
	 </div>
	 
  </body>
</html>