<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/styles.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="container mt-3 mb-3">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Why Wait</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            @if (Auth::check())
                                <li class="nav-item">
                                    <a href="{{ (Auth::user()->role == 1 ?route('user.profile') : route('business.profile')) }}" class="nav-link">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('appointment.index') }}" class="nav-link">Appointments</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('comment.index') }}" class="nav-link">Comments</a>
                                </li>
                                <li>
                                    <form method="post" action="{{ route('auth_user.logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="/register" class="nav-link">Register</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/login" class="nav-link">Login</a>
                                </li>
                            @endif
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">About</a>
                                </li>
                        </ul>
                        <form method="get" action="{{ route('business.search') }}">
                            <input class="form-control me-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col">
                <header>
                    <h2>@yield('title')</h2>
                </header>
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error')}}
                    </div>
                @endif
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</html>
