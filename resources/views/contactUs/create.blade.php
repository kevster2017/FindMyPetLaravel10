@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Messages</li>
        </ol>
    </nav>
</div>



<div class="container">
    <h1 class="text-center mb-4">Contact Us</h1>
    <p class="text-center">Use this form to get in touch with us. We aim to reply as soon as possible.</p>
    <p class="text-center mb-3">We'll never share your details with anyone else</p>

    <div class="row">
        <div class="col-sm-6">
            <img src="/images/FindMyPetLogo.png" alt="Find My Pet Logo" class="img-responsive" id="contactImage">
        </div>
        <div class="col-sm-6">

            <form action="{{ route('contactUs.store') }}" enctype="multipart/form-data" method="post">
                @csrf

                <div class="text-center">

                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                    <input type="hidden" name="firstName" id="firstName" value="{{ Auth::user()->firstName }}" />
                    <input type="hidden" name="surname" id="surname" value="{{ Auth::user()->surname}}" />
                    <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}" />
                </div>



                <div class="container pt-4">
                    <label for="messageInput" class="form-label">Message</label><br>
                    <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" rows="6" placeholder="Max 500 characters" minlength="5" maxlength="500"></textarea>
                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>


                <div class="text-center mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>


            </form>

        </div>
    </div>


</div>


</div>
</div>
</div>

@endsection