<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminPanel.posts.postIndex' , [
            'posts' => Post::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.posts.createPost',[
            'categories'=>Category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();
        $validated['slug']=str($validated['title'])->slug();
        $newPost = Auth::user()->posts()->create($validated);
        if($newPost){
            return to_route('admin.posts.index')->with('success','New Post created successfully');
        }
            return back();
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        $post->load('category','user');
        return view('adminPanel.posts.editPost',[
            'post'=>$post,
            'categories'=>Category::latest()->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {   
        $validated = $request->validated();
        if($validated['title'] !== $post->title){
            $validated['slug']=str($validated['title'])->slug();
        }
        $post->updateOrFail($validated);
        return redirect()->route('admin.posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {   
        $post->deleteOrFail();
        return redirect()->route('admin.posts.index')->with('success','Post deleted successfully');
    }
}
