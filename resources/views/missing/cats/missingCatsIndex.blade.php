@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Missing Cats</li>
        </ol>
    </nav>
</div>

<div class="container py-3">


    <h1 class="text-center pb-3">Missing Cats</h1>
    <br>
    @foreach($missingCats as $missingCat)
    <div class="row">
        <div class="col-sm-8 mx-auto">

            <!-- List group-->
            <ul class="list-group" id="indexCard">

                <!-- list group item-->
                <li class="list-group-item">
                    <div class="my-2" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col">
                                <a href="{{ route('missing.show', $missingCat->id) }}"><img src="/storage/{{$missingCat->img1}} " class="img-responsive rounded-start" alt="cat Image" id="indexImage"></a>
                            </div>
                            <div class="col ms-3 pt-3">
                                <div class="card-body">
                                    <a href="{{ route('missing.show', $missingCat->id) }}">
                                        <h5 class="card-title">Name: {{ $missingCat->petName}}</h5>
                                    </a>

                                    <p class="card-text">Description: {{ $missingCat->description }}</< /p>
                                    <p class="card-text">Home Town: {{ $missingCat->town }}</p>
                                    <p class="card-text"><small class="text-muted">Reported Missing: {{ $missingCat->created_at-> diffforhumans() }}</small></p>
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