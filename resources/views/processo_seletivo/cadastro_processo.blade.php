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
          <h6 class="m-0 font-weight-bold text-primary">Processos Seletivos:</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
              <form method="POST" action="{{ route('pesquisarProcesso') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <thead>
                  <tr>
                    <td style="width: 600px">
                      <input style="width: 600px" type="text" id="pesq" name="pesq" class="form-control" placeholder="Pesquisar pelo Nome do Processo Seletivo" />
                    </td>
                    <td>
                      <input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Pesquisar" name="Pesquisar" />
                    </td>
                    <td align="right" colspan="4" border="0">
                      <a href="{{route('home')}}" style="color: #FFFFFF; margin-top: 5px;" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a>
                      <a class="btn btn-dark btn-sm" style="color: #FFFFFF; margin-top: 5px;" href="{{route('processoNovo')}}"> Novo <i class="fas fa-check"></i></a>
                    </td>
                  </tr>
                </thead>
              </form>
            </table>
            <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
              <tr>
                <th>Nome</th>
                <th>
                  <center>Início Inscrição</center>
                </th>
                <th>
                  <center>Fim Inscrição</center>
                </th>
                <th>
                  <center>Vagas</center>
                </th>
                <th>
                  <center>Alterar</center>
                </th>
                <th>
                  <center>Excluir</center>
                </th>
                @if(Auth::user()->id == 1 || Auth::user()->id == 21)
                <th>
                  <center>Add Candidato</center>
                </th>
                @endif
              </tr>
              </thead>
              @foreach($processos as $processo)
              <tfoot>
                <tr>
                  <th>{{ $processo->nome }}</th>
                  <th>
                    <center>{{ $processo->inscricao_inicio }}</center>
                  </th>
                  <th>
                    <center>{{ $processo->inscricao_fim }}</center>
                  </th>
                  <th>
                    <center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('vagaCadastro', $processo->id) }}"> <i class="fas fa-bars"></i></a></center>
                  </th>
                  <th>
                    <center><a class="btn btn-info btn-sm" style="color: #FFFFFF;" href="{{ route('processoAlterar', $processo->id) }}"> <i class="fas fa-edit"></i></a></center>
                  </th>
                  <th>
                    <center><a class="btn btn-danger btn-sm" style="color: #FFFFFF;" href="{{ route('processoExcluir', $processo->id) }}"> <i class="fas fa-times-circle"></i></a></center>
                  </th>
                  @if(Auth::user()->id == 1 || Auth::user()->id == 21)
                  <th>
                    <center><a class="btn btn-dark btn-sm" style="color: #FFFFFF;" href="{{ route('cadastroCandidato2', $processo->id) }}"> <i class="fas fa-check"></i></a></center>
                  </th>
                  @endif
                </tr>
              </tfoot>
              @endforeach
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
          <tr>
            <td>
              <p style="margin-left: -400px;"> {!! $processos->links() !!} </p>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</body>
</body>

</html>