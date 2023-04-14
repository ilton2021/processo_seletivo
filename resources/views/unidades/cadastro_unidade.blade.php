@extends('navbar.default-navbar')
<div class="container" style="margin-top: 80px;">
	@if ($errors->any())
	<div class="alert alert-success">
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
				<h6 class="m-0 font-weight-bold text-primary">Unidades:</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<form method="POST" action="{{ route('pesquisar') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<thead>
								<tr>
									<td style="width: 600px">
										<input style="width: 600px" type="text" id="pesq" name="pesq" class="form-control" placeholder="Pesquisar pelo Nome da Unidade" />
									</td>
									<td>
										<input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" />
									</td>
									<td align="right" colspan="4" border="0">
										<a href="{{route('home')}}" style="color: #FFFFFF; margin-top: 5px;" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
										<a class="btn btn-dark btn-sm" style="color: #FFFFFF; margin-top: 5px;" href="{{route('unidadeNovo')}}"> Novo <i class="fas fa-check"></i></a>
									</td>
								</tr>
							</thead>
						</form>
					</table>
					<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
						<thead>
							<tr>
								<th style="width: 500px">Nome</th>
								<th>
									<center>Alterar</center>
								</th>
								<th>
									<center>Excluir</center>
								</th>
							</tr>
						</thead>
						@foreach($unidades as $unidade)
						<tfoot>
							<tr>
								<th>{{ $unidade->nome }}</th>
								<th>
									<center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{route('unidadeAlterar', $unidade->id)}}"> <i class="fas fa-edit"></i></a></center>
								</th>
								<th>
									<center><a class="btn btn-danger btn-sm" style="color: #FFFFFF;" href="{{route('unidadeExcluir', $unidade->id)}}"> <i class="fas fa-times-circle"></i></a> </center>
								</th>
							</tr>
						</tfoot>
						@endforeach

					</table>
				</div>
			</div>
			<table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
				<tr>
					<td>
						<p style="margin-left: -400px;"> {!! $unidades->links() !!} </p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
</body>

</html>