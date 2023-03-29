@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reunited Dogs</li>
        </ol>
    </nav>

    <div class="container py-3">


        <h1 class="text-center pb-3">Reunited Dogs</h1>
        <br>
        @foreach($reunitedDogsMissing as $reunitedDog)
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- List group-->
                <ul class="list-group" id="indexCard">

                    <!-- list group item-->
                    <li class="list-group-item">
                        <div class="my-2" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col">
                                    <a href="{{ route('reunited.show', $reunitedDog->id) }}"><img src="/storage/{{$reunitedDog->img1}} " class="img-fluid rounded-start" alt="Dog Image" id="indexImage"></a>
                                </div>
                                <div class="col ms-3 pt-3">
                                    <div class="card-body">
                                        <a href="{{ route('reunited.show', $reunitedDog->id) }}">
                                            <h5 class="card-title">Name: {{ $reunitedDog->petName}}</h5>
                                        </a>

                                        <p class="card-text">Description: {{ $reunitedDog->description }}</< /p>
                                        <p class="card-text">Home Town: {{ $reunitedDog->town }}</p>
                                        <p class="card-text"><small class="text-muted">Reported Reunited: {{ \Carbon\Carbon::parse($reunitedDog->created_at)->diffForHumans() }}</small></p>
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