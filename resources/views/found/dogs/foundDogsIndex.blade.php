@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Found Dogs</li>
        </ol>
    </nav>
</div>

<div class="container py-3">


    <h1 class="text-center pb-3">Found Dogs</h1>
    <br>
    @foreach($foundDogs as $foundDog)
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group" id="indexCard">

                <!-- list group item-->
                <li class="list-group-item">
                    <div class="my-2" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col">
                                <a href="{{ route('found.show', $foundDog->id) }}"><img src="/storage/{{$foundDog->img1}} " class="img-fluid rounded-start" alt="Dog Image" id="indexImage"></a>
                            </div>
                            <div class="col ms-3 pt-3">
                                <div class="card-body">
                                    <a href="{{ route('found.show', $foundDog->id) }}">
                                        @if($foundDog->petName == NULL)
                                        <h5 class="card-title">Dog name unknown</h5>
                                        @else
                                        <h5 class="card-title">Name: {{ $foundDog->petName}}</h5>

                                        @endif
                                    </a>

                                    <p class="card-text">Description: {{ $foundDog->description }}</p>
                                    <p class="card-text">Home Town: {{ $foundDog->town }}</p>
                                    <p class="card-text"><small class="text-muted">Reported Found: {{ $foundDog->created_at-> diffforhumans() }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- End -->
                </li>
            </ul>
        </div>
    </div>
    <br>
    @endforeach
</div>
@endsection