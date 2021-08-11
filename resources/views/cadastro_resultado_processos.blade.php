@extends('navbar.default-navbar')
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<div class="container" style="margin-top: 80px;">
		@if ($errors->any())
		 <div class="alert alert-danger">
		  <ul>
		    @foreach ($errors->all() as $error)
		      <li>{{ $error }}</li>
			@endforeach
		  </ul>
		 </div>
		@endif
        <div class="container">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Cadastro do Resultado do Processo Seletivo: <br><br> {{ $pseletivo[0]->nome }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                 <form method="POST" action="{{ route('pesquisarCandidato', $pseletivo[0]->id) }}">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				  <thead>
				    <tr>
					 <td style="width: 600px"> 
						<input style="width: 560px" type="text" id="pesq" name="pesq" class="form-control" placeholder="Digite aqui..." />
					 </td> 
					 <td>
					   <select class="form-control" id="tipo" name="tipo">
						  <option id="tipo" name="tipo" value="nome">NOME</option>
						  <option id="tipo" name="tipo" value="vaga">VAGA</option>
						</select>
					 </td>
					 <td>	
					    <input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" /> 				 
					 </td>
					 <td align="right" colspan="0" border="0"> 
					  <a href="{{route('home')}}" id="Voltar" name="Voltar" type="button" style="margin-top: 5px; color: #FFFFFF;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 </td>
					 <td>
					  <a class="text-success" href="{{route('exportCandidatos', array($pseletivo[0]->id, $pseletivo[0]->nome))}}" title="Download"><img src="{{asset('img/csv.png')}}" alt="" width="60"></a>
					 </td>
					</tr>
				  </thead> 	
				</table>
				
				<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                    <tr>
                      <th style="width: 350px;">Nome</th>
					  <th><center>CPF</center></th>
					  <th style="width: 200px;"><center>Vaga</center></th>
					  <th><center>Currículo</center></th>
					  <th><center>Resultado</center></th>	
					  <th><center>Avaliação</center></th>
				    </tr>
                  </thead>
				  @foreach($processos2 as $proc)
				  <tfoot>
                    <tr>
					  <th title="{{ $proc->nome }}"><a href="{{ route('informacoes', array($pseletivo[0]->id, $proc->id)) }}">{{ strtoupper(substr($proc->nome, 0, 40)) }}</a></th>
                      <th title="{{ $proc->cpf }}"><center>{{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $proc->cpf) }}</center></th>
					  <th title="{{ $proc->vaga }}"><center>{{ strtoupper(substr($proc->vaga, 0, 30)) }}</center></th>
					  <th><center>
					  @if($pseletivo[0]->origem == 1)
					  <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/curriculo')}}/{{($pseletivo[0]->nome)}}/{{($proc->nomearquivo2)}}"> <i class="fas fa-file"></i></a></center></th>
					  @else
					  <a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" 
					  href="{{asset('http://hcp.org.br/processoseletivo')}}/{{($pseletivo[0]->nome)}}/{{('admin/lab/uploads')}}/{{($proc->nomearquivo2)}}"> <i class="fas fa-file"></i></a></center></th>
					  @endif
					  <th><center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('resultadoProcessosA', array($pseletivo[0]->id, $proc->id)) }}"> <i class="fas fa-file-alt"></i></a></center></th>
					  <th><center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('avaliacao', array($pseletivo[0]->id, $proc->id)) }}"> <i class="fas fa-file-excel"></i></a></center></th>
				    </tr>
                  </tfoot>
				  @endforeach
                </table>
              </div>
            </div>
			<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
			  <tr>
				<td><p style="margin-left: -400px;"> {{ $processos2->appends(['pesq' => isset($pesq) ? $pesq : ''])->links() }} </p></td>
			  </tr> 
			</table>
          </div>
        </div>
      </div>
</body>
</html>
