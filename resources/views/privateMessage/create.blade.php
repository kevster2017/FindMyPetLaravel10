@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Private Message</li>
        </ol>
    </nav>
</div>

<!--Main container for background-->
<div class="bg">
    <div class="main-container">



        <!--Private Message form-->
        <div class="container">
            <h1 class="text-center"><label for="privateMessages" class="form-label"><strong>Contact User</strong></label></h1>
            <div class="text-center">

                <form action="{{ route('privateMessage.store') }}" enctype="multipart/form-data" method="post">
                    @csrf


                    <div class="text-center">
                        <br>
                        <label for="detailSharing" class="form-label text-center">We'll never share your details with anyone else</label>
                        <br><br>
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="ToUser_id" id="ToUser_id" value="{{ Auth::user()->id }}" />
                        <input type="hidden" name="firstName" id="firstName" value="{{ Auth::user()->firstName }}" />
                        <input type="hidden" name="report_id" id="report_id" value="{{ Auth::user()->surname}}" />
                        <input type="hidden" name="email" id="email" value="{{ Auth::user()->email }}" />
                    </div>


                    <br>

                    <div class="col-md-6 offset-md-3">
                        <label for="messageInput" class="form-label">Message</label><br>
                        <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" rows="6" columns="50" placeholder="Max 500 characters" minlength="5" maxlength="500"></textarea>
                        @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <br>

                    <div class="text-center">
                        <button class="w-40 btn btn-primary btn-sm">Submit</button>
                    </div>
                    <br><br>


                </form>
            </div>
            <br>
            <!--Social Media Icons-->
            <div class="text-center">

                <a href="https://www.facebook.com/" class="fa fa-facebook-official center me-3 fa-fw pl-3" style="font-size:48px; color:#0e76a8" target=" _blank "></a>
                <a href="https://twitter.com/?lang=en-gb " class="fa fa-twitter-square center me-3 fa-fw pl-3" style="font-size:48px; color: #1DA1F2" target="_blank "></a>
                <a href="https://uk.linkedin.com/ " class="fa fa-linkedin-square center me-3 fa-fw pl-3" style="font-size:48px; color:#0e76a8;" target="_blank "></a>
                <a href="https://www.youtube.com/ " class="fa fa-youtube-square center me-3 fa-fw pl-3" style="font-size:48px; color:red" target="_blank "></a>

            </div>

            <!--Main container closing divs-->

        </div>



    </div>

    @endsection