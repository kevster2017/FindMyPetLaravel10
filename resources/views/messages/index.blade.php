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
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">

                            <div class="media-body order-2 order-lg-2">
                            <a href="{{ route('found.show', $message->id) }}">
                                <h5 class="mt-0 font-weight-bold mb-2">Message: {{ $message->description}}</h5></a>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Message Received: {{ $message->created_at-> diffforhumans() }}</h6>

                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2">Location: {{ $message->town }}</h6>

                                </div>
                            </div>
                            <a href="#"><img src=" /storage/{{$message->img1}} " alt="Generic placeholder image" class="img-fluid img-thumbnail mt-2 mb-2 ml-2 mr-4" style="width: 150px; z-index: 1"></a>
                            
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