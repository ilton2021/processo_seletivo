<!DOCTYPE html>
<head>
    <title>Processo Seletivo - HCP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
	<link href="{{ asset('css/teste.css') }}" rel="stylesheet" type="text/css" />
	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
</head>
    <body  class="page homepage ltr preset1 menu-homepage responsive bg hfeed clearfix">
	  <div class="container">
		<div id="sp-page-builder" class="sp-page-builder  page-1">
		   <div class="page-content">
		      <section class="sppb-section" style="background-repeat:no-repeat;background-size:cover;background-attachment:fixed;background-position:0 0;">
			   <div class="sppb-addon-container" style="">
				  <div class="sppb-addon-content">
					<div class="custom">
					  <div class="container" style="width:100%;"> <br> <br>
						  <header id="sp-header-wrapper" class=" "><div class="container"><div class="row-fluid" id="header">
						  <div class="container text-center">
							<div class="row"> 
								<div class="col"><br> <img width="150px" style="margin-left: 110px" src="{{ asset('img/gestao.png') }}" alt=""> </div>
								<div class="col"><b><font color="#000000" style="margin-top: 40px; margin-left: -20px; font-size: 17px; font-family: Lucida Console, Courier, monospace;"> {{ 'Processo Seletivo: '. $nome }} </font></b></div>
								<div class="col"><br> <img width="150px" style="margin-left: 50px" class="sppb-img-responsive" src="{{asset('img')}}/{{$unidade[0]->caminho}}" alt="{{ $unidade[0]->nome }}" title="{{ $unidade[0]->nome }}"> </div>
							</div>
							<div class="row">
							  <div class="col"> <br><br><font color="#000000" style="margin-left: -20px; font-size: 15px"> A coordenação de recrutamento e seleção divulga o resultado parcial do {{ 'Processo Seletivo: '. $nome }}. </font></div>
							</div>
						  </div>
						  </header>
					  </div>
					 </div>
				   </div>
				 </div>
			  </section>
			  </div>
			  
			  <br>
			  <div class="container text-center">
				<div class="row">
					<div class="col">
					<p align="right"><a href="{{route('candidatoListas', $id)}}" class="btn btn-warning btn-sm" style="margin-top: 5px; color: #FFFFFF;"> VOLTAR <i class="fas fa-undo-alt"></i> </a></p>
					</div>
				</div>
			  </div>
			  
			  <div class="tab-content" id="myTabContent">
			  @if($idE == 1)
				<table class="table table-bordered table-striped" border="2" width="700px;" bordercolor=DCDCDC>
				<thead>
				 <tr>
				  <td colspan="4" style="background-color: #D3D3D3;"><font size="4"><center><strong>AVALIAÇÃO DE CONHECIMENTO</strong></center></font></td>
				 </tr>
				 <tr>
				  <td><center>NOME:</center></td>
				  <td><center>VAGA:</center></td>
				  <td></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id; ?>"> 
					  RESULTADO
				  </button> 
				  </center>
				  <div class="modal" style="width: 600px; height: 500px;" id='exampleModal<?php echo $processo_res->id; ?>' role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'> 
					  <div class='modal-body'>
					    <center>
						 <h5 class='modal-header'>
							{{ $processo_res->nome }} 
							<button class='btn btn-info btn-md' class='close' data-dismiss='modal'>&times;</button>
						 </h5>
						</center>
					  </div>
					  <div class='modal-header'>
					   <div class="container">
						<div class="row">
							<div class="col"><b>Avaliação de Conhecimento:</b></div>
						</div>
						<div class="row">
							<div class="col"><p align="justify"><br>{{ $processo_res->msg_avaliacao }}</a></div>
						</div> 
						<div class="row">
							<div class="col"><b>Resultado:</b></div>
						</div>
						<div class="row">
							<div class="col"><br><h4><span style="background-color: #00D7FF;">{{ $processo_res->status_resultado }}</span></h4></div>
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
				  <td colspan="4" style="background-color: #D3D3D3;"><font size="4"><center><strong><h5>ENTREVISTA PROFISSIONAL</h5></strong></center></font></td>
				 </tr>
				 <tr>
				  <td><center>NOME:</center></td>
				  <td><center>VAGA:</center></td>
				  <td></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id?>"> 
					  RESULTADO
				  </button> 
				  <div class="modal" style="width: 600px; height: 500px;" id="exampleModal<?php echo $processo_res->id ?>" >
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-body'>
					   <center>
						<h5 class='modal-header'>
						   {{ $processo_res->nome }}
						   <button class='btn btn-info btn-md' class='close' data-dismiss='modal'>&times;</button>
						</h5>
					   </center>
					  </div>
					  <div class='modal-header'>
					    <div class="container">
    					 <div class="row">
						   <div class="col"><b><p align="justify">Entrevista Profissional:</p></b></div>
						 </div>
						 <div class="row">
      					   <div class="col"><p align="justify">{{ $processo_res->msg_entrevista }}</p> </div>
						 </div>
						 <div class="row">
      					   <div class="col"><b><p align="justify">Resultado:</p></b></div>
						 </div>
						 <div class="row">
     					   <div class="col"> 
							 <h4><span style="background-color: #00D7FF;">{{ $processo_res->status_resultado }}</span></h4>
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
			  <table class="table table-bordered table-striped" border="2" width="800px" bordercolor=DCDCDC id="entrevista">
				<thead>
				 <tr>
				  <td colspan="4" style="background-color: #D3D3D3;"><font size="4"><center><strong><h5>APROVADOS(AS)</h5></strong></font></td>
				 </tr>
				 <tr>
				  <td><center>NOME:</center></td>
				  <td><center>VAGA:</center></td>
				  <td></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $processo_res->id?>" > 
					  RESULTADO
				  </button> 
				  </center>
				  <div style="width: 600px; height: 500px;" class="modal" id='exampleModal<?php echo $processo_res->id ?>' role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-body'>
					   <center>
						<h5 class='modal-header'>
							{{ $processo_res->nome }}
							<button class='btn btn-info btn-md' class='close' data-dismiss='modal'>&times;</button>
						</h5>
					  </div>
					  <?php if(!empty($processo_res->data_convocacao)) { ?>
					  <div class='modal-header'>
					    <div class="container">
						 <div class="row">
						  <div class="col"><b>Convocado (a):</b>  
						   <?php echo date('d/m/Y', strtotime($processo_res->data_convocacao)); ?>
						  </div>
						 </div>
						 <div class="row">
						  <div class="col">
							<p align="justify">{{ $processo_res->msg_convocacao }}</p>
						  </div>
						 </div>
					    </div>
					  <?php } ?>
					  <div class='modal-header'>
					   <div class="container">
					    <div class="row">
						 <div class="col">
						  <p align="justify">{{ $processo_res->msg_resultado }}</p>
						 </div>
						</div>
					    <div class="row">
						 <div class="col"><b>Resultado:</b></div>
						</div>
						<div class="row">
						 <div class="col">
						  <center>
						   <h4><span style="background-color: #00D7FF;">Aprovado</span></h4>
						  </center>
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
				  <td colspan="4" style="background-color: #D3D3D3;"><font size="4"><center><strong><h5>CADASTRO DE RESERVA</h5></strong></center></font></td>
				 </tr>
				 <tr>
				  <td><center>NOME:</center></td>
				  <td><center>VAGA:</center></td>
				  <td></td>
				 </tr>
                </thead>
				<tbody> 
				@foreach($processos_result as $processo_res)
				 <tr>
				  <td><center>{{ strtoupper($processo_res->nome) }}</center></td>
				  <td><center>{{ strtoupper($processo_res->vaga) }}</center></td>
				  <td><center>
				  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#exampleModal4<?php echo $processo_res->id?>" > 
					  RESULTADO
				  </button> 
				  </center>
				  <div class="modal" style="width: 600px; height: 500px;" id='exampleModal4<?php echo $processo_res->id ?>' role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class='modal-content'>
					  <div class='modal-body'>
					   <center>
						<h5 class='modal-header'>{{ $processo_res->nome }} 
						 <button class='btn btn-info btn-md' class='close' data-dismiss='modal'>&times;</button>
						</h5>
					   </center>
					  </div>
					  <div class='modal-header'>
					   <div class="container">
					    <div class="row">
						 <div class="col"><b>Cadastro de Reserva:</b></div>
					    </div>
						<div class="row">
						 <div class="col">
							<p align="justify"><br>{{ $processo_res->msg_resultado }}</p>
						 </div>
						</div>
						<div class="row">
						 <div class="col"><b>Resultado:</b></div>
						</div>
						<div class="row">
						 <div class="col">
							<h4><span style="background-color: #00D7FF;">Cadastro de Reserva</span></h4>
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
	 
  </body>
</html>