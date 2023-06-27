<!DOCTYPE html>
<head>
    <title>Processo Seletivo - HCP</title>
	<link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css" />
	<script type="{{ asset('text/javascript') }}"> </script>        
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
						  <header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
						  <div class="container text-center">
							<div class="row"> 
								<div class="col"><br> <img width="150px" style="margin-left: 110px" src="{{ asset('img/gestao.png') }}" alt=""> </div>
								<div class="col"><b><font style="margin-top: 40px; margin-left: -20px; font-size: 17px; font-family: Lucida Console, Courier, monospace;"> {{ 'Processo Seletivo: '. $processos[0]->nome }} </font></b></div>
								<div class="col"><br> <img width="150px" style="margin-left: 50px" class="sppb-img-responsive" src="{{asset('img')}}/{{$unidade[0]->caminho}}" alt="{{ $unidade[0]->nome }}" title="{{ $unidade[0]->nome }}"> </div>
							</div>
							<div class="row">
							  <div class="col"> <br><br><font style="margin-left: -20px; font-size: 15px"> A coordenação de recrutamento e seleção divulga o resultado parcial do {{ 'Processo Seletivo: '. $processos[0]->nome }}. </font></div>
							</div>
						  </div>
						  </header>
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
			  <p align="right"><a href="{{route('candidatoResultados', $processos[0]->unidade_id)}}" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> VOLTAR <i class="fas fa-undo-alt"></i> </a></p>
			  <br><br>
			  <div class="tab-content" id="myTabContent">
				<table class="table table-bordered table-striped" border="2" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td colspan="4"><center><h4>Escolha uma opção:</h4></center></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos as $processo)
				 <tr>
				  <td><center><a class="btn btn-success btn-sm" href="{{ route('candidatoListasOpcao', array($processo->id, 1, $processo->nome)) }}"><strong>AVALIAÇÃO DE CONHECIMENTO</strong></a></center></td>
				  <td><center><a class="btn btn-success btn-sm" href="{{ route('candidatoListasOpcao', array($processo->id, 2, $processo->nome)) }}"><strong>ENTREVISTA PROFISSIONAL</strong></a></center></td>
				  <td><center><a class="btn btn-success btn-sm" href="{{ route('candidatoListasOpcao', array($processo->id, 3, $processo->nome)) }}"><strong>APROVADOS</strong></a></center></td>
				  <td><center><a class="btn btn-success btn-sm" href="{{ route('candidatoListasOpcao', array($processo->id, 4, $processo->nome)) }}"><strong>CADASTRO DE RESERVA</strong></a></center></td>
				 </tr>
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