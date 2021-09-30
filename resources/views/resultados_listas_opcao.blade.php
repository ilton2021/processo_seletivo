<!DOCTYPE html>
<head>
    <title>Processo Seletivo - HCP</title>
	<link rel='stylesheet' href="{{ asset('../js/bootstrap.js') }}"/>
	<link rel='stylesheet' href="{{ asset('../js/utils.js') }}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	
</head>
    <body  class="page homepage  ltr preset1 menu-homepage responsive bg hfeed clearfix">
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
							  <td align="center"><img width="180" class="sppb-img-responsive" src="{{asset('Img/gestao.png')}}" alt="" title=""></td>
							@if(!empty($processo_res))
							   
							@else
							  <td align="center" width="600"><p style="font-size: 20px; margin-top: 20px; font-family: Lucida Console, Courier, monospace;">{{ 'Processo Seletivo: '. $nome }} </p></td>
							  <td align="center"><img width="180" class="sppb-img-responsive" src="{{asset('img')}}/{{$unidade[0]->caminho}}" alt="" title=""></td>
							@endif  
							<tr><td colspan="3">&nbsp;&nbsp;</td></tr>
							</tr>
							<tr>
							 <td colspan="3"><center>A coordenação de recrutamento e seleção divulga os resultado parcial do {{ 'Processo Seletivo: '. $nome }}.</center></td>
							</tr>
						  </table>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>	 
			  </div>
			  
			  <br><br><br><br>
			  <table class="table table" id="dataTable" width="10px" cellspacing="0">
                 <form method="POST" action="{{ route('pesquisarCandidatoResultado', array($id,$idE,$nome)) }}">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <thead>
				    <tr>
					 <td style="width: 600px"> 
						<input style="width: 560px" type="text" id="pesq" name="pesq" class="form-control" placeholder="Pesquisar pelo Nome do Candidato" />
					 </td> 
					 <td>	
					    <input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" /> 				 
					 </td>
					 <td align="right" colspan="0" border="0"> 
					  <p align="right"><a href="{{route('candidatoListas', $id)}}" class="btn btn-warning btn-sm" style="margin-top: 5px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></p>
					 </td>
					</tr>
				  </thead> 	
			  </table>
			  
			  
			  <div class="tab-content" id="myTabContent">
			  @if($idE == 1)
				<table class="table table-bordered table-striped" border="2" width="500px;" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td align="center" colspan="4" style="background-color: #D3D3D3;"><h5>AVALIAÇÃO DE CONHECIMENTO</h5></td>
				  </tr>
				 <tr>
				  <td align="center"> Nome </td>
				  <td align="center"> Vaga </td>
				  <td align="center"> Resultado </td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id; ?>"> 
					  Resultado
				  </button> 
				  </center>
				  <div class="modal fade" id='exampleModal<?php echo $processo_res->id; ?>' role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'> 
					  <div class='modal-header'>
						<h5 class='modal-title' align="left">{{ $processo_res->nome }}</h5>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					  </div>
					  <div class='modal-body'>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Avaliação de Conhecimento</b> -  </div>
						 <div class='panel-body'>
							<p align="justify">{{ $processo_res->msg_avaliacao }}</a>
						 </div>
						</div>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Resultado</b></div>
						 <div class='panel-body'>
							<h4><span class='label label-primary'>{{ $processo_res->status_resultado }}</span></h4>
						 </div>
						</div>
					  </div>
					  <div class='modal-footer'>
						<span class='codigo'>{{ $nome }}</span>
					  </div>
				   </div>
				  </div>
				 </div>
				 </td>
				 </tr>
				@endforeach
				</tbody>
			  </table>
			  @elseif($idE == 2)
			  <table class="table table-bordered table-striped"  border="2" width="700px" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td align="center" colspan="4" style="background-color: #D3D3D3;"><h5>ENTREVISTA PROFISSIONAL</h5></td>
				 </tr>
				 <tr>
				  <td hidden>ID</td>
				  <td align="center" style="font-size: 14px"> Nome </td>
				  <td align="center"> Vaga </td>
				  <td align="center">Resultado</td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 
				 <tr>
			      <td hidden><center>{{ $processo_res->id }} </center></td>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id?>"> 
					  Resultado
				  </button> 
				  <div class="modal fade" id="exampleModal<?php echo $processo_res->id ?>" >
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-header'>
						<h5 class='modal-title' align="left">{{ $processo_res->nome }}</h5>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					  </div>
					  <div class='modal-body'>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Entrevista Profissional</b> -  </div>
						 <div class='panel-body'>
							<p align="justify">{{ $processo_res->msg_entrevista }}</a>
						 </div>
						</div>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Resultado</b></div>
						 <div class='panel-body'>
							<h4><span class='label label-primary'>{{ $processo_res->status_resultado }}</span></h4>
						 </div>
						</div>
					  </div>
					  <div class='modal-footer'>
						<span class='codigo'>{{ $nome }}</span>
					  </div>
				   </div>
				  </div>
				 </div>
				 </td>
				 </tr>
				 
				@endforeach
				</tbody>
			  </table>
			  @elseif($idE == 3)
			  <table class="table table-bordered table-striped" border="2" width="500" bordercolor=DCDCDC id="entrevista">
				<thead>
				 <tr>
				  <td align="center" colspan="4" style="background-color: #D3D3D3;"><h5>APROVADOS(AS)</h5></td>
				  </tr>
				 <tr>
				  <td align="center"> Nome </td>
				  <td align="center"> Vaga </td>
				  <td align="center"> Resultado </td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id?>" > 
					  Resultado
				  </button> 
				  </center>
				  <div class="modal fade" id='exampleModal<?php echo $processo_res->id ?>' role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-header'>
						<h5 class='modal-title' align="left">{{ $processo_res->nome }}</h5>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					  </div>
					  <?php if(!empty($processo_res->data_convocacao)) { ?>
					  <div class='modal-body'>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Convocado (a) </b> -  
						  <?php echo date('d/m/Y', strtotime($processo_res->data_convocacao)); ?>
						 </div>
						 <div class='panel-body'>
							<p align="justify">{{ $processo_res->msg_convocacao }}</a>
						 </div>
						</div>
					  </div>
					  <?php } ?>
					  <div class='modal-body'>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Resultado</b>  
						 </div>
						 <div class='panel-body'>
						    <h4><span class='label label-primary'>Aprovado</span></h4>
							<p align="justify">{{ $processo_res->msg_resultado }}</a>
						 </div>
						</div>
					  </div>
					  <div class='modal-footer'>
						<span class='codigo'>{{ $nome }}</span>
					  </div>
				   </div>
				  </div>
				 </div>
				 </td>
				 </tr>
				@endforeach
				</tbody>
			  </table>
			  @elseif($idE == 4)
			  <table class="table table-bordered table-striped" border="2" width="500" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td align="center" colspan="4" style="background-color: #D3D3D3;"><h5>CADASTRO DE RESERVA</h5></td>
				  </tr>
				 <tr>
				  <td align="center"> Nome </td>
				  <td align="center"> Vaga </td>
				  <td align="center"> Resultado </td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4<?php echo $processo_res->id?>" > 
					  Resultado
				  </button> 
				  </center>
				  <div class="modal fade" id='exampleModal4<?php echo $processo_res->id ?>' role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-header'>
						<h5 class='modal-title' align="left">{{ $processo_res->nome }} - {{ $processo_res->cpf }}</h5>
						<button type='button' class='close' data-dismiss='modal'>&times;</button>
					  </div>
					  <div class='modal-body'>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Cadastro de Reserva</b> -  </div>
						 <div class='panel-body'>
							<p align="justify">{{ $processo_res->msg_resultado }}</a>
						 </div>
						</div>
						<div class='panel panel-default'>
						 <div class='panel-heading'><b>Resultado</b></div>
						 <div class='panel-body'>
							<h4><span class='label label-primary'>Cadastro de Reserva</span></h4>
						 </div>
						</div>
					  </div>
					  <div class='modal-footer'>
						<span class='codigo'>{{ $nome }}</span>
					  </div>
				   </div>
				  </div>
				 </div>
				 </td>
				 </tr>
				@endforeach
				</tbody>
			  </table>	
			  @endif
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