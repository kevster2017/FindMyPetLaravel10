@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Profile</li>
    </ol>
  </nav>
</div>



<section class="h-100 gradient-custom-2">
  <div class="section-title text-center">
    <div class="title-text">
      <h2>{{ Auth::User()->firstName}}'s Profile</h2>

    </div>


  </div>
  <div class="container my-5 h-100">

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row m-3" style="background-color: rgb(125, 143, 173); height:260px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">

              @if($users->image === NULL)

              <img src="/images/profileImage.jpg" alt="Generic placeholder image" class="img-fluid img-thumbnail m-2" style="width: 150px; z-index: 1">


              @else

              <img src=" /storage/{{Auth::User()->image}} " alt="Generic placeholder image" class="img-fluid img-thumbnail m-2" style="width: 150px; z-index: 1">

              @endif
              <br><br>

            </div>
            <div class="ms-3 ps-3" style="margin-top: 100px;">
              <h5>{{Auth::User()->firstName}} {{ Auth::User()->surname }}</h5>
              <p class="lead fw-normal pt-2">Joined Find My Pet: {{Auth::User()->created_at->diffForHumans()}}</p>

            </div>
          </div>
          <br>
          <div class="card-body p-4 text-black">
            <div class="mt-2">
              <p class="lead fw-normal mb-1">Town</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                @if($users->town === NULL)
                <p class="font-italic mb-1">Edit profile to add town</p>
                @else
                <p class="font-italic mb-1">{{Auth::User()->town}}</p>
                @endif
              </div>
            </div>

            <div class="mt-5">
              <p class="lead fw-normal mb-1">Postcode</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                @if($users->town === NULL)
                <p class="font-italic mb-1">Edit profile to add postcode</p>
                @else
                <p class="font-italic mb-1">{{Auth::User()->postCode}}</p>
                @endif
              </div>
            </div>
          </div>

          <div class="text-center my-3">

            <a href="{{ route('users.edit', Auth::User()->id) }}" class="btn btn-sm btn-info">Edit Profile</a>

            <!-- Button trigger modal -->
            @if($users->id === Auth::user()->id || auth()->user()->is_admin == 1)

            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
              Delete Profile
            </button>



            <!-- Delete Profile Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel"><strong>Are you sure you want to delete your profile?</strong></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true"></span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Deleting this profile is permanent and cannot be undone!!
                  </div>
                  <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">Delete User Profile</a>
                    <form action="{{ route('users.destroy', $users->id) }}" method="post">
                      @method('DELETE')
                      @csrf
                    </form>
                  </div>

                </div>
              </div>
            </div>




            @endif

          </div>

        </div>
      </div>
    </div>
  </div>
</section>


@endsection