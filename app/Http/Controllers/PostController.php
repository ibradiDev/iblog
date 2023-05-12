<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['posts'] = Post::join('users', 'users.id', '=', 'posts.user_id')
            ->orderBy('posts.created_at', 'desc')
            ->select('posts.*', 'users.name as writter_name', 'users.email as writter_email', 'users.profile as writter_profile')
            ->paginate(12);

        foreach ($data['posts'] as $key => $post) {
            if (strlen($post->content) > 155) {
                $post_content = substr($post->content, 0, 155) . "...";
                ($data['posts'][$key])->content = $post_content;
            }
        }

        $category_instance = new CategoryController();

        $data['categories'] = $category_instance->index();

        // dd($data);
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'title' => ['required', 'min:30'],
            'content' => ['required', 'min:200'],
        ]);

        dump($req);
    }

    public function show(Post $post)
    {
        $post_writter = User::find($post->user_id);

        $data['post'] = $post;
        $data['post_writter'] = $post_writter;
        // dump($post_writter);
        return view('posts.show', $data);
    }
}
