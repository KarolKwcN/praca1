@extends('master')

@section('content')
<div class="py-5 text-center" style="background-image: url('https://static.pingendo.com/cover-bubble-dark.svg');background-size:cover;" >
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Weryfikuj swój adres e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nowy link weryfikacyjny został wysłany na pocztę.') }}
                        </div>
                    @endif

                    {{ __('Przed kontynuowaniem sprawdź adres e-mail czy znajduję się tam link aktywacyjny.') }}
                    {{ __('Jeśli nie otrzymałeś maila') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('kliknij aby wysłać ponownie.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
