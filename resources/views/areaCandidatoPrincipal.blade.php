<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Processo Seletivo - Cadastro Candidato</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>	
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/validacaoAlteracao.js') }}"> </script>
</head>
    <body>
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
							  <td align="center"><p style="font-size: 20px; margin-top: 20px;"> ÁREA DO CANDIDATO: </p></td>
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
			  <table class="table table-responsive table-border" border="2" bordercolor=DCDCDC>
				  <tr>
					<td style="width: 300px">NOME:</td>
					<td><input class="form-control form-control-sm" type="text" name="nome" id="nome" value="<?php echo $user[0]->nome; ?>" /></td>
				  </tr>
				  <tr>
					<td>E-MAIL:</td>
					<td><input class="form-control form-control-sm" type="text" name="email" id="email" value="<?php echo $email; ?>" /></td> 
				  </tr>
				  <tr>
					<td>MATRÍCULA:</td>
					<td><input class="form-control form-control-sm" type="text" name="matricula" id="matricula" value="<?php echo $numeroInscricao; ?>" /></td>
				  </tr>
			</table>
			  <p align="right"><a href="{{route('candidatoIndex')}}" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></p>
			  <table class="table table-responsive table-border" border="2" bordercolor=DCDCDC>
				<thead>
				  <tr>
					<th scope="col"><center>ALTERAR INSCRIÇÃO</center></th>
					@if($valida == true)
					<th scope="col"><center>QUESTIONÁRIO</center></th>
					@endif
				  </tr>
				</thead>
				<tbody>
				 <tr>
					<th><center><a href="{{route('areaCandidatoAlterar')}}" class="btn btn-success btn-sm" style="margin-top: 10px; color: #FFFFFF;"> ALTERAR </a></center></th>
					@if($valida == true)
					<th><center><a href="{{ route('questionario', array($unidade[0]->id, $processo[0]->id, $user[0]->id)) }}" class="btn btn-success btn-sm" style="margin-top: 10px; color: #FFFFFF;"> QUESTIONÁRIO </a></center></th>	
					@endif
				 </tr>
			    </tbody>
			</table>
	    </section>
	  </div>
  </body>
</html>