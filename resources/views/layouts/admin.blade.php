<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <!-- Header Section -->
    <nav class="navbar header-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('assets/images/SiargaoTravels.png') }}" alt="logo">
            </a>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
                @auth('admin')
                    <ul class="navbar-nav side-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admins.dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admins.all.admins') }}">Admins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all.destinations') }}">Destinations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all.cities') }}">Cities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('all.bookings') }}">Bookings</a>
                        </li>
                    </ul>
                @endauth
                <ul class="navbar-nav ml-md-auto">
                    @auth('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admins.dashboard') }}">Home</a>
                        </li>

                        <!-- Dropdown for admin -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::guard('admin')->user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view.login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Section -->
    <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>

<script>
    // Toggle sidebar visibility on small screens
    $(document).ready(function () {
        $('.navbar-toggler').click(function () {
            $('.navbar-nav.side-nav').toggleClass('active');
        });
    });
</script>
</body>
</html>
