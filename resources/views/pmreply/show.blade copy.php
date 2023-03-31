@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Message Replies</li>
    </ol>
  </nav>
</div>


<div class="container py-3">


  <h1 class="text-center pb-2">Your Message Replies</h1>
  <br>
  @foreach($messages as $message)
  <div class="row">
    <div class="col-lg-8 mx-auto">

      <!-- List group-->
      <ul class="list-group shadow">

        <!-- list group item-->
        <li class="list-group-item">
          <!-- Custom content-->
          <div class="my-2" style="max-width: 540px;">

            <div class="row g-0">

              <!-- Image deleted from here -->

              <div class="col-md-8">
                <div class="card-body ms-4">
                  <h5 class="mt-0 font-weight-bold mb-2">Message From: {{ $message->firstName}}</h5>


                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <h6 class="font-weight-bold my-2">Message Details: {{ $message->message }}</h6>

                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <h6 class="font-weight-bold my-2">Message Received: {{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</h6>

                  </div>
                </div>
              </div>

            </div>

          </div>
          <!-- End -->
          <div class="button">
            <button type="button" href=" {{ route('MsgReply.create') }} " class="btn btn-primary" data-toggle="modal" data-target="#msgreply">Reply</button>

            <a href="{{ route('MsgReply.show', $message->id) }}">View Replies</a>
          </div>



          <!-- Modal to Contact Owner-->
          <div class="modal fade" id="msgreply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <form action="{{ route('MsgReply.store') }}" enctype="multipart/form-data" method="post">
                  @csrf


                  <div class="modal-header">
                    <h5 class="mt-0 font-weight-bold mb-2">Reply to: {{ $message->firstName}}</h5>


                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="FromUser_id" id="FromUser_id" value="{{ Auth::user()->id }}" />

                    <input type="hidden" name="firstName" id="firstName" value="{{ Auth::user()->firstName }}" />

                    <input type="hidden" name="message_id" value="{{$message->id}}">

                    <input type="hidden" name="ToUser_id" value="{{$message->ToUser_id}}">

                    <input type="hidden" name="report_id" value="{{$message->report_id}}">

                    <input type="hidden" name="ToUser_firstName" value="{{$message->firstName}}">





                    <div class="col-md-12">
                      <label for="messageInput" class="form-label">Message</label><br>
                      <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" rows="6" columns="50" placeholder="Max 500 characters" minlength="5" maxlength="500"></textarea>
                      @error('message')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                      @enderror

                    </div>
                    <br>

                  </div>
                  <div class="modal-footer">
                    <div class="col-md-12 text-center">

                      <button type="submit" class="btn btn-primary btn btn-sm">Post Message </button>
                    </div>
                  </div>
              </div>

              </form>
            </div>
          </div>




        </li>
        <!-- End -->
      </ul>


    </div>
  </div>
  <br>
  @endforeach
</div>
<!-- Pagination -->
<div class="pagination justify-content-center mt-4">
  {{$messages->links()}}
</div>

@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
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