@extends('layouts.app2')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            @if ($errors->any())
            <div class="alert alert-success">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
              <div class="card-header">{{ __('Resetar Senha') }}</div>
                <div class="card-body">
                  <form class="user" method="POST" action="{{ route('resetarSenha') }}">
		        		  @csrf
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Login..." autocomplete="email" autofocus>
					          @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <br>
                    <input id="token_" type="text" class="form-control form-control-user @error('token_') is-invalid @enderror" name="token_" value="{{ old('token_') }}" required placeholder="Token..." autocomplete="token_" autofocus>
					          @error('token_')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <br>
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required placeholder="Nova Senha..." autocomplete="current-password">
                    @error('password')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                    <br>
                    <input id="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required placeholder="Cadastrar Nova Senha..." >
                    @error('password_confirmation')
                       <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                    <br><br>
                    <p style="margin-left: 520px;"><a href="{{ route('login') }}" class="btn btn-warning btn-sm" style="width: 80px;">Voltar</a>&nbsp;<input type="submit" class="btn btn-primary btn-sm" style="width: 80px;" value="Salvar" id="Salvar" name="Salvar" /></p>
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
  @endsection