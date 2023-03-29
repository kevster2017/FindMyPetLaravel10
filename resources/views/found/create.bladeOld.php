@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">
    <ul class="breadcrumb">
        <li><a href="/">Home </a></li>
        <li> / Report Found</li>
    </ul>
</div>

<div class="container">
    <form action="{{ route('found.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

        <input type="hidden" name="firstName" id="firstName" value="{{ Auth::user()->firstName }}" />

        <input type="hidden" name="surname" id="surname" value="{{ Auth::user()->surname }}" />

        <input type="hidden" name="reunited" id="reunited" value="{{ 0 }}" />
<input type="hidden" name="petName" id="petName" value="{{ 'Unknown' }}" />
<input type="hidden" name="petAge" id="petAge" value="{{ 0 }}" />


        <h1><label for="reportFound" class="form-label"><strong>Report Found Pet</strong></label></h1>

        <div class="container">

            <input type="file" name="img1" id="img1" class="inputfile">
            @error('img1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
            <label for="img1">
                <i class="zmdi zmdi-camera"></i>
                <span>Choose Main Picture</span>
            </label>


        </div>

        <div class="form-group row col-md-10 offset-md-2 mt-3">
            <label for="petType" class="col-md-3 col-form-label">Select Pet Type</label>
            <div class="col-md-6">
                <select class="form-select @error('petType') is-invalid @enderror" name="petType" value="{{ old('petType') }}" aria-label="Default select example">

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

        <div class="form-group row col-md-10 offset-md-2">
            <label for="description" class="col-md-3 col-form-label">Description</label>
            <div class="col-md-6">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Max 250 Characters" minlength="3" maxlength="250 "></textarea>
                @error('about')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row col-md-10 offset-md-2">
            <label for="town" class="col-md-3 col-form-label">Town where pet was found</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" id="town" value="{{ old('town') }}" placeholder="Enter Town">

                @error('town')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
            </div>
            <br>
        </div>


        <div class="form-group row col-md-10 offset-md-2">
            <label for="postCode" class="col-md-3 col-form-label">Post Code where pet was found (First 3 or 4 digits)</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" placeholder="Enter Post Code (First 3 or 4 digits)" value="{{ old('postCode') }}">
                @error('postCode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row col-md-10 offset-md-2">
            <label for="chipNum" class="col-md-3 col-form-label">Enter Microchip number (if known)</label>
            <div class="col-md-6">
                <input type="text" class="form-control @error('chipNum') is-invalid @enderror" name="chipNum" id="chipNum" value="{{ old('chipNum') }}" placeholder="Enter Microchip Number">

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
            <p class="mt-3 text-center">
            <h2>Add another 2 photos of the pet</h2>
            </p>
        </div>



        <div class="row ml-5 mt-5">
            <div class="col">
                <input type="file" class="form-control-file" id="img2" name="img2">
            </div>
            <div class="col">
                <input type="file" class="form-control-file" id="img3" name="img3">
            </div>
        </div>

        <div class="center mt-5"><button class="btn btn-primary" type="submit">Report Found</button>
        </div>

    </form>
    

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