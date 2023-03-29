@extends('layouts.app')

@section('content')
<h1 class="text-center mb-3"><label for="reportFound" class="form-label"><strong>{{ __('Enter Your Details To Login') }}</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">

    <div class="card mb-3" style="width: 75%">
        <img src="/images/animals.jpg" class="card-img-top" alt="...">


        <div class="card d-flex">

            <form method="POST" action="{{ route('login') }}" style="width:95%">
                @csrf

                <div class="form-group row mt-5">
                    <label for="email" class="col-sm-3 col-form-label">{{ __('Email Address') }}</label>
                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>
                    </div>
                    <br>
                </div>

                <div class="form-group row mt-4">
                    <label for="password" class="col-sm-3 col-form-label">{{ __('Password') }}</label>
                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                        <br>
                    </div>
                    <br>
                </div>

                <div class="text-center">
                    <button type="submit" id="login" class="btn btn-primary my-3">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center mb-3">

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" id="regLink" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    <a class="btn btn-link" id="regLink" href="{{ url('/register') }}">
                        {{ __('No account? Click here to register') }}
                    </a>

                </div>




            </form>


        </div>
    </div>
</div>
@endsection