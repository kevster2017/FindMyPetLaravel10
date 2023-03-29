@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Found {{ $found->petType}} Profile</li>
    </ol>
  </nav>
</div>


<section class="h-100 gradient-custom-2">
  <div class="section-title text-center">
    <div class="title-text">
      <h2>{{ $found->petType}} Found</h2>

    </div>

    @if(Auth::User()->id === $found->user_id)
    <a href="{{ route('found.edit', $found->id) }}"><button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">Edit Profile</button></a>
    @endif
    <!-- /.col end-->
  </div>
  <div class="container py-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row m-3" style="background-color: rgb(125, 143, 173); height:260px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">

              @if($found->img1 === NULL)

              <img src="/images/profileImage.jpg" alt="Generic placeholder image" class="img-fluid img-thumbnail m-2" style="width: 150px; z-index: 1">

              @else

              <img src=" /storage/{{$found->img1}} " alt="Generic placeholder image" class="img-fluid img-thumbnail m-2" style="width: 150px; z-index: 1">

              @endif
              <br><br>

            </div>
            <div class="ms-3 ps-3" style="margin-top: 100px;">
              <h5>{{$found->petType}} found {{$found->created_at->diffForHumans()}}</h5>


            </div>
          </div>
          <br>
          <div class="card-body p-4 text-black">
            <div class="mt-2">


              @if($founds === NULL)
              <p class="lead fw-normal mb-1">Matching Chip Number</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="lead fw-normal mb-1">No Microchip Number available</p>
              </div>
              @else
              @foreach($founds as $found)
              <p class="lead fw-normal mb-1">Matching Chip Number</p>
              <div class="p-4" style="background-color: yellow;">
                <a href="{{ route('missing.show', $found->missings_id) }} ">
                  <p class="font-italic mb-1">Matching Profile: {{$found->missings_id}}, Missing from: {{$found->town}}</p>
                </a>
              </div>
              @endforeach
              @endif


              <div class="mt-5">
                <p class="lead fw-normal mb-1">Description</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{ $found->description}}</p>
                </div>
              </div>



              <div class="mt-5">
                <p class="lead fw-normal mb-1">Town Found</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{ $found->town}}</p>

                </div>
              </div>


              <div class="mt-5">
                <p class="lead fw-normal mb-1">Postcode</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{ $found->postCode}}</p>

                </div>
              </div>


              <div class="mt-5">
                <p class="lead fw-normal mb-1">Microchip Number</p>

                @if($found->chipNum === NULL)
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="lead fw-normal mb-1">No Microchip Number available</p>
                </div>
                @else
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{$found->chipNum}}</p>
                </div>
                @endif
              </div>


              <div class="d-flex justify-content-between align-items-center mt-5 mb-4">
                <p class="lead fw-normal mb-0">Recent photos</p>

              </div>

              <div class="row g-2">
                <div class="col mb-2">
                  @if($found->img2 === NULL)

                  <img src="/images/profileImage.jpg" alt="image 2" class="w-100 rounded-3">


                  @else

                  <img src="/storage/{{$found->img2}}" alt="image 2" class="w-100 rounded-3">

                  @endif
                </div>
                <div class="col mb-2">
                  @if($found->img3 === NULL)

                  <img src="/images/profileImage.jpg" alt="image 3" class="w-100 rounded-3">


                  @else

                  <img src="/storage/{{$found->img3}}" alt="image 3" class="w-100 rounded-3">

                  @endif
                </div>
              </div>
              <div class="my-5">
                <p class="lead fw-normal mb-1">Messages</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <a href="{{ route('messages.show', $found->id) }}" class="link">View Messages</a>
                  <p class="font-italic mb-1">Messages go here</p>
                </div>
              </div>
            </div>

            <!-- Button Group -->
            <div class="text-center">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postFoundMessage{{ $found->id }}">
                Post Message
              </button>

              <!-- Modal to Contact Owner-->
              <div class="modal fade" id="postFoundMessage{{ $found->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><strong>Post Message about found {{ $found->petType }}</strong></h5>

                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form style="width:90%;" action="{{ route('messages.store') }}" enctype="multipart/form-data" method="post">
                      @csrf


                      <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                        <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

                        <input type="hidden" name="report_id" value="{{$found->id}}">

                        <input type="hidden" name="ToUser_firstName" value="{{$found->firstName}}">

                        <input type="hidden" name="ToUser_id" value="{{$found->user_id}}">


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

                          <button type="submit" class="btn btn-primary btn btn-sm">Post Message </button>
                        </div>
                      </div>
                  </div>

                  </form>
                </div>
              </div>

              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#privateFoundMessage{{ $found->id }}">
                Private Msg
              </button>
              <!-- Modal to Contact Owner-->
              <div class="modal fade" id="privateFoundMessage{{ $found->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><strong>Send Private Message about found {{ $found->petType }}</< /strong>
                      </h5>

                      <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form style="width:90%;" action="{{ route('privateMessage.store') }}" enctype="multipart/form-data" method="post">
                      @csrf


                      <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                        <input type="hidden" name="firstName" id=" firstName " value="{{ Auth::user()->firstName }}" />

                        <input type="hidden" name="report_id" value="{{$found->id}}">

                        <input type="hidden" name="ToUser_firstName" value="{{$found->firstName}}">

                        <input type="hidden" name="ToUser_id" value="{{$found->user_id}}">

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
              @if($found->user_id === Auth::user()->id || auth()->user()->is_admin == 1)

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
                      <form action="{{ route('found.update', $found->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="reunited" id="reunited" value="{{ 1 }}" />

                      </form>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Button trigger modal -->
              @if($found->user_id === Auth::user()->id || auth()->user()->is_admin == 1)

              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                Delete
              </button>
              @endif
              <!-- Modal -->
              <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
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
                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete Profile</a>
                      <form action="{{ route('found.destroy', $found->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                      </form>
                    </div>

                  </div>
                </div>
              </div>


            </div> <!-- End Button Group -->




          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
</section>


@endsection