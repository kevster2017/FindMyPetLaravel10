@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
</div>

<h1 class="text-center mb-3"><label for="reportFound" class="form-label"><strong>Edit Your Profile</strong></label></h1>

<div class="container">

    <div class="container mt-5 d-flex justify-content-center">

        <div class="card mb-3" style="width: 75%">
            <img src="/images/cheetah2.jpg" class="card-img-top" alt="Cheetah Image">


            <div class="card d-flex">

                <form style="width:95%" action="{{ route('users.update', $users->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="container mt-5 ms-3">

                        <input type="file" name="image" id="image" class="form-control-file ">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="image">
                            <i class="fa-solid fa-camera me-2"></i>
                            <span>Choose Main Picture</span>
                        </label>

                    </div>



                    <div class="form-group row mt-5">
                        <label for="firstName" name="firstName" class="col-md-3 col-form-label">First Name</label>
                        <div class="col">
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" id="firstName" value="{{ old('firstName') }}" placeholder="{{ $users->firstName }}">

                            @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                    </div>

                    <div class="form-group row mt-5">
                        <label for="surname" class="col-md-3 col-form-label">Surname</label>
                        <div class="col">
                            <input type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" placeholder="{{ $users->surname }}" value="{{ old('surname') }}">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="town" class="col-md-3 col-form-label">Town</label>
                        <div class="col">

                            @if($users->town === NULL)
                            <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" placeholder="Enter Town" value="{{ old('town') }}">
                            @else
                            <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" placeholder="{{ $users->town }}" value="{{ old('town') }}">
                            @endif

                            @error('town')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mt-5">
                        <label for="postCode" class="col-md-3 col-form-label">Postcode (First 3 or 4 digits)</label>
                        <div class="col">

                            @if($users->postCode === NULL)
                            <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" placeholder="Enter Post Code, first 3 or 4 digits" value="{{ old('postCode') }}">

                            @else

                            <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" placeholder="{{ $users->postCode }}" value="{{ old('postCode') }}">


                            @endif


                            @error('postCode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>




                    <div class="text-center my-5 me-5"><button class="btn btn-primary ms-5" type="submit">Update</button>
                    </div>



                </form>


            </div>
        </div>
    </div>


</div>



@endsection