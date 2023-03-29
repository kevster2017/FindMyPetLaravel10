@extends('layouts.app')

@section('content')


<h1 class="text-center mb-3"><label for="reportFound" class="form-label"><strong>{{ __('Complete the details below to register') }}</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">

    <div class="card mb-3" style="width: 75%">
        <img src="/images/animals.jpg" class="card-img-top" alt="...">


        <div class="card d-flex">

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" style="width:95%">
                @csrf

                <div class="form-group row mt-4">
                    <label for="firstName" class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
                    <div class="col">
                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" autocomplete="firstName" value="{{ old('firstName') }}" autofocus>

                        @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <br>
                    </div>
                    <br>
                </div>

                <div class="form-group row mt-4">
                    <label for="surname" class="col-sm-3 col-form-label">{{ __('Surname') }}</label>
                    <div class="col">
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" autocomplete="surname" value="{{ old('surname') }}" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                        <br>
                    </div>
                    <br>
                </div>

                <div class="form-group row mt-4">
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
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>
                    </div>
                    <br>
                </div>

                <div class="form-group row mt-4">
                    <label for="password" class="col-sm-3 col-form-label">{{ __('Confirm Password') }}</label>
                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        <br>
                    </div>
                    <br>
                </div>





                <div class="text-center mt-2">
                    <label>
                        <input class="me-2" type="checkbox" onchange="document.getElementById('registerBtn').disabled = !this.checked;">I accept the Terms of Use & Privacy Policy.

                    </label>

                </div>





                <div class="text-center">
                    <button type="submit" id="registerBtn" class="btn btn-primary my-5" disabled="disabled">
                        {{ __('Register Now') }}
                    </button>
                </div>



            </form>


        </div>
    </div>
</div>

@endsection