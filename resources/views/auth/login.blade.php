<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
	@if (Session::has('mensagem'))
		@if ($text == true)
		<div class="container">
	     <div class="alert alert-success {{ Session::get ('mensagem')['class'] }} ">
		      {{ Session::get ('mensagem')['msg'] }}
		 </div>
		</div>
		@endif
	@endif
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
			    <img src="../public/img/Imagem1.png" height="130" style="margin-top: 100px">
			  </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Processo Seletivo HCP!</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
				  @csrf
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Login..." autocomplete="email" autofocus>
					@error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
					<br>
					<input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required placeholder="Senha..." autocomplete="current-password">
                    @error('password')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                    @enderror
					<input type="submit" class="btn btn-primary btn-user btn-block" style="margin-top: 10px;" value="Logar" id="Logar" name="Logar" /> 				 
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('telaReset') }}">Esqueceu a Senha?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>