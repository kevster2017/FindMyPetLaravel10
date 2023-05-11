@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Missing Pets</li>
        </ol>
    </nav>
</div>

<div class="container py-3">


    <h1 class="text-center pb-3">My Missing Pets</h1>
    @if($missingPets->count() < 1) <h1 class="text-center">No Missing Pets Reported </h1>
        @else
        @foreach($missingPets as $missingPet)
        <div class="row">
            <div class="col-sm-8 mx-auto">

                <!-- List group-->
                <ul class="list-group" id="indexCard">

                    <!-- list group item-->
                    <li class="list-group-item">
                        <div class="my-2" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col">
                                    <a href="{{ route('missing.show', $missingPet->id) }}"><img src="/storage/{{$missingPet->img1}} " class="img-responsive rounded-start" alt="Pet Image" id="indexImage"></a>
                                </div>
                                <div class="col ms-3 pt-3">
                                    <div class="card-body">
                                        <a href="{{ route('missing.show', $missingPet->id) }}">
                                            <h5 class="card-title">Name: {{ $missingPet->petName}}</h5>
                                        </a>

                                        <p class="card-text">Description: {{ $missingPet->description }}</< /p>
                                        <p class="card-text">Home Town: {{ $missingPet->town }}</p>
                                        <p class="card-text"><small class="text-muted">Reported Missing: {{ $missingPet->created_at-> diffforhumans() }}</small></p>
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

        @endif
        <!-- Pagination -->
        <div class="pagination justify-content-center mt-4">
            {{$missingPets->links()}}
        </div>
</div>
@endsection