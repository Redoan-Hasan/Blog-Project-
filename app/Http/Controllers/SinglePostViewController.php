<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SinglePostViewController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Post $post)
    {
        $post->load('category','user');
        $post->increment('views');
        return view('blog.SingleBlog',compact('post'));
    }
}
