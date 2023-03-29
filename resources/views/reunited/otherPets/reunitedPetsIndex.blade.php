@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Other Reunited Pets</li>
        </ol>
    </nav>

    <div class="container py-3">


        <h1 class="text-center pb-3">Other Reunited Pets</h1>
        <br>
        @foreach($reunitedPetsMissing as $reunitedPet)
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- List group-->
                <ul class="list-group" id="indexCard">

                    <!-- list group item-->
                    <li class="list-group-item">
                        <div class="my-2" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col">
                                    <a href="{{ route('reunited.show', $reunitedPet->id) }}"><img src="/storage/{{$reunitedPet->img1}} " class="img-fluid rounded-start" alt="Pet Image" id="indexImage"></a>
                                </div>
                                <div class="col ms-3 pt-3">
                                    <div class="card-body">
                                        <a href="{{ route('reunited.show', $reunitedPet->id) }}">
                                            <h5 class="card-title">Name: {{ $reunitedPet->petName}}</h5>
                                        </a>

                                        <p class="card-text">Description: {{ $reunitedPet->description }}</< /p>
                                        <p class="card-text">Home Town: {{ $reunitedPet->town }}</p>
                                        <p class="card-text"><small class="text-muted">Reported Reunited: {{ \Carbon\Carbon::parse($reunitedPet->created_at)->diffForHumans() }}</small></p>
                                    </div>
                                </div>
                            </div>
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