@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Found Pet Profile</li>
        </ol>
    </nav>
</div>

<h1 class="text-center mb-3"><label for="reportFound" class="form-label"><strong>Edit Found Pet Profile</strong></label></h1>

<div class="container mt-5 d-flex justify-content-center">

    <div class="card mb-3" style="width: 75%">
        <img src="/images/cheetah2.jpg" class="card-img-top" alt="...">


        <div class="card d-flex">

            <form style="width:95%" action="{{ route('found.update', $found->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

                <input type="hidden" name="reunited" id="reunited" value="{{ 0 }}" />
                <div class="container ms-3 mt-3">

                    <input type="file" name="img1" id="img1" class="inputfile">
                    @error('img1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label for="img1">
                        <i class="zmdi zmdi-camera mt-2"></i>
                        <span>Choose Main Picture</span>
                    </label>

                </div>


                <div class="form-group row mt-3">
                    <label for="petType" class="col col-form-label">Select Pet Type</label>
                    <div class="col">
                        <select class="form-select @error('petType') is-invalid @enderror" name="petType" value="{{ $found->petType }}" aria-label="Default select example">

                            <option selected="Dog">Dogs</option>
                            <option value="Cat">Cats</option>
                            <option value="Other">Other Pets</option>

                        </select>
                        @error('petType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label for="description" class="col-md-3 col-form-label">Description</label>
                    <div class="col">
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" style="height:100%" placeholder="Max 250 Characters" minlength="3" maxlength="250 ">{{ $found->description }}</textarea>
                        @error('about')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="town" class="col-md-3 col-form-label">Town where pet was found</label>
                    <div class="col">
                        <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" id="town" value="{{ $found->town}}" placeholder="Enter Town">

                        @error('town')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>
                    </div>
                    <br>
                </div>

                <div class="form-group row mt-2">
                    <label for="postCode" class="col-md-3 col-form-label">Post Code where pet was found (First 3 or 4 digits)</label>
                    <div class="col">
                        <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" placeholder="Enter Post Code (First 3 or 4 digits)" value="{{ $found->postCode }}">
                        @error('postCode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <label for="chipNum" class="col-md-3 col-form-label">Enter Microchip number (if known)</label>
                    <div class="col">
                        <input type="text" class="form-control @error('chipNum') is-invalid @enderror" name="chipNum" id="chipNum" value="{{ $found->chipNum }}" placeholder="Enter Microchip Number">

                        @error('chipNum')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>
                    </div>
                    <br>
                </div>

                <!-- Add photos -->
                <div class="mt-4">
                    <p class="mt-3">
                    <h2 class="text-center">Add another 2 photos of the pet</h2>
                    </p>
                </div>

                <div class="row ms-5 mt-5">
                    <div class="col">
                        <input type="file" class="form-control-file" id="img2" name="img2">
                    </div>
                    <div class="col">
                        <input type="file" class="form-control-file" id="img3" name="img3">
                    </div>
                </div>

                <div class="text-center my-5 me-5"><button class="btn btn-primary ms-5" type="submit">Update</button>
                </div>



            </form>


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