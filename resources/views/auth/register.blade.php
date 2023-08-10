<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Processo Seletivo - Login</title>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript">
    function selects() {
			var ele = document.getElementsByClassName('und_gestor');
			for (var i = 0; i < ele.length; i++) {
				if (ele[i].type == 'checkbox')
					ele[i].checked = true;
			}
		}

		function deSelect() {
			var ele = document.getElementsByClassName('und_gestor');
			for (var i = 0; i < ele.length; i++) {
				if (ele[i].type == 'checkbox')
					ele[i].checked = false;

			}
		}
  </script>
</head>
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
    <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0 col-lg-12">
            <div class="row justify-content-center">
              <h1 class="h4 text-gray-900 mb-4">Processo Seletivo HCP GESTÃO! <img src="{{ asset('img/Imagem1.png') }}" height="80"></h1>
			      </div>
        </div>  
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-1">
          <div class="card-body p-0">
              <div class="col-lg-12">
                <div class="p-5">
                  <form class="user" method="POST" action="{{ route('store') }}">
                  @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="name" name="name" aria-describedby="emailHelp" placeholder="Nome...">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Login...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Senha...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Senha...">
                    </div>
                    <div class="form-group">
                     <select class="form-control @error('funcao') is-invalid @enderror" id="perfil" name="perfil">
                      <option value="">Selecione...</option>
                      <option value="administrador">Administrador</option>
                      <option value="gestor">Gestor</option>
                      <option value="dp">DP</option>
                      <option value="rh">RH</option>
                     </select>
                    </div>
                    <div class="form-group">
                      <li style="list-style: none;">
                        <input style="font-size: 12px;" class="btn btn-primary" type="button" onclick='selects()' value="Marcar todos" />
                        <input style="font-size: 12px;" class="btn btn-danger" type="button" onclick='deSelect()' value="Desmarcar todos" />
                      </li>
                      <li style="list-style: none;">
                        @foreach($unidades as $unidade)
                        <input type='checkbox' id="und_gestor[]" class="und_gestor" name="und_gestor[]" value="<?php echo $unidade->id; ?>" /> {{$unidade->nome}} <br></input>
                        @endforeach
                      </li>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" style="margin-top: 10px;" value="Cadastrar" id="Cadastrar" name="Cadastrar" /> 				 
                    <center><a href="{{url('/home')}}" id="Voltar" name="Voltar" type="button" class="btn btn-warning btn-sm" style="margin-top: 10px; color: #FFFFFF;"> Voltar <i class="fas fa-undo-alt"></i> </a></center>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>