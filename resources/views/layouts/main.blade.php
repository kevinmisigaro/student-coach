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
    <title>
        Student coach
    </title>
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">
                Student Coach
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
                        <a class="nav-link" href="/about">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/jobs">
                            Jobs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/partner" class="nav-link">
                            Work with us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/universities" class="nav-link">
                            University Partners
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

    <div class='footer bg-dark text-center py-3 fixed-bottom"'>
        <p class='text-white'>
            {{ date("Y") }} | Student Coach
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>