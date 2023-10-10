@extends('navbar.default-navbar')
<script>
function lettersOnly(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
        ((evt.which) ? evt.which : 0));
    if (charCode > 31 && (charCode < 65 || charCode > 90) &&
        (charCode < 97 || charCode > 122)) {
        return true;
    } else {
        alert("Digite só números.");
        return false;
    }
}
</script>
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
                    <center>Pesquisa de Processos Anteriores:<br></center>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                        <form method="POST" action="{{ route('processosAnterioresPesq') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <thead>
                                <tr>
                                    <td style="width: 410px">
                                        <input style="width: 400px;margin-top:10px;margin-left:10px;font-family:arial;" type="text" id="pesq" name="pesq" class="form-control" onkeypress="return lettersOnly(event);" placeholder="Digite aqui o cpf do candidato..." minlength="11" maxlength="11" required />
                                    </td>
                                    <td align="center">  
                                        <input type="submit" style="margin-top: 10px;margin-left: 15px;background-color:#1d68a7;" class="btn btn-info btn-sm" value="Pesquisar">
                                    </td>
                                    <td align="center" colspan="0" border="0">
                                        <a href="{{route('home')}}" id="Voltar" name="Voltar" type="button" style="margin-top: 10px;margin-left: 15px; color: #FFFFFF; background-color:#e06500;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
                                    </td>
                                </tr>
                            </thead>
                        </form>
                    </table> <br>
                    <table class="table table-bordered" style="margin-top:-40px;" id="dataTable" width="10px" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 200px;"> <center> Processo Seletivo: </center> </th>
                                <th style="width: 350px;"> <center> Nome do Candidato: </center> </th>
                                <th style="width: 450px;"> <center> Nome da Vaga: </center> </th>
                            </tr>
                        </thead>
                        @if(!empty($array))
                         @foreach($array as $a)
                         <tfoot style="font-size:18px">
                            <tr>
                                <th> {{ $a['processo'] }} </th> 
                                <th> {{ strtoupper($a['candidato']) }} </th> 
                                <th> {{ strtoupper($a['vaga']) }} </th> 
                            </tr>
                         </tfoot>
                         @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>