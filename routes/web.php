<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SinglePostViewController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('blog.SingleBlog');
// });
// Route::get('/', HomeController::class);

Route::get('/', HomeController::class)->name('index');
Route::get('/post/{post:slug}', SinglePostViewController::class)->name('blog.post');

Route::get('/category/{category:slug}',FrontCategoryController::class)->name('blog.category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class)->except('show');

    Route::resource('posts',PostController::class)->except('show');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
