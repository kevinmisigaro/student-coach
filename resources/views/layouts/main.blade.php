<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .main {
            min-height: 80vh;
            height: auto !important;
            height: 100%;
        }

    </style>
        <link rel="shortcut icon" href="{{ asset('images/fav.ico') }}" type="image/png" />
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
        Student coach
    </title>
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                <img src="{{ asset('images/mainlogo.png') }}" style="max-width: 300px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/partner" class="nav-link">
                            Book a coach
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/events">
                            Events
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/forum" class="nav-link">
                            Community
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (\Illuminate\Support\Facades\Auth::check())
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    Dashboard
                                </a>
                            </li>
                            @else
                            <li>
                                <a class="dropdown-item" href="/login">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/register">
                                    Register
                                </a>
                            </li>
                            @endif

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="main">
        {{ $slot }}
    </div>

    <div class='footer bg-dark py-3'>
        <div class="container">
            <div class="row">
               <div class="col-md-4">
                <p class='text-white'>
                    Copyright &copy; Student Coach | {{ date("Y") }}
                </p>
               </div>
               <div class="col-md-4 text-white">
                <div class="d-flex flex-row justify-content-center">
                    <i class="fa fa-facebook" aria-hidden="true" style="font-size:20px"></i>
                <i class="fa fa-instagram ms-5" aria-hidden="true" style="font-size:20px"></i>
                <i class="fa fa-twitter ms-5" aria-hidden="true" style="font-size:20px"></i>
                <i class="fa fa-linkedin ms-5" aria-hidden="true" style="font-size:20px"></i>
                </div>
               </div>
                <div class="col-md-4">
                    <a href="/terms" style="color: white; text-decoration:none">
                        Partner with us
                    </a> 
                    <a href="/terms" style="color: white; text-decoration:none" class="ms-5">
                        Terms of reference
                    </a><br/>
                    {{-- <a href="/terms" style="color: white; text-decoration:none">
                        Terms of coaches
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(".owl-carousel").owlCarousel({
                loop: true,
                items: 1,
                autoplay: true
            });
        });
    </script>
    @livewireScripts
</body>

</html>
