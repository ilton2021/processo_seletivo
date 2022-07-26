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
						 <table class="table table-borderless" align="center" border="0" width="800" bordercolor=DCDCDC >
							<tr>
							  <td><img width="180" id="img-unity" src="{{asset('img')}}/{{'gestao.png'}}" class="rounded-sm" alt="..."></td>
							  <td align="center"><p style="font-size: 14px; margin-top: 10px;"><b>Agora é com a empresa!</b></p></td>
                            </tr>
							<tr>
							  <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Você finalizou a etapa Currículo no processo seletivo do HCPGESTÃO. Agora, eles analisarão sua compatibilidade com a vaga e decidirão se você avança para as próximas etapas.</p></td>
                            </tr>
                            <tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Fique de olho no e-mail (inclusive na caixa de spam) e telefone que você cadastrou para ficar sabendo dos próximos passos. Esperamos que esse retorno seja rápido.</p></td>
                            </tr>
							<tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Você poderá alterar seus dados, enquanto este Processo Seletivo estiver em vigor.</b></p></td>
                            </tr>
							<tr>
                              <td align="justify" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Boa sorte! Estamos torcendo por você. ;-) Seu <b>número de Inscrição é: {{ $numeroInscricao }}</b></p></td>
                            </tr>
                            <tr>
                              <td align="center" colspan="2"><p style="font-size: 14px; margin-top: 10px;">Acesse o Portal para informações: <a href="https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/">https://hcpgestao.org.br/processo_seletivo_hcpgestao/public/</a></p></td>
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