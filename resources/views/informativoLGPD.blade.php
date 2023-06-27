<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
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
					  <div class="container"> <br> <br>
						 <table class="table table-borderless" align="center" id="tabelatitulo"  style="margin-bottom: 15px; background-color: white;" >
						  <tr>
							<td>
							  <div style= "text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-45px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
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
			<br>
			<table class="table table-borderless" border="0" width="500" id="inicio">
			 <tr>
				<td align="center" colspan="2"><strong> DECLARAÇÃO DE PRIVACIDADE </strong></td>
			 </tr>
			 <tr>
			    <td colspan="2"> 
				 <p>
					<ul style="text-align: left; list-style-type:none;">
					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">De acordo com a Lei Geral de Proteção de Dados nº 13.709/18 e 
											legislação vigente aplicável, o titular dos dados pessoais declara estar ciente e de acordo com as disposições 
											aqui descritas e autoriza, de forma livre e expressa, o tratamento de dados pessoais e informações pelo 
											HCP Gestão, respeitando os princípios de transparência, necessidade, adequação e finalidade para os dados aqui 
											coletados conforme edital publicado. </p></b></li>
					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">O HCP Gestão fará uso destes dados para cadastro de profissionais 
											e serão armazenados por 12 meses, utilizando as medidas técnicas e organizacionais necessárias para preservar 
											a privacidade dos dados coletados seguindo as melhores práticas de mercado. </p></b></li>
					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">O HCP Gestão respeita e garante ao titular a possibilidade de exercer 
						 					seus direitos: (i) Confirmação da existência de tratamento; (ii) o acesso aos dados, (iii) a correção de dados 
											incompletos, (iv) inexatos ou desatualizados, (v) a anonimização, (vi) bloqueio ou eliminação de dados desnecessários, 
											excessivos ou tratados em desconformidade, (vii) a portabilidade de seus dados a outro fornecedor de serviço ou produto, 
											mediante requisição expressa pelo titular, (viii) a eliminação dos dados tratados com consentimento do titular, (ix) a 
											informação sobre a possibilidade de não fornecer o seu consentimento, bem como de ser informado sobre as consequências, 
											em caso de negativa e a (x) revogação do consentimento.</p></b></li>

					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">Para exercer seus direitos relacionados à Lei Geral de Proteção de Dados 
											entre em contato com o Encarregado de Dados no e-mail dpo@hcp.org.br. Em hipótese alguma deverá enviar currículos para 
											este e-mail.</p></b></li>					
					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">Para informações detalhadas sobre como tratamos os seus dados pessoais 
											consulte a política de privacidade em https:\\www.hcpgestao.org.br\privacidade</p></b></li>	

					 
					 <li style="padding: 0px; margin-right: 30px;"><b><p align="justify">Para esclarecimentos e dúvidas sobre o processo seletivo entrar em contato 
											com o endereço de e-mail informado nas demais seções do edital.	</p></b></li>
					</ul>
				 </p>
				</td>
			 </tr>
			 <tr>
				<td>
				  <a style="margin-left: 30px;" href="{{ route('informativo', array($unidades[0]->id, $processos[0]->id)) }}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm"> VOLTAR <i class="fas fa-undo-alt"></i></a>
				</td>
				<td align="right">
			   	  <form method="get" action="{{ route('termoUIns', array($processos[0]->unidade_id, $processos[0]->id)) }}">	
					<button style="margin-right: 30px;" id="div" href="" class='btn btn-success btn-sm' target="_blank">INSCRIÇÃO</button> 	
				  </form>
				</td>
			 </tr>
			</table>
			</div>
	    </div>
     </div> 
</body>
<style>
	footer table#hcp{
		background-color: white;
	}
	button#Voltar{
		margin-left: 5px; 
		color: #FFFFFF;
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
		background-repeat: no-repeat;
	}
	div#reflexo{
		background-color: white;
		height: 100%;
		width: 100%;
		border: 0px solid;
		border-radius:25px;
		align: center;
		display:block;
		position:absolute;
		box-shadow: 0px 0px 20px 8px #DDDDDC;
		background-repeat: repeat;
	}

	@media screen and (max-width: 768px) {
		.div#reflexo{
			background-color: white;
			height: 100px;
			width: 100%;
			border: 0px solid;
			border-radius:25px;
			align: center;
			box-shadow: 0px 0px 20px 8px #DDDDDC;	
		}
		.body{
			font-size: 13px;
			background-color: white;
			Font-family: Cambria, Georgia, serif.;
			background-repeat: no-repeat;
		}
		.img#hcp{
			width:5%;
			height:50%;
			margin-top:5%;	
		}
		.h5{
			align: center;
		}
	}
    </style>
</html>