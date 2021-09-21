<!DOCTYPE html>
<head>
    <title>Processo Seletivo - HCP</title>
	<link rel='stylesheet' href="{{ asset('../js/bootstrap.js') }}"/>
	<link rel='stylesheet' href="{{ asset('../js/utils.js') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
</head>
    <body class="page homepage ltr preset1 menu-homepage responsive bg hfeed clearfix">
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
			 <section  class="sppb-section " style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						 <table align="center" border="0" width="800" bordercolor=DCDCDC>
						    <tr>
							  <td align="center"><img width="180" class="sppb-img-responsive" src="{{asset('img/gestao.png')}}" alt="Hospital do Câncer de Pernambuco" title="Hospital do Câncer de Pernambuco"></td>
							  <td align="center" width="600"><p style="font-size: 20px; margin-top: 20px; font-family: Lucida Console, Courier, monospace;">{{ 'Processo Seletivo: '. $processos[0]->nome }} </p></td>
							  <td align="center"><img width="180" class="sppb-img-responsive" src="{{asset('img')}}/{{$unidade[0]->caminho}}" alt="{{ $unidade[0]->nome }}" title="{{ $unidade[0]->nome }}"></td>
							<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
							</tr>
							<tr>
							 <td colspan="3"><center>A coordenação de recrutamento e seleção divulga os resultado parcial do {{ 'Processo Seletivo: '. $processos[0]->nome }}.</center></td>
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
			  <p align="right"><a href="{{route('candidatoResultados', $processos[0]->unidade_id)}}" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></p>
			  <br><br>
			  <div class="tab-content" id="myTabContent">
				<table class="table table-bordered table-striped" border="2" width="500px;" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td colspan="4"><center><h3>Escolha uma opção:</h3></center></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos as $processo)
				 <tr>
				  <td><center><a href="{{ route('candidatoListasOpcao', array($processo->id, 1, $processo->nome)) }}">Avaliação de Conhecimento</a></center></td>
				  <td><center><a href="{{ route('candidatoListasOpcao', array($processo->id, 2, $processo->nome)) }}">Entrevista Profissional</a></center></td>
				  <td><center><a href="{{ route('candidatoListasOpcao', array($processo->id, 3, $processo->nome)) }}">Aprovados</a></center></td>
				  <td><center><a href="{{ route('candidatoListasOpcao', array($processo->id, 4, $processo->nome)) }}">Cadastro de Reserva</a></center></td>
				 </tr>
				 
				 @if($processo->id == 100)
			       <tr>
			           <td colspan='4'><br><br><center>O Resultado dos Candidatos Aprovados deste Processo Seletivo sairá até o dia <b>02/02/2021</b>.</center></td>
			       </tr>
			     @endif
			     @if($processo->id == 122)
			       <tr>
			           <td colspan='4'><br><br><center>O Resultado dos Candidatos Aprovados deste Processo Seletivo sairá até o dia <b>12/04/2021</b>.</center></td>
			       </tr>
			     @endif
			     @if($processo->id == 115)
			       <tr>
			           <td colspan="8"><br><br><center>O Processo Seletivo: UPAE CARUARU 01/2021 foi cancelado. <a href="{{asset('storage')}}/{{'Cancelamento Seleção pessoal HCP Gestão UPAE CARUARU - 01.2021.pdf'}}">clique aqui.</a></center></td>
			       </tr>
			     @endif
				@endforeach
				</tbody>
			  </table>
			 
			</div>
		</div>
	    </section>
	  </div>
	 </div>
	 
	 <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
	 <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
	 <script>
	  $(function () {
		$('.dropdown-toggle').dropdown();
	  }); 
	 </script>
  </body>
</html>