@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">Pet Emergencies</li>
        </ol>
    </nav>
</div>

<div class="container">
    <h1 class="text-center mb-3">Pet Emergencies</h1>
    <p>An emergency with your pet can be a traumatic time for both the pet and its owner. This page is designed to provide advice on what to do in certain situations. Being prepared in an emergency can make the difference. The cards below provide advice for common emergency situations involving pets. </p>
    <p>By clicking on each card, you can find information on what to do in a particular situation. We hope that you never find yourself in a situation where you have to follow any of the advice, however if you do, you know where you can find the information that will hopefully lead to a successful outcome for you and your pet.</p>
</div>

<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <a href="{{ route('petEmergencies.preparing') }}">
                <div class="card h-100" id="emergencyCards">
                    <img src="/images/blackCat.jpg" class="card-img-top" alt="Black Cat">
                    <div class="card-body">
                        <h5 class="card-title">Preparing for emergencies</h5>
                        <p class="card-text">This section will let you know how to prepare and what to do in an emergency</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/dogWithGlasses.jpg" class="card-img-top" alt="Dog with glasses">
                <div class="card-body">
                    <h5 class="card-title">Bite Wounds (Dogs)</h5>
                    <p class="card-text">What to do if your pet has been bitten</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/guineaPig.jpg" class="card-img-top" alt="Guinea Pig">
                <div class="card-body">
                    <h5 class="card-title">Bleeding</h5>
                    </h5>
                    <p class="card-text">Here you can find information on how to deal with bleeding</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/greyRabbit.jpg" class="card-img-top" alt="Grey Rabbit">
                <div class="card-body">
                    <h5 class="card-title">Broken Bones</h5>
                    <p class="card-text">You can find information on the action required in the event of a broken bone</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/blueEyedCat.jpg" class="card-img-top" alt="Blue Eyed Cat">
                <div class="card-body">
                    <h5 class="card-title">Choking</h5>
                    <p class="card-text">A life-threatening situation that requires immediate attention</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/dogInWater.jpg" class="card-img-top" alt="Dog In Water">
                <div class="card-body">
                    <h5 class="card-title">Heatstroke</h5>
                    <p class="card-text">A life-threatening situation that can affect any animal that gets too hot</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/coolCat.jpg" class="card-img-top" alt="Cool Cat">
                <div class="card-body">
                    <h5 class="card-title">Hypothermia</h5>
                    <p class="card-text">A life thretening situation that can affect any animal that gets too cold</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/blackCat.jpg" class="card-img-top" alt="Cat and Dog">
                <div class="card-body">
                    <h5 class="card-title">Moving an injured pet</h5>
                    <p class="card-text">This section provides details on how to caefully move an injured pet</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/horses.jpg" class="card-img-top" alt="horses">
                <div class="card-body">
                    <h5 class="card-title">Poisons and Toxins</h5>
                    <p class="card-text">here you will find advice on what to do if your pet has eaten something that they shouldn't have</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/sadDog.jpg" class="card-img-top" alt="Sad Dog">
                <div class="card-body">
                    <h5 class="card-title">Road traffic accidents</h5>
                    <p class="card-text">One of the most frightening emergencies for a pet, here you can find advice on what to do in a road traffice accident</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="/images/hamsterHeart.jpg" class="card-img-top" alt="Hamster holding heart">
                <div class="card-body">
                    <h5 class="card-title">Seizures</h5>
                    <p class="card-text">This section provide details on what to do in the event of a seizure</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection