@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Private Messages</li>
    </ol>
  </nav>
</div>

<div class="container py-3">

  <h1 class="text-center mb-5">My Private Messages</h1>

  @if($messages->count() < 1) <h1 class="text-center">No Private Messages Received </h1>
    @else
    @foreach($messages as $message)

    <div class="row">
      <div class="col-sm-8 mx-auto">

        <!-- List group-->
        <ul class="list-group" id="indexCard">

          <!-- list group item-->
          <li class="list-group-item">


            <div class="my-2" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col">

                  @if($message->user->image === NULL)

                  <img src="/images/profileImage.jpg" alt="Generic user image" class="img-fluid img-thumbnail m-2" id="indexImage" style="width: 150px; z-index: 1">

                  @else
                  <img src="/storage/{{ $message->user->image }} " class="img-fluid rounded-start" id="indexImage" alt="User Image">
                  @endif



                </div>
                <div class="col ms-3 pt-3">
                  <div class="card-body">
                    <a href="{{ route('PMReply.show', $message->id) }}">
                      <h5 class="card-title ">{{ $message->firstName}}</h5>
                      <p class="card-text ">{{ $message->message }}</p>
                      <p class="card-text mb-3"><small class="text-muted">Message Received {{ $message->created_at->diffforhumans() }}</small>
                      </p>
                    </a>

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reply">Reply</button>

                    <!-- Modal to Reply-->
                    <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><strong>Reply to Message</strong></h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                          </div>

                          <form action="{{ route('PMReply.store') }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="modal-body">
                              <input type="hidden" name="FromUser_id" id="FromUser_id" value="{{ Auth::user()->id }}" />

                              <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

                              <input type="hidden" name="private_message_id" value="{{$message->id}}">

                              <input type="hidden" name="ToUser_id" value="{{$message->ToUser_id}}">

                              <input type="hidden" name="report_id" value="{{$message->report_id}}">

                              <input type="hidden" name="ToUser_firstName" value="{{$message->firstName}}">


                              <div class="col-md-12">
                                <label for="messageInput" class="form-label">Message</label><br>
                                <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" style="height: 200px" placeholder="Max 500 characters" minlength="5" maxlength="500"></textarea>
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

                                <button type="submit" class="btn btn-primary btn btn-sm">Reply to Message </button>
                              </div>
                            </div>
                        </div>

                        </form>
                      </div>
                    </div> <!-- End reply modal -->
                    <!-- Button trigger modal -->
                    @if($message->ToUser_id === Auth::user()->id || auth()->user()->is_admin == 1)

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                      Delete
                    </button>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel"><strong>Are you sure you want to delete this message?</strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                            </button>
                          </div>
                          <div class="modal-body">
                            Deleting this message is permanent and cannot be undone!!
                          </div>
                          <div class="modal-footer">

                            <button type="button" class="btn btn-secondary align-center" data-bs-dismiss="modal">Close</button>
                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete Message</a>
                            <form action="{{ route('messages.destroy', $message->id) }}" method="post">
                              @method('DELETE')
                              @csrf
                            </form>
                          </div>

                        </div>
                      </div>
                    </div> <!-- End Modal -->


                  </div>
                </div>
              </div>
            </div>



            <!-- End -->
          </li>


          <!-- End -->
        </ul>
      </div>
    </div>

    <br>


    @endforeach
    @endif
</div>
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