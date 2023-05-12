@extends('home')

@section('posts')
    @foreach ($posts as $post)
        <x-Post :post="$post" />
        <hr />
    @endforeach
    <div class="mt-3 border-danger d-flex justify-content-center">
        <span>{!! $posts->links() !!}</span>
    </div>
@endsection
