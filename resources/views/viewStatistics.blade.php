@extends('layouts.app')

@section('content')

<!--Breadcrumb-->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Statistics</li>
        </ol>
    </nav>
</div>




<!--View Statistics-->
<div class="container">
    <h1 class="text-center pb-5">Statistics</h1>
    <div class="ms-5">
        <div class="row mb-5">

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/Admin.JPG" alt="Users Image" style="padding-top:25px">
                <div class="card-body">

                    <h5 class="card-title"><strong>Number of Users Registered - {{ $users }}</strong></h5>

                </div>
            </div>

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/profileImage.jpg" alt="Registrations Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Total Registrations Today - {{ $registrations }}</strong></h5>

                </div>
            </div>

            <div class="card" style="width: 29%">
                <img class="card-img-top" src="images/Misty.jpg" alt="Cat Image" style="padding-top:25px" height="368">
                <div class="card-body">

                    <h5 class="card-title"><strong>Number of Messages - {{ $messages }}</strong></h5>
                </div>
            </div>

        </div>

        <div class="row mb-5">

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="/images/Tyson.jpg" alt="Missing Dog Image" style="padding-top:25px" height="368">
                <div class="card-body">
                    <h5 class="card-title"><strong>Missing Dogs Listed- {{ $missingDog }}</strong></h5>

                </div>
            </div>

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="/images/Eric.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Missing Cats Listed - {{ $missingCat }} </strong></h5>

                </div>
            </div>

            <div class="card" style="width: 29%">
                <img class="card-img-top" src="/images/Luna.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Missing Pets Listed - {{ $missingPet }}</strong></h5>
                </div>
            </div>

        </div>
        <div class="row mb-5">

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/Eric.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Found Dogs Listed - {{ $foundDog }}</strong></h5>
                </div>
            </div>

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/Luna.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Found Cats Listed - {{ $foundCat }}</strong></h5>

                </div>
            </div>

            <div class="card" style="width: 29%">
                <img class="card-img-top" src="images/Noodles.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Found Pets Listed - {{ $foundPet }}</strong></h5>

                </div>
            </div>

        </div>
        <div class="row mb-5">

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/Eric.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Reunited Dogs - {{ $reunitedDog }}</strong></h5>

                </div>
            </div>

            <div class="card me-3" style="width: 29%">
                <img class="card-img-top" src="images/Luna.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Reunited Cats - {{ $reunitedCat }}</strong></h5>

                </div>
            </div>

            <div class="card" style="width: 29%">
                <img class="card-img-top" src="images/Noodles.jpg" alt="Contact Image" style="padding-top:25px">
                <div class="card-body">
                    <h5 class="card-title"><strong>Reunited Pets - {{ $reunitedPet }} </strong></h5>

                </div>
            </div>

        </div>

    </div>
    <br>

    <!--Main container closing div-->

</div>



@endsection