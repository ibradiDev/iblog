<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @vite(['resources/sass/app.scss'])
</head>

<body>
    <div id="app">

        {{--
    <header class="bg-light">
        <nav class="navbar navbar-light navbar-expand-lg position-static sticky-top">
            <div class="container-fluid">

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img class="logo" src="{{ asset('images/logo/logo.jpg') }}" alt="logo">
                    <span style="font-family: 'Helvetica Neue', sans-serif; color: darkgreen">
                        {{ __('IBLOG') }}
                    </span>
                </a>

                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav text-center mr-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">{{ __('Accueil') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="align-items-center">
                    <ul class="navbar-nav float-end">
                        <li class="nav-item me-2">
                            <a href="{{ route('posts.create') }}" class="btn btn-outline-danger p-1"
                                style="border-radius:6px">
                                {{ __('Poster un article') }}
                            </a>
                        </li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link p-1 float-end dropdown-toggle" id="navbarDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit()">
                                        {{ __('Logout') }}
                                    </a>

                                    <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link float-end p-1" href="{{ route('login') }}">
                                        {{ __('CONNEXION') }}
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    --}}

        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand my-auto" href="{{ url('/home') }}">
                    <img class="logo" src="{{ asset('images/logo/logo.jpg') }}" alt="logo">

                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ url('home') }}" class="nav-link">{{ __('Accueil') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav  ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item my-auto">
                                <a href="{{ route('posts.create') }}" class="btn btn-sm btn-outline-danger">
                                    {{ __('Poster un article') }}
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
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
</body>

</html>
