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
    <input id="collection" type="hidden" data-collection = '{{$items}}'>
    <div class="datatable-div w-100" data-url="items/data" id="items-table"></div>
    {{$items->links('components.custom.pagination')}}
</div>
<script>
    let collection = {!! \Illuminate\Support\Collection::make($items->items()) !!}
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/utils.js') }}"></script>
<script src="{{ mix('js/datatables.js') }}"></script>
<script src="{{ mix('js/pagination.js') }}"></script>
<script defer src="{{ mix('js/items/items.js') }}"></script>

</body>
</html>
