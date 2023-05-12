<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        // dd(Auth::user());

        // Return all posts tagged by the given user
        $data['tag_posts'] = Post::join('post_tags', 'post_tags.post_id', '=', 'posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->where('post_tags.user_id', '=', Auth::user()->id ?? null)
            ->paginate(12);

        foreach ($data['tag_posts'] as $key => $post) {
            if (strlen($post->content) > 155) {
                $post_content = substr($post->content, 0, 155) . "...";
                ($data['tag_posts'][$key])->content = $post_content;
            }
        }

        return view('tags.index', $data);

    }

    public function show(Tag $tag)
    {
        // Return all posts with the given tag
        $data['tag_posts'] = Post::join('post_tags', 'post_tags.post_id', '=', 'posts.id')
            ->orderBy('posts.created_at', 'desc')
            ->where('post_tags.tag_id', '=', $tag->id)
            ->paginate(12);

        foreach ($data['tag_posts'] as $key => $post) {
            if (strlen($post->content) > 155) {
                $post_content = substr($post->content, 0, 155) . "...";
                ($data['tag_posts'][$key])->content = $post_content;
            }
        }

        return view('tags.show', $data);
    }
}