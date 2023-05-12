@extends('layouts.app')


@section('content')
    <div class="container h-100 p-3 d-flex row justify-content-between m-auto">
        <section class="col-md-8 pre-scrollable">

            <div class="d-flex row justify-content-between">
                <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top mb-4 py-0">
                    <ul class="navbar-nav">
                        <li class="navbar-brand nav-item">
                            <a href="{{ url('home') }}"
                                class="nav-link {{ $_SERVER['PHP_SELF'] == '/index.php/home' ? 'active border-bottom border-dark mt-auto' : '' }}">
                                {{ __('Pour vous') }}
                            </a>
                        </li>

                        <li class="navbar-brand nav-item">
                            <a href="{{ url('tags') }}"
                                class="nav-link {{ $_SERVER['PHP_SELF'] == '/index.php/tags' ? 'active border-bottom border-dark mt-auto' : '' }}">
                                {{ __('Vos tags') }}
                            </a>
                        </li>
                    </ul>
                </nav>

                {{-- @dump($_GET)
                @dump($_SERVER) --}}

                <div>

                    @yield('posts')

                </div>
            </div>

        </section>

        {{-- <section class=" "> --}}
        <aside class="col-md-3 mt-4 border-left">
            <div class="sticky-top">
                <div class="card px-auto">
                    <div class="card-header text-center">
                        <h4>Catégories</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($categories as $category)
                            <div class="card-text">{{ $category->name }}</div>
                        @endforeach
                        {{-- <div class="card-text">Science</div>
                        <div class="card-text">Economie</div>
                        <div class="card-text">Sport</div>
                        <div class="card-text">Musique</div>
                        <div class="card-text">Recette</div>
                        <div class="card-text">Transport</div> --}}
                    </div>
                    <div class="text-center">
                        <a href="" class="btn btn-link text-decoration-none">rechercher une catégorie</a>
                    </div>
                </div>

                <div class="card mt-3 px-auto">
                    <div class="card-header text-center">
                        <h4>Tags</h4>
                    </div>
                    <div class="card-body">
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#Python</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#Messi</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#Pancake</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#Psg</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#IA</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#Laravel</a>
                        <a href="#" class="card-text text-decoration-none btn-link bg-light m-1">#HipHop</a>
                    </div>
                </div>
            </div>
        </aside>

        {{-- </section> --}}
    </div>


    {{-- ========================================================= --}}

    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
