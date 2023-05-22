@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item"><a href="javascript:history.back()">Profile Page</a></li>
      <li class="breadcrumb-item active" aria-current="page">Message Replies</li>
    </ol>
  </nav>
</div>


<div class="container py-3">
  <!-- message navbar -->
  <div class="container my-3" id="showNav">
    <div class="row" id="navText">
      <div class="col-sm-2">
        <div class="my-3 ms-3" id="navText">
          <a href="javascript:history.back()" class="mt-3" style="color: white">
            <i class="fa fa-arrow-left me-2" aria-hidden="true"></i> Back</a>
        </div>


      </div>

      <div class="col-sm offset-sm-6">
        <h5 class="card-title my-3">Message From</h5>
      </div>

    </div>
  </div>


  @if($messages->count() == 0)
  <h1 class="text-center py-3">No Messages Received</h1>

  @else
  @foreach($messages as $message)

  @if($message->user_id === auth()->user()->id)
  <div class="card mb-3 offset-sm-1" style="max-width: 540px;">
    <div class="row g-0">


      <div class="col">
        <div class="card-body " id="messageBody">
          <h5>{{Auth::user()->firstName }}</h5>
          <p class="card-text ">{{ $message->message }}</p>
          <p class="card-text text-end"><small class="text-muted ">Message received {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small></p>
        </div>
      </div>
    </div>
  </div>

  @else

  <div class="card mb-3 offset-sm-6 " style="max-width: 540px; ">
    <div class="row g-0 ">

      <div class="col">
        <div class="card-body " id="replyBody">
          <h5>{{ $message->firstName }}</h5>
          <p class="card-text ">{{ $message->message }}</p>
          <p class="card-text text-end"><small class="text-muted ">Message received {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</small></p>
        </div>
      </div>
    </div>
  </div>

  @endif


  @endforeach
  @endif

  @if($messages->count() != 0)
  <div class="col-8 offset-2">

    <form action="{{ route('messages.store') }}" enctype="multipart/form-data" method="post" id="myForm" name="myForm">
      @csrf

      <div class="input-group mb-3">

        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

        <input type="hidden" name="firstName" id=" firstName" value="{{ Auth::user()->firstName }}" />


        <input type="hidden" name="ToUser_id" id="ToUser_id" value="{{$message->ToUser_id}}">

        <input type="hidden" name="report_id" id="report_id" value="{{$message->report_id}}">

        <input type="hidden" name="ToUser_firstName" id="ToUser_firstName" value="{{$message->firstName}}">




        <input type="text" name="message" id="message" class="form-control" placeholder="Reply, Max 500 Chars" aria-label="Reply" aria-describedby="Message Reply" minlength="5" maxlength="500">
        <div class="input-group-append">

          <button class="btn btn-outline-primary" type="submit" id="btn-save">Send</button>
          <input type="hidden" name="message_id" id="message_id" value="0">
        </div>
      </div>


    </form>

  </div>
  @endif


</div> <!-- End container -->

<!-- Pagination -->
<div class="pagination justify-content-center mt-4">
  {{$messages->links()}}
</div>

@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <ul class="p-0 m-0" style="list-style: none;">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
@endsection