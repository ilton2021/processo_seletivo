<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Processo Seletivo - Hospital de Câncer de Pernambuco</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('js/utils.js') }}" rel="stylesheet">
	<link href="{{ asset('js/bootstrap.js') }}" rel="stylesheet">
</head>
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
        
		<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="/images/layout/marca-site-hcp.png" /></a></div></div>
		<div id="sp-menu" class="span7">	
			<div>
			  <p style="margin-top: 0px; margin-left: 200px; font-size: 26px; font-family: Lucida Console, Courier, monospace;">PROCESSO SELETIVO HCP GESTÃO</p> <br>
			  <p style="margin-left: 215px; font-size: 15px;">Bem Vindo ao Processo Seletivo das Unidades da OS HCP </p>
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
						 <table align="center" border="2" width="500" bordercolor=DCDCDC >
						    <tr>
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> CADASTRO CANDIDATO: </p></td>
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
			  <table class="table table-responsive table-border" border="2" bordercolor=DCDCDC>
			   <tr>
			    <td> <center> Parabéns! Você foi cadastrado no Processo Seletivo: <b>{{ $nprocesso }}</b>! </center> </td>
			   </tr>
               <tr>			   
				<td> <center> Você foi inscrito neste Processo Seletivo no dia: <b><?php echo date('d-m-Y', strtotime('now')) ?></b> </center> </td>
			   </tr>
			   <tr>
				<td> <center> Seu Número de Inscrição é: <b>{{ $nprocesso.'-'.$numero[0]->id }}</b> </center> </td>
			   </tr>
			   <tr>
			    <td> <center> <a id="div" class="btn btn-info" href="{{ route('candidatoIndex') }}">Voltar</a> </center> </td>
			   </tr>
	  		  </table>
	    </section>
	  </div>
	  </div>
	 </div>
  </body>
</html>