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
	<div id="reflexo"> 	
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder page-1">
		   <div class="page-content">
			 <section  class="sppb-section" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						 <table class="table table-borderless" align="center" id="tabelatitulo"  style="margin-bottom: 15px; background-color: white;" >
						    <tr>
								<td>
									<div style= "text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-45px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
									<div class="container">
										<h5 class="display-10"><p style="align: center"><b> INSCRIÇÃO <br> PROCESSO SELETIVO: {{ $processos[0]->nome }}</b> </p> <img id="hcp" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></td></h5>
									</div>
									</div>							
								</td>
							</tr>
						 </table>
						 <br>
						 <table class="table table-borderless" border="0" width="500" id="inicio">
						   <tr>
							<td align="center"><strong> DECLARAÇÃO DE PRIVACIDADE </strong></td>
						   </tr>
						   <tr>
						    <td> 
							  <p>
								<ul style="text-align: left; list-style-type:none;">
									<li style="padding: 2px;"><b><p align="justify">De acordo com a Lei Geral de Proteção de Dados Nº 13.709/18 e legislação vigente aplicável, o
											titular dos dados pessoais declara estar ciente e de acordo com as disposições aqui descritas e
											autoriza, de forma livre e expressa, o tratamento de dados pessoais e informações pelo HCP
											Gestão, respeitando os princípios de transparência, necessidade, adequação e finalidade para os
											dados aqui coletados conforme edital publicado. O HCP Gestão fará uso destes dados para
											cadastro de profissionais e serão armazenados por 12 meses, utilizando as medidas técnicas e
											organizacionais necessárias para preservar a privacidade dos dados coletados seguindo as
											melhores práticas de mercado.</p></b></li>
									<li style="padding: 2px;"><b><p align="justify">O HCP Gestão respeita e garante ao titular a possibilidade de exercer seus direitos. Para exercer
											seus direitos entre em contato com o Encarregado de Dados no e-mail dpo@hcp.org.br.
											Direitos do Titular dos Dados: Confirmação da existência de tratamento, o acesso aos dados, a
											correção de dados incompletos, inexatos ou desatualizados, a anonimização, bloqueio ou
											eliminação de dados desnecessários, excessivos ou tratados em desconformidade, a
											portabilidade de seus dados a outro fornecedor de serviço ou produto, mediante requisição
											expressa pelo titular, a eliminação dos dados tratados com consentimento do titular, a
											informação sobre a possibilidade de não fornecer o seu consentimento, bem como de ser
											informado sobre as consequências, em caso de negativa e a revogação do consentimento.</p></b></li>
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
	 
</div> 
  </body>
  <style>

footer table#hcp{
	background-color: white;
}
h5{
	margin-top: 15px;
}
footer table#redes{
	background-color: #57D211;
	width: 900px;
	border-radius: 5px;
	opacity:85%;
}
footer img{
	padding:2px;
	align:center;
}
img#hcp{
	width:90px;
	height:50px;
	margin-top:-200px;	
}
body{
	font-size: 13px;
	background-color: white;
	Font-family: Cambria, Georgia, serif.;
}
div#reflexo{
	background-color: white;
	height: 670px;
	width: 900px;
	border: 0px solid;
	border-radius:25px;
	align: center;
	margin-left: 250px;
	display:block;
	position:absolute;
	box-shadow: 0px 0px 20px 8px #DDDDDC;	
}
</style>
</html>