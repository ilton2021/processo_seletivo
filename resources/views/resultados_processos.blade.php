<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>HCP - Hospital de Câncer de Pernambuco</title>
	<link href="../../css/teste.css" rel="stylesheet" type="text/css" />
	<script type="../../text/javascript"> </script>        
	<link href="https://www.hcp.org.br/plugins/content/addtoany/addtoany.css" rel="stylesheet" type="text/css" />
</head>
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
        
		<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="/images/layout/marca-site-hcp.png" /></a></div></div>
		<div id="sp-menu" class="span7">	
			<div>
			  <p style="margin-left: -150px"><img width="150" src="../../img/gestao.png" alt=""></p>
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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> RESULTADOS ANTERIORES: </p></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  @if ($errors->any())
				<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
				</div>
			  @endif
			  <p align="right"><a href="{{route('candidatoIndex')}}" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></p>
			  <table class="table table-responsive table-border" border="2" bordercolor=DCDCDC>
				<thead>
				  <tr>
					<th scope="col">Nome do Processo</th>
					<th scope="col"><center>Unidade</center></th>
					<th scope="col"><center>Início Inscrição</center></th>
					<th scope="col"><center>Fim Inscrição</center></th>
					<th scope="col"><center>Edital</center></th>
					<th scope="col"><center>Resultado</center></th>
				  </tr>
				</thead>
				<tbody>
				 @foreach($processos as $processo)
				   <tr>
				    <td style="width: 310px;" title="">{{$processo->nome}}</td>
					<td style="width: 160px;" title=""><center>{{$unidade->nome}}</center></td>
					<td style="width: 70px;" title=""><center>{{date('d-m-Y', (strtotime($processo->inscricao_inicio)))}}</center></td>
					<td style="width: 40px;" title=""><center>{{date('d-m-Y', (strtotime($processo->inscricao_fim)))}}</center></td>
					<td style="width: 40px;" title=""><center><a target="_blank" class="btn btn-success" href="{{asset('storage/')}}/{{($processo->edital_caminho)}}"><strong>Download</strong></a></center></td>
					<td style="width: 20px;"> 
					 <strong><center><a id="div" class="btn btn-info" href="{{ route('candidatoListas', $processo->id) }}">Resultado</a></center></strong>						
				    </td>
				  </tr>							 
			     @endforeach
				 
			    </tbody>
			</table>
	    </section>
	  </div>
  </body>
</html>