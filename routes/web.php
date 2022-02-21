<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class,'index'])->name('home');
Route::get('/posts/{post:slug}',[PostController::class,'show']);
Route::get('categories/{category:slug}',function (Category $category){
  dd(request()->fullUrl());
// return view('posts',['posts'=>$category->posts->load(['category','author']) ]);
return view('posts.index',['posts'=>$category->posts,
// 'categories'=>Category::all(),
// 'currentCategory'=>$category
]);
});

Route::get('author/{author:username}',function(User $author){
   // $posts=$author::with(['author','category'])->posts;

  // ddd($author->posts()->with(['author','category'])->get());

//  return view('posts',['posts'=>$author->posts()->with(['author','category'])->get()]);
//return view('posts',['posts'=>$author->posts->load(['category','author'])]);
return view('posts.index',['posts'=>$author->posts,'categories'=>Category::all()]);
});
Route::get('register',[RegisterController::class,'create']);
Route::post('register',[RegisterController::class,'store']);
