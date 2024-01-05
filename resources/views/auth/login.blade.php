@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Me lembre
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit"> {{ __('Login') }}</button>
                            </div>
                        </div>
                        

                        <div class="row mb-0">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">Novo por aqui? Registre-se</a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
