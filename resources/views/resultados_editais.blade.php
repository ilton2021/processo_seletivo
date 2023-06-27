<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCP - Hospital de Câncer de Pernambuco</title>
	<link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css" />
	<script type="{{ asset('text/javascript') }}"> </script>        
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link href="https://www.hcp.org.br/plugins/content/addtoany/addtoany.css" rel="stylesheet" type="text/css" />
</head>
    <body class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
        
		<header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
		<div id="sp-logo" class="span2"><div class="logo-wrapper"><a href="/"><img alt="" class="image-logo" src="/images/layout/marca-site-hcp.png" /></a></div></div>
		<div id="sp-menu" class="span7">	
			<div>
			  <p style="margin-left: -150px"><img width="150" src="../../../img/gestao.png" alt=""></p>
			  <p style="margin-top: -80px; margin-left: 200px; font-size: 26px; font-family: Lucida Console, Courier, monospace;">PROCESSO SELETIVO HCP GESTÃO</p> <br>
			  <p style="margin-left: 215px; font-size: 15px; font-color: green;">Bem Vindo ao Processo Seletivo das Unidades da OS HCP Gest&atilde;o </p>
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
						 <table class="table table-responsive table-border table-striped" align="center" border="2" width="500" bordercolor=DCDCDC >
						    <tr>
							  <td><p style="font-size: 20px; margin-top: 20px;"><center> EDITAIS EM CURSO: </center></p></td>
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
			  <table class="table table-responsive table-border table-striped" border="2" bordercolor=DCDCDC>
				<thead>
				  <tr>
					<th scope="col">Nome do Processo</th>
					<th scope="col"><center>Unidade</center></th>
					<th scope="col"><center>Início Inscrição</center></th>
					<th scope="col"><center>Fim Inscrição</center></th>
					<th scope="col"><center>Edital</center></th>
				  </tr>
				</thead>
				<tbody>
				   @foreach($processos as $prc)
					   <tr>
						<td>{{ $prc->nome }}</td>
						@if($prc->unidade_id == 1) <td><center>HCP Gestão</center></td> 
						@elseif($prc->unidade_id == 2) <td><center>HMR</center></td> 
						@elseif($prc->unidade_id == 3) <td><center>UPAE BELO JARDIM</center></td> 
						@elseif($prc->unidade_id == 4) <td><center>UPAE ARCOVERDE</center></td> 
						@elseif($prc->unidade_id == 5) <td><center>UPAE ARRUDA</center></td> 
						@elseif($prc->unidade_id == 6) <td><center>UPAE CARUARU</center></td> 
						@elseif($prc->unidade_id == 7) <td><center>HSS</center></td> 
						@elseif($prc->unidade_id == 8) <td><center>HPR</center></td> 
						@elseif($prc->unidade_id == 9) <td><center>IGARASSU</center></td> 
						@elseif($prc->unidade_id == 12) <td><center>PALMARES</center></td> @endif
						<td><center>{{ $prc->inscricao_inicio }}</center></td>
						<td><center>{{ $prc->inscricao_fim }}</center></td>
						<td style="width: 40px;" title=""><center><a target="_blank" class="btn btn-success btn-sm" href="{{asset('storage/')}}/{{($prc->edital_caminho)}}"><strong>Download</strong></a></center></td>
					   </tr>   
				  @endforeach
			    </tbody>
			</table>
	    </section>
	  </div>
  </body>
</html>