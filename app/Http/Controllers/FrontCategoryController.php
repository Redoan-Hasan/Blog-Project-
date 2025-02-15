<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request , Category $category)
    {
        $category->load('posts');
        $posts = $category->posts()->with('user')->paginate(10);
        
        return view('blog.FilteredCategoryPost',[
            'category' => $category,
            'posts' => $posts,
        ]);
    }
}
