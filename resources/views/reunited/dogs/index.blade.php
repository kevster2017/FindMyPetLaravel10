@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Reunited Dogs</li>
  </ol>
</nav> 
    <div class="container py-3">


        <h1 class="text-center pb-2">All Reunited Dogs</h1>
<br>
        @foreach( (array) $reunitedPets as $reunitedPet)
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- List group-->
                <ul class="list-group shadow">

                    <!-- list group item-->
                    <li class="list-group-item">
                        <!-- Custom content-->
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">

                            <div class="media-body order-2 order-lg-2">
                            <a href="#">
                                <h5 class="mt-0 font-weight-bold mb-2">Name: {{ $reunitedPet->petName}}</h5></a>
                                <p class="font-italic text-muted mb-0 small">Description: {{ $reunitedPet->description }}</p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Reported Missing: {{ $reunitedPet->created_at-> diffforhumans() }}</h6>

                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Home Town: {{ $reunitedPet->created_at-> diffforhumans() }}</h6>

                                </div>
                            </div>
                            <a href="#"><img src=" /storage/{{$reunitedPet->img1}} " alt="Generic placeholder image" class="img-fluid img-thumbnail mt-2 mb-2 ml-2 mr-4" style="width: 150px; z-index: 1"></a>
                            
                        </div>
                        <!-- End -->
                    </li>
                    <!-- End -->
</ul>
</div>
</div>
<br>
@endforeach
</div>
                    @endsection