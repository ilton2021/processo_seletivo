@extends('navbar.default-navbar')
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
                <td colspan="2" align="right"> <a href="{{route('pesquisaAvaliacao')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a> </td>
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