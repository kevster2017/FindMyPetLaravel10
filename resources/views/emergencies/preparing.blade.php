@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('petEmergencies') }}">Pet Emergencies</a></li>
            <li class="breadcrumb-item active" aria-current="page">Preparing for emergencies</li>
        </ol>
    </nav>
</div>


@endsection