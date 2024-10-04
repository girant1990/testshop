<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Testshop</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"></link>
    <link rel="stylesheet" href="{{ mix('css/global.css') }}"></link>
</head>
<body>
@if (Route::has('login'))

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar w/ text</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <div class="navbar-text">
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>
@endif
<div class="content">
    @if(isset($items))
        <div class="row m-0 gap-4 justify-content-between align-items-center">
            @foreach($items as $item)
                @include('components.card', [
                    'name'  => $item->name,
                    'count' => $item->count,
                    'cost'  => $item->price,
                ]
            )
            @endforeach
            {{ $items->links() }}
            @else
                <div>{{__('main.no data')}}</div>
            @endif
        </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
