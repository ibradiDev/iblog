@if ($post)
    <article class="d-flex row">
        <div class="d-flex mb-2">
            <div class="me-2">
                <img src="{{ asset('images/default_user.jpeg') }}" alt="writter_profile" width="30px" height="30px"
                    style="border-radius: 15px">
            </div>
            <div class="d-flex justify-content-between">
                <a href="" class="nav-link me-4">{{ $post->writter_name }}</a>
                <span class="text-muted"> ~ {{ $post->created_at->format('M d, Y') }}</span>
            </div>
        </div>
        <div class="d-flex">
            <div class="col-9">
                <a href="{{ route('posts.show', $post) }}" class="nav-link">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->content }}</p>
                </a>
            </div>
            <div class="text-center ms-auto h-75">
                <a href="#to_the_post_page" class="nav-link">
                    <img width="90px" height="80px" src="{{ asset('images/posts/' . $post->image_url) }}"
                        alt="">
                </a>
            </div>
        </div>
    </article>
@endif
