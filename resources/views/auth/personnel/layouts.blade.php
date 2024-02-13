<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Councilcast: Digital Voting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <style>
        .input-group-text {
            background-color: white; /* Set background color to transparent */
            border-radius: 10px;
        }

        .form-control {
            border-radius: 10px;
        }

        /* Style for email input when active */
        #username:focus {
            border-color: #007bff; /* Change border color when active */
            box-shadow: 0 0 0 0.10rem rgba(0,123,255,.25); /* Add box shadow when active */
        }

        #password:focus {
            border-color: #007bff; /* Change border color when active */
            box-shadow: 0 0 0 0.10rem rgba(0,123,255,.25); /* Add box shadow when active */
        }
        
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand">
                <img src="{{ URL('images/logo-lgg2.png') }}" alt="Council Cast Logo" style="max-width: 430px; height: auto; left: 30px; width: 30%; filter: brightness(0) invert(1);">
            </a>
            
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @guest
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" href="{{ route('login') }}">Voter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" href="{{ route('register') }}">Personnel</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">How Voting Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">About</a>
                    </li>
                @else    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(session()->has('fullName'))
                                {{ session('fullName') }}
                            @elseif(Auth::check())
                                {{ Auth::user()->name }}
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('personnel.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                >
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('personnel.logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>                
                @endguest
            </ul>
        </div>
        </div>
    </nav>    
    
    <main>
        @yield('content')
    </main>
       
    <footer class="footer mt-auto py-3 bg-light fixed-bottom">
        <div class="container d-flex justify-content-between align-items-center">
            <span class="text-muted small">Copyright © 2024 SRCB CouncilCast. All Rights Reserved.</span>
            <span class="text-muted small">Developed by: EJ4XX</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>    
</body>
</html>