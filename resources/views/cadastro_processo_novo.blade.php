@extends('navbar.default-navbar')
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
              <h6 class="m-0 font-weight-bold text-primary">Cadastro Processo Seletivo:</h6>
            </div>
            <div class="card-body"> <?php $ano = date('Y', strtotime('now')); ?>
              <div class="table-responsive">
			  <form method="POST" action="{{ route('storeProcesso') }}" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                      <td>Nome:</td>
                      <td>
					  	<select id="nome1" name="nome1" class="form-control">
						 <option id="nome1" name="nome1" value="hcpgestao"> hcpgestao </option>
						 <option id="nome1" name="nome1" value="hmr"> hmr </option>
						 <option id="nome1" name="nome1" value="belojardim"> belojardim </option>
						 <option id="nome1" name="nome1" value="arcoverde"> arcoverde </option>
						 <option id="nome1" name="nome1" value="arruda"> arruda </option>
						 <option id="nome1" name="nome1" value="caruaru"> caruaru </option>
						 <option id="nome1" name="nome1" value="hss"> hss </option>
						 <option id="nome1" name="nome1" value="hpr"> hpr </option>
						 <option id="nome1" name="nome1" value="igarassu"> igarassu </option>
						</select>
						<select id="nome2" name="nome2" class="form-control">
						 <?php for($a = 1; $a <= 40; $a++){ ?>
						  @if($a < 10)
						  <option id="nome2" name="nome2" value="<?php echo '0'.$a; ?>">0{{ $a }}</option>	
						  @else
						  <option id="nome2" name="nome2" value="<?php echo $a; ?>">{{ $a }}</option>
						  @endif
						 <?php } ?>
						</select>
						<select id="nome3" name="nome3" class="form-control">
						 <option id="nome3" name="nome3" value="<?php echo $ano; ?>">{{ $ano }}</option>		
						</select>
					  </td>
			        </tr>
                    <tr>
                      <td>Edital:</td>
                      <td><input type="file" class="form-control" id="edital" name="edital" value="" required="true"  /></td>
				    </tr>
					<tr>
                      <td>Unidade:</td>
					  <td>
						<select class="form-control" id="unidade_id" name="unidade_id">
						  @foreach($unidades as $unidade)
							 <option value="<?php echo $unidade->id ?>" id="unidade_id" name="unidade_id">{{ $unidade->nome }}</option>
						  @endforeach
						</select>
					  </td>
                    </tr>
					<tr>
                      <td>Início Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_inicio" name="inscricao_inicio" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Fim Inscrição:</td>
					  <td><input type="date" class="form-control" id="inscricao_fim" name="inscricao_fim" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Data Prova:</td>
					  <td><input type="date" class="form-control" id="data_prova" name="data_prova" value="" required="true" /></td>
                    </tr>
					<tr>
                      <td>Data Resultado:</td>
					  <td><input type="date" class="form-control" id="data_resultado" name="data_resultado" value="" required="true" /></td>
                    </tr>
                </table>
				
				<table>
				  <tr>
				    <td hidden> <input type="text" id="acao" name="acao" value="novo_processo" /> </td>
					<td hidden> <input type="text" id="tela" name="tela" value="processo_novo" /> </td>
					<td hidden> <input type="text" id="user_id" name="user_id" value="" /> </td>
				  </tr>
				</table>
				
				<table border=0 width=1000>
				  <tr >
				   <td colspan="2" align="right">
				     <a href="{{route('cadastroProcesso')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
					 <input type="submit" class="btn btn-success btn-sm" style="margin-top: 10px;" value="Salvar" id="Salvar" name="Salvar" /> 				 
				   </td>
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
