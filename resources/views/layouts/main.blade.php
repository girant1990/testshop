<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Testshop</title>
    @yield('custom_styles')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"></link>
    <link rel="stylesheet" href="{{ mix('css/global.css') }}"></link>
</head>


<body>
@if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Test shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="navbar-text">
                    @auth
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="{{ route('item.index') }}">Admin panel</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Profile</a></li>
                            <li class="nav-item">
                                <form class="m-0" action="{{ route('logout') }}" method="post">
                                    @csrf
                                <button class="nav-link">Log out</button>
                                </form>
                            </li>
                        </ul>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endif


@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="errorToast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif


<div class="content">
    @yield('content')
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/utils.js') }}"></script>
@yield('custom_scripts')
</body>
</html>
