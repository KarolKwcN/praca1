@extends('master')
@section('content')
<div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;" >
      <div class="row">

        <div class="mx-auto col-md-6 col-10 bg-white p-5">
          <h1 class="mb-4">Logowanie</h1>
          @if (session('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif
         <form method="POST" action="{{ route('login') }}">
           @csrf
            <div class="form-group"> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

             </div>
            <div class="form-group mb-3"> <input id="password" type="password" placeholder="Hasło" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

						<div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                                 </div>

                            

                                  <button type="submit" class="btn btn-primary">Zaloguj</button>

                                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zapomniałeś hasła?') }}
                                    </a>
                                @endif
          </form>
        </div>
      </div></div>
@endsection