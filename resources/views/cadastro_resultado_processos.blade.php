@extends('navbar.default-navbar')
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
			<div style="background-color:#1d68a7;" class="card-header py-3">
				<h4 style="color:white;">
					<center>Cadastro do Resultado do Processo Seletivo:<br> {{ $pseletivo[0]->nome }}</center>
				</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<form method="POST" action="{{ route('pesquisarCandidato', $pseletivo[0]->id) }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<thead>
								<tr>
									<td style="width: 600px">
										<input style="width: 560px;margin-top:10px;margin-left:10px;font-family:arial black;" type="text" id="pesq" name="pesq" class="form-control" placeholder="Digite aqui..." />
									</td>
									<td>
										<select style="margin-top:10px;font-family:arial black;" class="form-control" id="tipo" name="tipo">
											<option id="tipo" name="tipo" value="nome">NOME</option>
											<option id="tipo" name="tipo" value="vaga">VAGA</option>
										</select>
									</td>
									<td>
										<input type="submit" style="margin-top: 15px;background-color:#1d68a7;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" />
									</td>
									<td align="right" colspan="0" border="0">
										<a href="{{route('pesquisaAvaliacao')}}" id="Voltar" name="Voltar" type="button" style="margin-top: 15px; color: #FFFFFF; background-color:#e06500;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
									</td>
									<td>
										<a class="text-success" style="margin-left:5px;" href="{{route('exportCandidatos', array($pseletivo[0]->id, $pseletivo[0]->nome))}}" title="Download"><img src="{{asset('img/csv.png')}}" alt="" width="60"></a>
									</td>
								</tr>
							</thead>
					</table>

					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th style="width: 350px;">Nome</th>
								<th style="width: 150px;">
									<center>CPF</center>
								</th>
								<th style="width: 300px;">
									<center>Vaga</center>
								</th>
								<th>
									<center>Currículo</center>
								</th>
								<th>
									<center>Resultado</center>
								</th>
								<th>
									<center>Parecer</center>
								</th>
							</tr>
						</thead>
						@foreach($processos2 as $proc)
						<tfoot style="font-size:14px;">
							<tr>
								<th title="{{ $proc->nome }}"><a href="{{ route('informacoes', array($pseletivo[0]->id, $proc->id)) }}">{{ strtoupper(substr($proc->nome, 0, 40)) }}</a></th>
								<th title="{{ $proc->cpf }}">
									<center>{{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $proc->cpf) }}</center>
								</th>
								<th title="{{ $proc->vaga }}">
									<center>{{ strtoupper(substr($proc->vaga, 0, 30)) }}</center>
								</th>
								<th>
									<center>
										@if($pseletivo[0]->origem == 1)
										<a class="btn btn-info btn-sm" style="color: #FFFFFF;" target="_blank" href="{{asset('storage/candidato/curriculo')}}/{{($pseletivo[0]->nome)}}/{{($proc->nomearquivo2)}}"> <i class="fas fa-file"></i></a>
									</center>
								</th>
								@else
								<a class="btn btn-info btn-sm" style="color: #FFFFFF;margin-top:10px;font-size: 25px;" target="_blank" href="{{asset('http://hcp.org.br/processoseletivo')}}/{{($pseletivo[0]->nome)}}/{{('admin/lab/uploads')}}/{{($proc->nomearquivo2)}}"> <i class="fas fa-file-pdf"></i></a></center>
								</th>
								@endif
								<th>
									<center><a class="btn btn-info btn-sm" style="color: #FFFFFF;margin-top:10px;font-size: 25px;" href="{{ route('resultadoProcessosA', array($pseletivo[0]->id, $proc->id)) }}"> <i class="fas fa-file-alt"></i></a></center>
								</th>
								<th>
									<center><a class="btn btn-info btn-sm" style="color: #FFFFFF;margin-top:10px;font-size: 25px;" href="{{ route('avaliacao', array($pseletivo[0]->id, $proc->id)) }}"> <i class="fas fa-tasks"></i></a></center>
								</th>
							</tr>
						</tfoot>
						@endforeach
					</table>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<tr>
							<th style="font-size:20px;">
								<p style="margin-left: -400px;"> {{ $processos2->appends(['pesq' => isset($pesq) ? $pesq : '','tipo' => isset($tipo) ? $tipo : ''])->links() }} </p>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>