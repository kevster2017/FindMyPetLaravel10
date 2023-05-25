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



<div class="section-title text-center">
  <div class="title-text mb-5">
    <h1>Found {{ $found->petType}} Profile</h1>

  </div>


</div>


<div class="container mb-5" id="show">

  <div class="row d-flex" id="details">
    <div class="col-sm-4" id="recentPhoto">

      @if($found->img1 === NULL)
      <img src="/images/profileImage.jpg" alt="Pet image" class="img-responsive" id="image">
      @else
      <img src="/storage/{{$found->img1}} " alt="Pet image" class="img-responsive" id="image">
      @endif

    </div>

    <div class="col-sm-8">
      <div class="row my-3">
        <div class="col">
          @if($found->petName != NULL)
          <h5>Name: {{ $found->petName }}</h5>
          @else
          <h5>Pet name unknown</h5>
          @endif
        </div>

        <div class="col">
          @if($found->petAge != NULL)
          <h5>Age: {{ $found->petAge }}</h5>
          @else
          <h5>Pet age unknown</h5>
          @endif

        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <h5>Town: {{ $found->town }}</h5>
        </div>
        <div class="col">
          <h5>Post Code: {{ $found->postCode }}</h5>
        </div>
      </div>

      <div class="row mb-3">

        @if($founds === NULL)

        <div class="col" id="matchChipNull">
          <h5>Matching Chip Number: </h5>
          <p class="lead fw-normal mb-1">No Microchip Number available</p>
        </div>
        @else
        @foreach($founds as $found)

        <div class="col" id="matchChipTrue">
          <h5>Matching Chip Number: </h5>
          <a href=" {{ route('missing.show', $found->missings_id) }} ">
            <p class=" font-italic mb-1">Matching Profile: {{$found->missings_id}}, Missing from: {{ $found->town }}</p>
          </a>
        </div>
        @endforeach
        @endif

      </div>


      <div class="row">
        <div class="col mb-2">
          <h5>Description: {{ $found->description }}</h5>
        </div>
      </div>

      <div class="col">
        <a href="{{ route('messages.show', $found->id) }}" class="btn btn-primary me-3">View Messages</a>
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#shareModal">
          Share
        </button>
        <!-- Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel"><strong>Share to social media</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
              </div>
              <div class="modal-body">
                <div class="mt-3 text-center">
                  <div class="social-btn-sp">

                    {!! Share::page(url('/found/'. $found->id))->facebook()->whatsapp() !!}


                    <!--Share full website  {!! $shareButtons !!} -->
                  </div>

                </div>

              </div>
              <div class="modal-footer">


                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

              </div>

            </div>

          </div>
        </div>
        @if($found->user_id === auth()->user()->id && $found->reunited == 0)
        <button type="button" class="btn btn-danger ms-3" data-bs-toggle="modal" data-bs-target="#reuniteModal">
          Mark as reunited?
        </button>
        @endif

        <!-- Modal -->
        <div class="modal fade" id="reuniteModal" tabindex="-1" role="dialog" aria-labelledby="reuniteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="reuniteModalLabel"><strong>Are you sure you want to mark this pet as reunited?<strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
              </div>
              <div class="modal-body">
                Once marked as reunited, this cannot be undone!
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Reunite</a>
                <form action="{{ route('found.update', $found->id) }}" method="post">
                  <input type="hidden" value="1" name="reunited" id="reunited">
                  @method('PUT')
                  @csrf
                </form>
              </div>

            </div>
          </div>
        </div>



      </div>

    </div>
  </div>
  <div class="container my-3">
    <h1 class="text-start">Recent photos</h1>
  </div>


  <div class="row d-flex justify-content-center" id="details">
    <div class="col-sm-4">
      @if($found->img2 === NULL)
      <img src="/images/profileImage.jpg " class="img-responsive mb-2" id="recentPhoto" alt="foundImage" id="image">
      @else
      <img src="/storage/{{$found->img2}} " class="img-responsive mb-2" id="recentPhoto" alt="foundImage" id="image">
      @endif
    </div>
    <div class="col-sm-4">
      @if($found->img2 === NULL)
      <img src="/images/profileImage.jpg " class="img-responsive mb-2" id="recentPhoto" alt="foundImage" id="image">
      @else
      <img src="/storage/{{$found->img3}} " class="img-responsive" id="recentPhoto" alt="foundImage" id="image">
      @endif
    </div>

    <div class="col-sm-2 pt-5">
      <div class="vstack gap-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#postFoundMessage{{ $found->id }}">
          Post Message
        </button>

        <!-- Modal to Contact Owner-->
        <div class="modal fade" id="postFoundMessage{{ $found->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>Post Message about found {{ $found->petType }}</strong></h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

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
        @if($found->user_id === Auth::user()->id || auth()->user()->is_admin == 1)
        <a href="{{ route('found.edit', $found->id) }}" class="btn btn-info">Edit Profile</a>
        @endif
      </div>
    </div>


    <div class="col-sm-2 pt-5">
      <div class="vstack gap-2">

        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#privateFoundMessage{{ $found->petType }}">
          Private Message
        </button>
        <!-- Modal to Contact Owner-->
        <div class="modal fade" id="privateFoundMessage{{ $found->petType }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>Send Private Message about found {{ $found->petType }}</strong></h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
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

        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#deleteModal">
          Delete
        </button>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><strong>Are you sure you want to delete this profile?</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Deleting this profile is permanent and cannot be undone!!
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete Profile</a>
                <form action="{{ route('found.destroy', $found->id) }}" method="post">
                  @method('DELETE')
                  @csrf
                </form>
              </div>

            </div>
          </div>
        </div>


      </div>


    </div>
  </div>

</div>


@if(count($errors)> 0 )
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