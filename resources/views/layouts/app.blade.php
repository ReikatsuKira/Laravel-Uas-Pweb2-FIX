<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-nMZPq1v7y+1m5BLbXD8wXY3yySk9NVOaAnm8gR7hr9Ih9uBLc8zZ8L8j6I7Xc2Zk5t77JepRIWQ2OdyhQbkFxQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link href="{{ asset('css/user.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: #ffe4ec;">
            <div class="container">
                <a class="navbar-brand fw-bold text-danger" href="#">Kantin Ceria</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- KIRI -->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
    @auth
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? 'active fw-bold text-danger' : '' }}" href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('menu*') ? 'active fw-bold text-danger' : '' }}" href="{{ route('menu.index') }}">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('order*') ? 'active fw-bold text-danger' : '' }}" href="{{ route('order.index') }}">Order</a>
        </li>
        <li>
            <a href="{{ route('cart.index') }}" class="nav-link">🛒 Keranjang</a>
        </li>
    @endauth
</ul>

<!-- KANAN -->
<ul class="navbar-nav ms-auto">
    @guest
        <li class="nav-item">
            <a class="nav-link fw-bold text-danger" href="{{ route('login') }}">Login</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link text-secondary" href="{{ route('register') }}">Register</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                         width="35" height="35"
                         class="rounded-circle me-2 border border-light"
                         style="object-fit: cover;">
                @endif
                <span class="text-danger fw-semibold">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('profil.edit') }}">Edit Profil</a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    @endguest
</ul>

                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
@include('layouts.footer')
</body>
</html>


