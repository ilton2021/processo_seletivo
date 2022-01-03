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
                    <center>Pesquisa de avaliação:<br></center>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                        <form method="POST" action="{{ route('encontraAvaliacao') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <thead>
                                <tr>
                                    <td style="width: 410px">
                                        <input style="width: 400px;margin-top:10px;margin-left:10px;font-family:arial;" type="text" id="pesq" name="pesq" class="form-control" placeholder="Digite aqui o nome do processo..." />
                                    </td>
                                    <td>
                                        <select style="margin-top:10px;font-family:arial;" class="form-control" id="unidade_id" name="unidade_id">
                                            <option value="" id="unidade_id" name="unidade_id">Selecione a Unidade</option>
                                            @foreach($unidades as $unidade)
                                            <option value="<?php echo $unidade->id; ?>" id="unidade_id" name="unidade_id">{{ $unidade->nome }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" style="margin-top: 10px;margin-left: 15px;background-color:#1d68a7;" class="btn btn-info btn-sm" value="Pesquisar">
                                    </td>

                                    <td align="left" colspan="0" border="0">
                                        <a href="{{route('home')}}" id="Voltar" name="Voltar" type="button" style="margin-top: 10px;margin-left: 15px; color: #FFFFFF; background-color:#e06500;" class="btn btn-warning btn-sm"> Voltar <i class="fas fa-undo-alt"></i> </a>
                                    </td>
                                </tr>
                            </thead>
                        </form>
                    </table>
                    <table class="table table-bordered" style="margin-top:-40px;" id="dataTable" width="10px" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 350px;">
                                    Nome do processo
                                </th>
                                <th style="width: 50px;">
                                    <center>Avaliação</center>
                                </th>
                                <th style="width: 50px;">
                                    <center>Resultados</center>
                                </th>
                                <th style="width: 50px;">
                                    <center>N° de Inscritos</center>
                                </th>
                            </tr>
                        </thead>
                        @foreach($processos as $processo)
                        <tfoot style="font-size:18px">
                            <tr>
                                <th>
                                    {{ $processo->nome }}
                                </th>
                                <th>
                                    <center><a class="btn btn-dark btn-sm" style="color: #FFFFFF;font-size:20px;background-color:#1d68a7" href="{{ route('cadastrarResultados', $processo->id) }}"> <i class="fas fa-tasks"></i></a></center>
                                </th>
                                <th>
                                    <center><a class="btn btn-dark btn-sm" style="color: #FFFFFF;font-size:20px;background-color:#1d68a7" href="{{ route('candidatoListas', $processo->id) }}"> <i class="fas fa-file-alt"></i></a></center>
                                </th>
                                <th>
                                    <center><a class="btn btn-dark btn-sm" style="color: #FFFFFF;font-size:20px;background-color:#1d68a7" href="{{ route('numeroInscritos', $processo->id) }}"> <i class="fas fa-user-check"></i></a></center>
                                </th>
                            </tr>
                        </tfoot>
                        @endforeach
                        <tbody>
                        </tbody>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="10px" cellspacing="0">
                    <tr>
                        <th style="font-size:20px;">
                            <p style="margin-left: -400px;"> {{ $processos->appends(['pesq' => isset($pesq) ? $pesq : '','unidade_id' => isset($unidade_id) ? $unidade_id : ''])->links() }} </p>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        </body>

        </html>