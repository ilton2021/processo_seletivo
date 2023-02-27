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
              <h6 class="m-0 font-weight-bold text-primary">Ranking dos Candidatos:</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                 	<tr>
                      <td>NOME:</td>
                      <td>CPF:</td>
                      <td>NOTA:</td>
                      <td><center>EXPERIÊNCIA:</center></td>
                  </tr>
                  <?php 
                    function my_sort($a, $b) {
                        if ($a == $b) {
                            return 0;
                        }
                        return ($a > $b) ? -1 : 1;
                    }
                    uasort($candidatos, "my_sort"); 
                  ?>
                  <tr>
                   @foreach($candidatos as $cand2)
                    <td> {{ $cand2['nome'] }} </td> 
                    <td> {{ preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cand2['cpf']) }} </td>
                    <td> {{ $cand2['soma'] }} </td>
                    <td><center>
                    @if($cand2['emp1'])
                    <button title="Detalhes Experiências" type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop_<?php echo $cand2['id']; ?>">
                      <i class="fas fa-plus">Experiências</i>
                    </button>
                    <div class="modal fade bd-example-modal-lg" id="staticBackdrop_<?php echo $cand2['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" width="1000px;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">DETALHES - EXPERIÊNCIAS</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <table class="table table-sm">
                         <tr>
                          <td>
                            <font size="2"><b>Empresa 01: (<?php echo $cand2['a1']; ?> dias) </b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['emp1']; ?>' /> 
                            <font size="2"><b>Cargo:</b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['crg1']; ?>' /> 
                          </td>
                          <td>
                            <font size="2"><b>Data Início:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtI1']; ?>' />
                            <font size="2"><b>Data Fim:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtF1']; ?>' />
                          </td>
                         </tr>
                        </table>
                        <table class="table table-sm">
                         <tr>
                          <td>
                            <font size="2"><b>Empresa 02: (<?php echo $cand2['a2']; ?> dias) </b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['emp2']; ?>' /> 
                            <font size="2"><b>Cargo:</b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['crg2']; ?>' /> 
                          </td>
                          <td>
                            <font size="2"><b>Data Início:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtI2']; ?>' />
                            <font size="2"><b>Data Fim:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtF2']; ?>' />
                          </td>
                         </tr>
                        </table>
                        <table class="table table-sm">
                         <tr>
                          <td>
                            <font size="2"><b>Empresa 03: (<?php echo $cand2['a3']; ?> dias) </b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['emp3']; ?>' /> 
                            <font size="2"><b>Cargo:</b></font>
                            <input class='form-control form-control-sm' type='text' readonly value='<?php echo $cand2['crg3']; ?>' /> 
                          </td>
                          <td>
                            <font size="2"><b>Data Início:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtI3']; ?>' />
                            <font size="2"><b>Data Fim:</b></font>
                            <input class='form-control form-control-sm' type='date' readonly value='<?php echo $cand2['dtF3']; ?>' />
                          </td>
                         </tr>
                        </table>
                       </div>
                      </div>
                    </div>                                              
                    @endif</center>
                    </td>
                   </tr>
                   @endforeach 
                </table>
                <table border="0" width="1000">
                 <tr>
                  <td colspan="2" align="right">
                    <a href="{{route('cadastrarResultados', $processos[0]->id)}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
                  </td>
                 </tr>
                </table>
             </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>
