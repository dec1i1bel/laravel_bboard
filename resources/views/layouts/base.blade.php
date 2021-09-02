<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') :: Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/689a977d1f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="container d-flex justify-content-between">
                <div class="header_logo d-inline-flex">
                    <a class="navbar-brand" href="/">
                        <h1>BBoard</h1>
                    </a>
                </div>
                <div class="header_nav--user d-inline-flex">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @auth
                            <div class="btn-group">
                                <a href="{{ route('home') }}" type="button"
                                    class="btn btn-outline-success">{{ Auth::user()->name }}</a>
                                <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('bb.add') }}" class="dropdown-item">Create post</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <div class="dropdown-item p-0">
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <input type="submit" value="Logout"
                                                    class="btn btn-link text-decoration-none link-success w-100 h-100">
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="main" class="container">
        @yield('main')
    </div>

    <div id="footer" class="container-fluid bg-light">
        <div class="container bg-light h-100">
            тестовый сайт на laravel 8
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" crossorigin="anonymous"></script>
</body>

</html>
