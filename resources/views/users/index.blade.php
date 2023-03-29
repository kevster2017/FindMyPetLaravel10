@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Users</li>
        </ol>
    </nav>
</div>

<div class="container py-3">

    <h1 class="text-center pb-2">All Users</h1>
    <br>
    @foreach($users as $user)
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group" id="indexCard">

                <!-- list group item-->
                <li class="list-group-item">
                    <div class="my-2" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col">


                                @if($user->image === NULL)

                                <img src="/images/profileImage.jpg" alt="Generic placeholder image" class="img-responsive rounded-start" alt="Default User Image" id="indexImage">

                                @else
                                <a href="{{ route('users.show', $user->id) }}"><img src=" /storage/{{$user->image}} " alt="User Image" class="img-responsive rounded-start" alt="User Image" id="indexImage"></a>
                                @endif



                            </div>

                            <div class="col ms-3 pt-3">
                                <div class="card-body">
                                    <a href="{{ route('users.show', $user->id) }}">
                                        <h5 class="card-title">Name: {{ $user->firstName}}</h5>
                                        <h5 class="card-title">Surname: {{ $user->surname}}</h5>
                                    </a>
                                    <p class="font-italic text-muted mb-0 small">Email: {{ $user->email }}</p>
                                    @if($user->town === NULL)
                                    <p class="card-text">Home Town: Not Found</p>

                                    @else
                                    <p class="card-text">Home Town: {{ $user->town }}</p>
                                    @endif

                                    @if($user->postCode === NULL)
                                    <p class="card-text">Postcode: Not Found</p>
                                    @else
                                    <p class="card-text">Postcode: {{ $user->postCode }}</p>
                                    @endif

                                    <p class="card-text"><small class="text-muted">Joined Find My Pet: {{ $user->created_at-> diffforhumans() }} </small>
                                    </p>
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
    @endforeach

    <div class="pagination justify-content-center">
        {{ $users->links() }}
    </div>

</div>
@endsection