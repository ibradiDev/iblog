<?php

namespace App\View\Components;

use App\Models\Post as ModelsPost;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{

    protected $post;

    /**
     * Create a new component instance.
     */
    public function __construct(ModelsPost $post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        // dd($this->post);
        return view('components.post', ['post' => $this->post]);
    }
}