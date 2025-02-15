<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::with('posts')->latest()->paginate(10);
        return view('adminPanel.categories.categoryIndex' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminPanel.categories.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['slug']=str($validated['name'])->slug();
        $newCategory = Category::create($validated);
        if($newCategory){
            $newCategory->load('posts'); // Eager load the posts relationship
            return redirect()->route('admin.categories.index')->with('success','New Category created successfully');
        }else{
            return back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category->load('posts');
        return view('adminPanel.categories.editCategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        if($validated['name'] !== $category->name){
            $validated['slug']=str($validated['name'])->slug();
        }
        $category->updateOrFail($validated);
        $category->load('posts');
        return redirect()->route('admin.categories.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->deleteOrFail();
        return to_route('admin.categories.index')->with('success','Category deleted successfully');
    }
}
