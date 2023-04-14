<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/7656d93ed3.js" crossorigin="anonymous"></script>
<body id="page-top">
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
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Escolha a Vaga:</h6>
            </div>
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
            <form method="POST" action="{{ route('ranking', $processos[0]->id) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <thead>
              <tr>
                <td>
                <select class="form-control form-control-sm2" id="vaga_id" name="vaga_id" required> 
                  <option value="">Selecione...</option>
                  @foreach($vagas as $vaga)
                  <option value="<?php echo $vaga->nome ?>">{{ $vaga->nome }}</option>
                  @endforeach
                </select>
                </td> 
                <td>
                  <center>
                    <input type="submit" style="margin-top: 10px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" />  </td>
                  </center>
                <td>
                  <center>
                    <a href="{{route('cadastrarResultados', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
                  </center>
                </td>
              </tr>
              </thead>
            </form>
            </table>
          </div>
        </div>
      </div>
</body>
</html>
