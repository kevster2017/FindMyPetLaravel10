<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Find My Pet</title>

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="/css/style.css">

    <style>
        table #social-links {
            display: inline-table;
        }

        table #social-links ul li {
            display: inline;
        }

        table #social-links ul li a {
            padding: 5px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 15px;
            background: #e3e3ea;
        }
    </style>
</head>


<body class="">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="">
                    <img src="/images/FindMyPetLogo.png" alt="Find My Pet Logo" class="img-responsive" id="logo">
                </div>


            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href=" {{ url('users', auth()->user()) }}
" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                My Reports
                                <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('myMissing') }}">My Missing Pets</a>
                                <a class="dropdown-item" href="{{ route('myFound') }}">My Found Pets</a>

                            </div>
                        </li>

                    </ul>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('missing.create') }}">Report Missing Pet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('found.create') }}">Report Found Pet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactUs.create') }}">Contact Us</a>
                    </li>

                    <!-- Display only if the authenticated user is an admin -->


                    @if(auth()->check() && auth()->user()->isAdmin == 1)
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Admin Links <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('viewStatistics') }}">View Statistics</a>
                                <a class="dropdown-item" href="{{ route('contactUs.index') }}">View Messages</a>
                                <a class="dropdown-item" href="{{ route('users.index') }}">All Users</a>
                                <a class="dropdown-item" href="{{ route('missing.index') }}">All Missing Pets</a>
                                <a class="dropdown-item" href="{{ route('found.index') }}">All Found Pets</a>

                            </div>
                        </li>

                    </ul>


                    @endif

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="btn btn-info mt-2 me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="btn btn-secondary mt-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif

                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome {{Auth::user()->firstName }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('users', auth()->user()) }}">
                                {{ __('My Profile') }}
                            </a>

                            @if(auth()->user()->is_admin === 1)
                            <a class="dropdown-item" href="{{ route('privateMessage.index') }}">
                                {{ __('All Messages') }}
                            </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('privateMessage.show', auth()->user()->id) }}">
                                {{ __('My Messages') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>

    </nav>





    <!-- Page Content -->
    <main class="py-4 min-vh-100">
        @include('flashMessage')
        @yield('content')
        <script rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </main>


    <!-- Right -->
    <div class="container text-center">
        <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
        </a>
    </div>
    <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Find My Pet
                    </h6>
                    <p>
                        Thank you for viewing Find My Pet. Please continue to use the site to help reunite pets with their owners.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Pet Advice
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pet Emergencies</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Dogs</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Cats</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Other Pets</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">About Us</a>
                    </p>
                    <p>
                        <a href="{{ route('contactUs.create') }}" class="text-reset">Contact Us</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">How To Use Find My Pet</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Pet Advice</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Glengormley, Co. Antrim</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        findmypet@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 02890 123123</p>
                    <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2022-{{ now()->year }} Copyright: Find My Pet

    </div>
    <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <!-- Bootstrap core JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>



</body>

</html>