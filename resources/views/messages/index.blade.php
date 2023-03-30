@extends('layouts.app')

@section('content')

<!-- Page Content -->

<div class="container py-3">


    <h1 class="text-center pb-2">Your Messages</h1>
    <br>
    @foreach($messages as $message)
    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group shadow">

                <!-- list group item-->
                <li class="list-group-item">
                    <!-- Custom content-->
                    <a href="show.html">
                        <div class="card mb-3 offset-sm-1" style="max-width: 1080px; ">
                            <div class="row g-0 ">
                                <div class="col-sm-4 ">
                                    <img src="Images/tiger.jpg " class="img-fluid" alt="... ">
                                </div>
                                <div class="col-sm-8 " id="replyBody">
                                    <div class="card-body " id="replyBody">
                                        <h5 class="card-title ">From Name</h5>
                                        <p class="card-text ">Message Details</p>
                                        <p class="card-text text-end"><small class="text-muted ">Message Received 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>
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