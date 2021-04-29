<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Processo Seletivo - Hospital de Câncer de Pernambuco</title>
	<link href="css/teste.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript"> </script>        
	<link href="https://www.hcp.org.br/plugins/content/addtoany/addtoany.css" rel="stylesheet" type="text/css" />
</head>
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
        
		<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="/images/layout/marca-site-hcp.png" /></a></div></div>
		<div id="sp-menu" class="span7">	
			<div>
			  <p style="margin-left: -150px"><img width="150" src="Img/gestao.png" alt=""></p>
			  <p style="margin-top: -80px; margin-left: 200px; font-size: 26px; font-family: Lucida Console, Courier, monospace;">PROCESSO SELETIVO HCP GESTÃO</p> <br>
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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> PROCESSOS ABERTOS: </p></td>
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
				<thead>
				  <tr>
					<th scope="col">Nome do Processo</th>
					<th scope="col"><center>Unidade</center></th>
					<th scope="col"><center>Edital</center></th>
					<th scope="col"><center>Início Inscrição</center></th>
					<th scope="col"><center>Fim Inscrição</center></th>
					<th scope="col"><center>Inscrição</center></th>
				  </tr>
				</thead>
				<tbody>
				<?php $hoje = date('d-m-Y', strtotime('now')); ?>
				  @foreach($processos as $processo)
				   <?php $fim = date('d-m-Y', strtotime($processo->inscricao_fim)); ?>
				   @if(strtotime($fim) >= strtotime($hoje)) 
			  	   <tr>
				    <td style="width: 300px;" title="">{{$processo->nome}}</td>
					<td style="width: 160px;" title="">{{$processo->NOME}}</td>
					<td style="width: 40px;" title=""><center><a target="_blank" class="btn btn-success" href="{{asset('storage')}}/{{$processo->edital_caminho}}"><strong>Download</strong></a></center></td>
					<td style="width: 70px;" title="">{{date('d-m-Y', (strtotime($processo->inscricao_inicio)))}}</td>
					<td style="width: 40px;" title="">{{date('d-m-Y', (strtotime($processo->inscricao_fim)))}}</td>
					<td style="width: 20px;"> 
					 <strong><center><a id="div" class="btn btn-info" href="{{ route('cadastroCandidato', array($processo->unidade_id, $processo->id)) }}" target="_blank">Inscrição</a></center></strong>						
				    </td>
				  </tr>							 
				  @endif			     
				 @endforeach
			    </tbody>
			</table>
	    </section>
	  </div>
	  
	  <br> <br>

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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> EDITAIS EM CURSO: </p></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  <table border="2" bordercolor=DCDCDC>
				<tr>
				   @foreach($unidades as $unidade)
				   <td>
				     <div class="sppb-addon-content">
				       <div class="col-sm-4">
					    	<div id="img-body" class="sborder-0 text-white text-center">
							  @if($unidade->id == 1 || $unidade->id == 7 || $unidade->id == 8)
								<a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm"  width="180px"></a>  
							  @else
								<a href="{{ route('candidatoEditais', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm" style="opacity: 30%"  width="180px"></a> 		  
							  @endif
							</div>
						</div>
				     </div>
				   </td>
				   @endforeach
			   </tr>
			  </table>
	    </section>
	  </div>
	  <br> <br>
	  
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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> RESULTADO DE PROCESSOS ANTERIORES: </p></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  
			  <table border="2" bordercolor=DCDCDC>
				<tr>
					 @foreach($unidades as $unidade)
					 <td>
				     <div class="sppb-addon-content">
				       <div class="col-sm-4">
					    	<div id="img-body" class="sborder-0 text-white text-center">
							   <a href="{{ route('candidatoResultados', $unidade->id) }}" title="{{ $unidade->nome }}"><img id="img-unity" src="{{asset('storage')}}/{{$unidade->caminho}}" class="rounded-sm"  width="180px"></a>
							</div>
						</div>
				     </div>
				   </td>
				   @endforeach
			   </tr>
			  </table>
	    </section>
	  </div>
	 </div>
	 
	 <br> <br>
  </body>
</html>