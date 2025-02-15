<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd($request->query);
        $posts = Post::with('category','user')
        ->when($request->query('search'), function(Builder $query) use ($request){
            return $query->where('title', 'like', '%' .$request->query('search') . '%')->orWhere('body', 'like', '%' .$request->query('search') . '%');
        })
        ->when($request->query('category'), function(Builder $query) use ($request){
            return $query->WhereRelation('category', 'slug', $request->query('category'));
        })
        ->latest()
        ->paginate(10);
        return view('blog.indexBlog',[
            'posts'=>$posts,
            'categories'=>Category::withCount('posts')->latest()->get(),
        ]);
    }
}
