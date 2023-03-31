@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>

      <li class="breadcrumb-item active" aria-current="page">Message Replies</li>
    </ol>
  </nav>
</div>


<div class="container py-3">
  <!-- message navbar -->
  <div class="container my-3" id="showNav">
    <div class="row" id="navText">
      <div class="col-sm-2">
        <div class="my-3" id="navText">
          <a href="index.html" class="mt-3">
            <<< Back to Index </a>
        </div>


      </div>
      <div class="col-sm-4">
        <img src="Images/tiger.jpg " class="img-fluid" alt="... " id="navImg">
      </div>
      <div class="col-sm-6">
        <h5 class="card-title my-3">From Name</h5>
      </div>

    </div>
  </div>




  @foreach($messages as $message)

  @if($message->FromUser_id === auth()->user()->id)
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

  <div class="col-8 offset-2">

    <form action="{{ route('MsgReply.store') }}" enctype="multipart/form-data" method="post">
      @csrf

      <div class="input-group mb-3">

        <input type="hidden" name="FromUser_id" id="FromUser_id" value="{{ Auth::user()->id }}" />

        <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

        <input type="hidden" name="message_id" value="{{$message->message_id}}">

        <input type="hidden" name="ToUser_id" value="{{$message->ToUser_id}}">

        <input type="hidden" name="report_id" value="{{$message->report_id}}">

        <input type="hidden" name="ToUser_firstName" value="{{$message->firstName}}">




        <input type="text" name="message" class="form-control" placeholder="Reply, Max 500 Chars" aria-label="Reply" aria-describedby="Message Reply" minlength="5" maxlength="500">
        <div class="input-group-append">

          <button class="btn btn-outline-primary" type="submit">Send</button>
        </div>
      </div>


    </form>

  </div>


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