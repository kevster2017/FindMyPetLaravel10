@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/">My Messages</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Message Replies</li>
        </ol>
    </nav>
</div>

<div class="container py-3">


    <h1 class="text-center pb-2">Your Message Replies</h1>
    <br>
    @foreach($messages as $message)
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">

                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <div class="my-2" style="max-width: 540px;">

                        <div class="row g-0">
                            <div class="col-md-4">
                                <!-- Image removed -->
                            </div>
                            <div class="col-md-8">
                                <div class="card-body ms-4">
                                    <h5 class="mt-0 font-weight-bold mb-2">Message From: {{ $message->firstName}}</h5>


                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">Message Details: {{ $message->message }}</h6>

                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <h6 class="font-weight-bold my-2">Message Received: {{ $message->created_at-> diffforhumans() }}</h6>

                                    </div>
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
<!-- Pagination -->
<div class="pagination justify-content-center mt-4">
    {{$messages->links()}}
</div>
@endsection