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
        @if($errors->any())
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
              <h6 class="m-0 font-weight-bold text-primary">Número de Inscritos:</h6>
            </div>
			<?php  ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                  <thead>
				    <tr>
					 <td colspan="2" align="right"> <a href="{{route('home')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a> </td>
					</tr>
                    <tr>
                      <th>Processo Seletivo</th>
					  <th>Nº de Inscritos</th>
				    </tr>
                  </thead>
				   <tfoot>
                    <tr>
					@if($qtd>0)
                      <th>{{ $processo[0]->nome }}</th>
                      <th>{{ $qtd }}</th>
					@else
					  <th>{{ $processo[0]->nome }}</th>
					  <th>0</th>				  
                    @endif
					</tr>
				 </tfoot>
				 </table>
				 <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
					@foreach($vagas as $v)
					<tr>
					  <th>{{ $v->vaga }}</th>
					  <th>{{ $v->count }}</th>
					</tr>
					@endforeach
                  </tfoot>
				  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>