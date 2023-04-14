@extends('navbar.default-navbar')

<body id="page-top">
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
          <h6 class="m-0 font-weight-bold text-primary">Perguntas:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
              <tr>
                <td align="right" colspan="4" border="0">
                  <a href="{{route('home')}}" style="color: #FFFFFF; margin-top: 5px;" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
                  <a class="btn btn-dark btn-sm" style="color: #FFFFFF; margin-top: 5px;" href="{{route('perguntasNovo')}}"> Novo <i class="fas fa-check"></i></a>
                </td>
              </tr>
            </table>
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
              <tr>
                <th>
                  <center>Descrição</center>
                </th>
                <th>
                  <center>Alterar</center>
                </th>
                <th>
                  <center>Excluir</center>
                </th>
              </tr>
              </thead>
              @foreach($perguntas as $pergunta)
              <tfoot>
                <tr>
                  <th>{{ $pergunta->descricao }}</th>
                  <th>
                    <center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('perguntasAlterar', $pergunta->id) }}"> <i class="fas fa-edit"></i></a></center>
                  </th>
                  <th>
                    <center><a class="btn btn-danger btn-sm" style="color: #FFFFFF;" href="{{ route('perguntasExcluir', $pergunta->id) }}"> <i class="fas fa-times-circle"></i></a></center>
                  </th>
                </tr>
              </tfoot>
              @endforeach
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</body>

</html>