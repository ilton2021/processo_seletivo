<html>
 <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head> 
<body id="page-top">
	<div class="container" style="margin-top: 20px;">
	  @if (session('validator'))
      <div class="alert alert-success">
        {{ session('validator') }}
      </div>
	  @endif 
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Avaliação de Entrevista GESTOR: (<?php echo $candidato[0]->nome; ?>)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
			    <form method="POST" action="{{ route('storeAvaliacaoEntrevistaGestor', array($processos[0]->id,$candidato[0]->id)) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    <tr>
					 <td colspan="4"><b><center> AVALIAÇÃO DE ENTREVISTA GESTOR: </center></b></td>
					</tr>
					<tr>
                      <td><center>O Candidato foi:</center></td>
				      <td>
						<center>
							<select id="entrevista_gestor" name="entrevista_gestor" class="form-control" required> 
								<option value="">Selecione...</option>
								@if($candidato[0]->entrevista_gestor == "Aprovado (a)")<option selected value="Aprovado (a)">Aprovado (a)</option>@else<option value="Aprovado (a)">Aprovado (a)</option>@endif
								@if($candidato[0]->entrevista_gestor == "Reprovado (a)")<option selected value="Reprovado (a)">Reprovado (a)</option>@else<option value="Reprovado (a)">Reprovado (a)</option>@endif
								@if($candidato[0]->entrevista_gestor == "Contratado (a)")<option selected value="Contratado (a)">Contratado (a)</option>@else<option value="Contratado (a)">Contratado (a)</option>@endif		
							</select>
						</center>
					  </td>
				    </tr>
					<tr>
					 <td colspan="2">
					 <p align="right"><a href="javascript:history.back();" id="Voltar" name="Voltar" type="button" style="color: #FFFFFF;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" value="Salvar" id="Salvar" name="Salvar" /> 				 
					</tr>
				</table>
				</form>
			  </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
