<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Processo Seletivo - Hospital de Câncer de Pernambuco</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('js/utils.js') }}" rel="stylesheet">
	<link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
</head>
<div id="reflexo"> 			
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder page-1">
		   <div class="page-content">
			 <section  class="sppb-section ">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:50%;"> <br> <br>
						 <table class="table table-borderless" align="center" border="0" width="1000" bordercolor=DCDCDC>
							<tr>
							  <td><img width="180" id="img-unity" src="{{asset('img')}}/{{'gestao.png'}}" class="rounded-sm" alt="..."></td>
							  <td align="center"><p style="font-size: 14px; margin-top: 10px;"><b>Prezado Candidato (a),</b></p></td>
                            </tr>
							<tr>
							  <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Muito obrigada(o) por se candidatar no processo seletivo da unidade {{ $unidade[0]->nome }} gerida pelo HCP GESTÃO!</p></td>
                            </tr>
                            <tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Confirmamos a sua inscrição e agora iremos analisar todas as candidaturas recebidas. Fique de olho no cronograma divulgado no Edital, onde consta a data da avaliação e entrevista.</p></td>
                            </tr>
                            <tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">ATENÇÃO! O e-mail que você nos informou no cadastro é a nossa forma de comunicação com você!  Fique atento, inclusive na caixa de spam, pois iremos entrar em contato através dele.</p></td>
                            </tr>
							<tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;"><b>IMPORTANTE!</b> O perfil que buscamos é baseado: nas características de <b>tempo de experiência, atribuições que desempenhou em outros vínculos, pontuação de, no mínimo, 70% de acertos no questionário sobre ética profissional</b>. A partir dessas informações é gerado o ranking dos candidatos dentro do perfil que divulgamos no Processo Seletivo.</p></td>
                            </tr>
							<tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Obrigado(a), novamente, por dedicar um tempo para se inscrever. <br><br>Boa sorte! Seu número de inscrição é: <b>{{ $numeroInscricao }}</b></p></td>
                      		</tr>
							<tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Se você não respondeu o questionário, nem o preencheu as experiências. entre na Área do Candidato com os seus dados cadastrados.</p></td>
                      		</tr>
							<tr>
							  <td align="center" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Acesse o portal para acompanhar a sua candidatura! <a href="https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/">https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/</a></p></td>
                            </tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
	    </section>
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
	margin-top: 30px;
}

footer img{
	padding:2px;
	align:center;
}

img#hcp{
	width:90px;
	height:50px;
	margin-top:-150px;
	
	
}

body{
	font-size: 16px;
	background-color: white;
	Font-family: Cambria, Georgia, serif.;

}

div#reflexo{
	
	background-color: white;
	height: 560px;
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