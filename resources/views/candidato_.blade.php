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
        
		<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="/images/layout/marca-site-hcp.png" /></a></div></div>
		<div id="sp-menu" class="span7">	
		<div style= "text-align:center; opacity:75%;border-radius: 25px; color: white;margin-top:-15px;height: 160px;background-color: #57D211;  margin-bottom: -25px; Font-family: Cambria, Georgia, serif."class="jumbotron jumbotron-fluid">
									<div class="container">
										<h5 class="display-8"><b><p style="align: center">PROCESSO SELETIVO HCP GESTÃO<br><img id="hcp" src="{{ asset('img/logo-hcp-branca-350px.png') }}"></td> </p></h5>
									</div>
									</div>	
											
		</div>
	   </div></div>
	   </header>
	   
	   <br>
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
			 <section  class="sppb-section " style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						 <table class="table table-borderless" align="center" border="0" width="500" bordercolor=DCDCDC >
						    <tr>
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;">OLÁ CANDIDATO, SEU CADASTRO FOI CONCLUÍDO</p></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  @if (Session::has('mensagem'))
				@if ($text == true)
				<div class="container">
				 <div class="alert alert-success {{ Session::get ('mensagem')['class'] }} ">
					  {{ Session::get ('mensagem')['msg'] }}
				 </div>
				</div>
			   @endif
			  @endif
			  <table class="table table-borderless" border="1" bordercolor=DCDCDC>
			   <tr>
			    <td> <b><u><center> Parabéns! Você foi cadastrado no Processo Seletivo:</u></b> <b>{{ $nprocesso }}</b>! </center> </td>
			   </tr>
               <tr>			   
				<td><b> <u><center> Você foi inscrito neste Processo Seletivo no dia:</u></b> <b><?php echo date('d-m-Y', strtotime('now')) ?></b> </center> </td>
			   </tr>
			   <tr>
				<td><b><u> <center> Seu Número de Inscrição é:</u></b> <b>{{ $nprocesso.'-'.$numero[0]->id }}</b> </center> </td>
			   </tr>
			   <tr>
			    <td> <center> <a id="div" class="btn btn-primary" href="{{ route('candidatoIndex') }}">Voltar</a> </center> </td>
			   </tr>
	  		  </table>
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