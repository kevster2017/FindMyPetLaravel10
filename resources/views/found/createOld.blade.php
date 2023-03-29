@extends('layouts.app')

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Report Found Pet</li>
        </ol>
    </nav>
</div>


<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 text-center mb-5">
				<h1 class="heading-section">Report Found Pet</h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-10">
				<div class="wrapper img" style="background-image: url('/images/bg-registration-form-2.jpg');">
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="contact-wrap w-100 p-md-5 p-4">

								
								<form action="{{ route('found.store') }}" enctype="multipart/form-data" method="POST">
        @csrf

        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />

        <input type="hidden" name="firstName" id="firstName" value="{{ Auth::user()->firstName }}" />

        <input type="hidden" name="surname" id="surname" value="{{ Auth::user()->surname }}" />

        <input type="hidden" name="reunited" id="reunited" value="{{ 0 }}" />

        <div class="form-group row">

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
		

        <div class="form-group row">
            <label for="petType" class="col-25 col-form-label">Select Pet Type</label>
           
        </div>

		<div class="form-group row">
            
            <div class="col-50">
                <select class="form-select @error('petType') is-invalid @enderror" name="petType" value="{{ old('petType') }}" aria-label="Default select example">

                    <option selected="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Other">Other Pet</option>

                </select>
                @error('petType')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="petName" class="col-25 col-form-label">Pet Name (If Known)</label>
           
        </div>

		<div class="form-group row">
            
            <div class="col-75">
                <input type="text" class="form-control @error('petName') is-invalid @enderror" name="petName" placeholder="Enter Pet Name" value="{{ old('petName') }}">
                @error('petName')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="petAge" class="col-50 col-form-label">Pet Age (Enter 0 if unknown)</label>
                </div>

		<div class="form-group row">
                       <div class="col-75">
                <input type="text" class="form-control @error('petAge') is-invalid @enderror" name="petAge" placeholder="Enter Pet Age" value="{{ old('petAge') }}">
                @error('petAge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-25 col-form-label">Description</label>
           
        </div>

		<div class="form-group row">
          
            <div class="col-75">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Max 250 Characters" minlength="3" maxlength="250 "></textarea>
                @error('about')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="town" class="col-25 col-form-label">Town where pet was found</label>
            </div>

		<div class="form-group row">
           
            <div class="col-75">
                <input type="text" class="form-control @error('town') is-invalid @enderror" name="town" id="town" value="{{ old('town') }}" placeholder="Enter Town">

                @error('town')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
            
        </div>


             <div class="form-group row">
            <label for="postCode" class="col-25 col-form-label">Post Code where pet was found (First 3 or 4 digits)</label>
                    </div>

		<div class="form-group row">
            <div class="col-75">
                <input type="text" class="form-control @error('postCode') is-invalid @enderror" name="postCode" placeholder="Enter Post Code (First 3 or 4 digits)" value="{{ old('postCode') }}">
                @error('postCode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="chipNum" class="col-25 col-form-label">Enter Microchip number (If Known)</label>
           </div>

		<div class="form-group row">
            <div class="col-75">
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
            <h2>Add up to 2 more photos of the pet</h2>
            </p>
        </div>



        <div class="row mt-5">
            <div class="col">
                <input type="file" class="form-control-file" id="img2" name="img2">
            </div>
            
        </div>

		<div class="row mt-5">
                       <div class="col">
                <input type="file" class="form-control-file" id="img3" name="img3">
            </div>
        </div>

        <div class="center mt-5"><button class="btn btn-primary" type="submit">Report found</button>
        </div>

    </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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