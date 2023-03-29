@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Page Content -->
    <!-- Carousel Starts Here -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/dachshund2.jpg" class="d-block w-100 img-responsive" alt="Dachshund Image" id="carouselImage">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Missing Dogs</h5>
                    <p>Latest Missing Dogs</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/maineCoon2.jpg" class="d-block w-100 img-responsive" alt="Maine Coon Image" id="carouselImage">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Missing Cats</h5>
                    <p>Latest Missing Cats</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/rabbit.jpg" class="d-block w-100 img-responsive" alt="Rabbit Image" id="carouselImage">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Missing Pets</h5>
                    <p>Latest Missing Pets</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel Ends Here -->
</div>



<div class="container mb-3">
    <div class="row">

        <div class="section-heading">
            <div class="row my-3">
                <div class="col">
                    <h2>Missing Pets</h2>
                </div>
                <div class="col text-sm-end pt-2">
                    <a href="{{ route('missing.index') }}">view all missing pets <i class="fa fa-angle-right"></i></a>
                </div>


            </div>

        </div>

        <div class="col-sm-4">
            <div class="product-item">
                <a href="missing/dogs"><img src="/images/dachshund2.jpg" alt="" id="welcomeImage"></a>


                <h4>Missing Dogs</h4>


            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="missing/cats"><img src="/images/maineCoon2.jpg" alt="" id="welcomeImage"></a>

                <h4>Missing Cats</h4>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="missing/otherPets"><img src="/images/rabbit.jpg" alt="" id="welcomeImage"></a>

                <h4>Other Missing Pets</h4>


            </div>
        </div>
    </div>


</div>



<div class="container mb-3">
    <div class="row">
        <div class="col-sm-12">


            <div class="section-heading">
                <div class="row my-3">
                    <div class="col">
                        <h2>Found Pets</h2>
                    </div>
                    <div class="col text-sm-end pt-2">
                        <a href="{{ route('found.index') }}">view all found pets <i class="fa fa-angle-right"></i></a>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="found/dogs"><img src="/images/Eric.jpg" alt="" id="welcomeImage"></a>

                <h4>Found Dogs</h4>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="found/cats"><img src="/images/Luna.jpg" alt="" id="welcomeImage"></a>

                <h4>Found Cats</h4>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="found/otherPets"><img src="/images/Noodles.jpg" alt="" id="welcomeImage"></a>

                <h4>Other Found Pets</h4>

            </div>
        </div>

    </div>
</div>


<div class="container mb-3">
    <div class="row">
        <div class="col-sm-12">

            <div class="section-heading">
                <div class="row my-3">
                    <div class="col">
                        <h2>Reunited Pets</h2>
                    </div>
                    <div class="col text-sm-end pt-2">
                        <a href="{{ route('reunited.index') }}">view all reunited pets <i class="fa fa-angle-right"></i></a>
                    </div>

                </div>

            </div>

        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="reunited/dogs"><img src="/images/Eric.jpg" alt="" id="welcomeImage"></a>

                <h4>Reunited Dogs</h4>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="reunited/cats"><img src="/images/Luna.jpg" alt="" id="welcomeImage"></a>

                <h4>Reunited Cats</h4>

            </div>
        </div>
        <div class="col-sm-4">
            <div class="product-item">
                <a href="reunited/otherPets"><img src="/images/Noodles.jpg" alt="" id="welcomeImage"></a>

                <h4>Other Reunited Pets</h4>

            </div>
        </div>
    </div>
</div>






<div class="container-fluid" id="aboutRow">

    <div class="container p-2">
        <div class="row">

            <div class="col-sm-6">
                <div class="pt-3">
                    <h4>Why use Find My Pet?</h4>
                    <p>Find My Pet is the first app of its kind where pet owners and members of the public can report lost and found pets.</p>
                    <p>Our sole aim is to reunite pets with their owners.</p>
                    <ul class="featured-list">
                        <li><a href="{{ route('missing.index') }}">View all missing pets</a></li>
                        <li><a href="{{ route('found.index') }}">View all found pets</a></li>
                        <li><a href="{{ route('reunited.index') }}">View all reunited pets</a></li>
                    </ul>
                    <a href="about.html" class="filled-button">Read More</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="right-image">
                    <img src="images/dachshund.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection