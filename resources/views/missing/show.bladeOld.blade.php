@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Missing {{ $missing->petType}} Profile</li>
    </ol>
  </nav>
</div>



<div class="section-title text-center">
  <div class="title-text">
    <h2>Missing {{ $missing->petType}} Profile</h2>

  </div>

  @if($missing->user_id === auth()->user()->id)
  <a href="{{ route('missing.edit', $missing->id) }}"><button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">Edit Profile</button></a>
  @endif


</div>
<div class="container py-5">

  <div class="row d-flex justify-content-center align-items-center">
    <div class="col">
      <div class="card">
        <div class="rounded-top text-white d-flex flex-row ml-4 m-3" style="background-color: rgb(125, 143, 173); height:260px;">
          <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">

            @if($missing->img1 === NULL)

            <img src="/images/profileImage.jpg" alt="Pet image" class="img-fluid img-thumbnail m-2">


            @else

            <img src=" /storage/{{$missing->img1}} " alt="Pet image" class="img-fluid img-thumbnail m-2">

            @endif


          </div>
          <div class="ms-3 ps-3" style="margin-top: 100px;">
            <h5>Name: {{$missing->petName}}, aged {{$missing->petAge}}</h5>
            <p class="lead fw-normal pt-2">From: {{$missing->town}}</p>
            <p class="lead fw-normal pt-2">Reported missing: {{$missing->created_at->diffForHumans()}}</p>


          </div>
        </div>
        <br>
        <div class="card-body p-4 text-black">
          <div class="mt-2">


            @if($missings === NULL)
            <p class="lead fw-normal mb-1">Matching Chip Number</p>
            <div class="p-4" style="background-color: #f8f9fa;">
              <p class="lead fw-normal mb-1">No Microchip Number available</p>
            </div>
            @else
            @foreach($missings as $missing)
            <p class="lead fw-normal mb-1">Matching Chip Number</p>
            <div class="p-4" style="background-color: yellow;">
              <a href="{{ route('found.show', $missing->founds_id) }} ">
                <p class="font-italic mb-1">Matching Profile: {{$missing->founds_id}}, Found in: {{ $missing->town }}</p>
              </a>
            </div>
            @endforeach
            @endif

            <div class="mt-5">
              <p class="lead fw-normal mb-1">Description</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">{{$missing->description}}</p>
              </div>
            </div>

            <div class="mt-5">
              <p class="lead fw-normal mb-1">Postcode</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">{{$missing->postCode}}</p>
              </div>
            </div>

            <div class="mt-5">
              <p class="lead fw-normal mb-1">Microchip Number</p>

              @if($missing->chipNum === NULL)
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="lead fw-normal mb-1">No Microchip Number available</p>
              </div>
              @else
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1">{{$missing->chipNum}}</p>
              </div>
              @endif
            </div>



            <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
              <p class="lead fw-normal mb-0">Recent Photos</p>

            </div>
            <div class="row g-2">
              <div class="col mb-2">
                @if($missing->img2 === NULL)

                <img src="/images/profileImage.jpg" alt="image 2" class="w-100 rounded-3">


                @else

                <img src="/storage/{{ $missing->img2 }}" alt="image 2" class="w-100 rounded-3">

                @endif
              </div>
              <div class="col mb-2">
                @if($missing->img3 === NULL)

                <img src="/images/profileImage.jpg" alt="image 3" class="w-100 rounded-3">


                @else

                <img src="/storage/{{ $missing->img3 }}" alt="image 3" class="w-100 rounded-3">

                @endif
              </div>
            </div>

            <div class="my-5">
              <p class="lead fw-normal mb-1">Messages</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <a href="{{ route('messages.show', $missing->id) }}" class="link">View Messages</a>
                <p class="font-italic mb-1">Messages go here</p>
              </div>
            </div>

            <!-- Button Group -->
            <div class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postMessage{{ $missing->id }}">
                Post Message
              </button>

              <!-- Modal to Post Message-->
              <div class="modal fade" id="postMessage{{ $missing->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><strong>Post Message about {{ $missing->petName }}</strong> </h5>


                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form style="width:90%;" action="{{ route('messages.store') }}" enctype="multipart/form-data" method="post">
                      @csrf


                      <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                        <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

                        <input type="hidden" name="report_id" value="{{$missing->id}}">

                        <input type="hidden" name="ToUser_firstName" value="{{$missing->firstName}}">

                        <input type="hidden" name="ToUser_id" value="{{$missing->user_id}}">





                        <div class="col-md-12">
                          <label for="messageInput" class="form-label">Message</label><br>
                          <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" rows="6" columns="50" placeholder="Max 500 characters" minlength="5" maxlength="500" style="height:200px"></textarea>
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
              </div> <!-- End Message modal -->

              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#privatemissingMessage{{ $missing->petType }}">
                Private Msg
              </button>
              <!-- Modal to Contact Owner-->
              <div class="modal fade" id="privatemissingMessage{{ $missing->petType }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><strong>Send Private Message about {{ $missing->petName }}</strong></h5>

                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form style="width:90%;" action="{{ route('privateMessage.store') }}" enctype="multipart/form-data" method="post">
                      @csrf


                      <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                        <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

                        <input type="hidden" name="report_id" value="{{$missing->id}}">

                        <input type="hidden" name="ToUser_firstName" value="{{$missing->firstName}}">

                        <input type="hidden" name="ToUser_id" value="{{$missing->user_id}}">

                        <div class="col-md-12">
                          <label for="messageInput" class="form-label">Message</label><br>
                          <textarea id="message" class="form-control @error('message') is-invalid @enderror" id="messageInput" name="message" style="height:200px" placeholder="Max 500 characters" minlength="5" maxlength="500"></textarea>
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



              <!-- Button trigger modal -->
              @if($missing->user_id === Auth::user()->id || auth()->user()->is_admin == 1)

              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reuniteModal">
                Reunited?
              </button>
              @endif

              <!-- Modal -->
              <div class="modal fade" id="reuniteModal" tabindex="-1" role="dialog" aria-labelledby="reuniteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="reuniteModalLabel"><strong>Are you sure you want to mark as reunited?</strong></h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Marking as reunited is permanent and cannot be undone!!
                    </div>
                    <div class="modal-footer">

                      <button type="button" class="btn btn-secondary btn btn-sm" data-dismiss="modal">Close</button>
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Mark as reunited?</a>
                      <form action="{{ route('missing.update', $missing->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="reunited" id="reunited" value="{{ 1 }}" />

                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Button trigger modal -->
              @if($missing->user_id === Auth::user()->id || auth()->user()->is_admin == 1)

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                Delete
              </button>
              @endif
              <!-- Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel"><strong>Are you sure you want to delete this profile?</strong></h5>
                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Deleting this profile is permanent and cannot be undone!!
                    </div>
                    <div class="modal-footer">

                      <button type="button" class="btn btn-secondary btn btn-sm" data-dismiss="modal">Close</button>
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete Missing Profile</a>
                      <form action="{{ route('missing.destroy', $missing->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                      </form>
                    </div>

                  </div>
                </div>
              </div> <!-- End Modal -->


            </div> <!-- End Button Group -->


          </div>



        </div>
      </div>
    </div>
  </div>
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