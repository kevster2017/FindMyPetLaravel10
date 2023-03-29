@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reunited {{ $reunitedPet->petType}} Profile</li>
        </ol>
    </nav>
</div>

<div class="section-title text-center">
    <div class="title-text mb-5">
        <h1>Reunited {{ $reunitedPet->petType}} Profile</h1>

    </div>


</div>


<div class="container mb-5" id="show">

    <div class="row d-flex" id="details">
        <div class="col-sm-4" id="recentPhoto">

            @if($reunitedPet->img1 === NULL)
            <img src="/images/profileImage.jpg" alt="Pet image" class="img-responsive" id="image">
            @else
            <img src=" /storage/{{$reunitedPet->img1}} " alt="Pet image" class="img-responsive" id="image">
            @endif

        </div>

        <div class="col-sm-8">
            <div class="row my-3">
                <div class="col">
                    <h5>Name: {{ $reunitedPet->petName }}</h5>
                </div>

                <div class="col">
                    <h5>Age: {{ $reunitedPet->petAge }}</h5>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <h5>Town: {{ $reunitedPet->town }}</h5>
                </div>
                <div class="col">
                    <h5>Post Code: {{ $reunitedPet->postCode }}</h5>
                </div>
            </div>




            <div class="row">
                <div class="col">
                    <h5>Description: {{ $reunitedPet->description }}</h5>
                </div>
            </div>

            <div class="row d-flex">

                <div class="col-sm-4 pt-5">
                    <div class="vstack gap-2">
                        <h5>Reunited: {{ $reunitedPet->updated_at->diffForHumans() }}</h5>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <div class="container my-5">
        <h1 class="text-start">Recent photos</h1>
    </div>


    <div class="row d-flex justify-content-center" id="details">
        <div class="col-sm-4" id="recentPhoto">
            <img src="/storage/{{$reunitedPet->img2}} " class="img-responsive mb-2" alt="reunitedPetImage" id="image">
        </div>
        <div class="col-sm-4" id="recentPhoto">
            <img src="/storage/{{$reunitedPet->img2}} " class="img-responsive" alt="reunitedPetImage" id="image">
        </div>


    </div>

</div>




@if(count($errors)> 0 )
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