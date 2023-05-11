@extends('layouts.app')

@section('content')


<!--Breadcrumb-->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Private Messages</li>
    </ol>
  </nav>
</div>




<div class="container">
  <h1 class="text-center pb-3">My Private Messages</h1>

  @if($messages->count() < 1) <h1 class="text-center">No Messages Received </h1>
    @else
    <!-- Display table -->
    <div class="col d-flex">
      <table class="table table-striped">
        <tr>
          <th>Id</th>
          <th>Report ID</th>
          <th>Message From</th>
          <th>Message</th>
          <th>Message Received</th>
          <th>Reply to Message</th>
          <th>View All Replies</th>
          <th>Delete Message</th>
        </tr>

        <!-- Display messages -->


        @foreach($messages as $message)



        <tr>
          <td style="font-style: italic; color: #000033" class="align-center">{{ $message->id }}</td>
          <td class="align-center">{{ $message->report_id }}</td>
          @if(auth()->check() && auth()->user()->isAdmin ==1)
          <td class="align-center"><a href="{{ route('users.show', $message->user_id) }}">{{ $message->firstName }}</a></td>
          @else
          <td class="align-center">{{ $message->firstName }}</td>
          @endif
          <td class="align-center">{{ $message->message }}</td>
          <td class="align-center">{{ $message->created_at->diffForHumans() }}</td>
          <td> <button type="button" class="btn btn-primary btn-sm mt-1" data-bs-toggle="modal" data-bs-target="#reply">
              Reply
            </button></td>


          <!-- Modal to Reply to PM-->
          <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><strong>Reply to message</strong> </h5>
                  <form action="{{ route('privateMessage.store') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                  <input type="hidden" name="private_message_id" value="{{$message->id}}">

                  <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                  <input type="hidden" name="ToUser_id" value="{{$message->user_id}}">

                  <input type="hidden" name="report_id" value="{{$message->report_id}}">

                  <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

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

                    <button type="submit" class="btn btn-primary btn btn-sm">Send Message </button>
                  </div>
                </div>
              </div>


              </form>
            </div>
          </div>


          <td class="align-center"><a href="{{ route('PMReply.show', $message->id) }}">Show Replies</a></td>

          <td>
            <ahref="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger mt-1">Delete</ahref=>
              <form action="{{ route('privateMessage.destroy', $message->id) }}" method="post">
                @method('DELETE')
                @csrf
              </form>
          </td>


        </tr>



        @endforeach
        @endif

      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination justify-content-center my-4">
      {{$messages->links()}}
    </div>

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