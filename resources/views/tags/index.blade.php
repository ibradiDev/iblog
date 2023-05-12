@extends('home')

@section('posts')

    <div class="container">
        @if (!$tag_posts)
            <h1>{{ __('Vos tags serons disponibles ici') }}</h1>
        @else
            @if ($tag_posts)
                @foreach ($tag_posts as $tag_post)
                    <hr />
                    <x-Post :post="$tag_post" />
                @endforeach
            @endif
        @endif
    </div>

@endsection
