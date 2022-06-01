<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Services\NewsLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

 Route::post('/newsletter',NewsletterController::class);
 //function(NewsLetter $newsletter){
// // request()->validate([
// //     'email'=>'required|email'
// // ]);
// // try{
// // // $newsletter=new NewsLetter();
// //  $newsletter->subscribe(request('email'));
// // }
// // catch(\Exception $e){
// // throw \Illuminate\Validation\ValidationException::withMessages(['email'=>'this email couldn\'t be added to our nesletter']);
// // }

// // return redirect('/')->with('success','you are now signed up with newsteller');

// // $response = $mailchimp->ping->get();

// // ddd($mailchimp->lists->addListMember('133d8c5a7f',[
// //     "email_address" => "endo.White93@hotmail.com",
// //     "status" => "subscribed",
// // ]));
// });
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::get('login',[SessionController::class,'create'])->middleware('guest');
Route::post('login',[SessionController::class,'store'])->middleware('guest');
Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');
Route::post('posts/{post:slug}/comments',[PostCommentsController::class,'store']);
Route::get('admin/posts/create',[PostController::class,'create'])->middleware('admin');
Route::get('admin/posts',[AdminPostController::class,'index'])->name('admin.posts.index')->middleware('admin');
Route::post('admin/posts',[PostController::class,'store'])->middleware('admin');
Route::get('admin/posts/{post}/edit',[AdminPostController::class,'edit'])->middleware('admin');
Route::patch('admin/posts/{post}',[AdminPostController::class,'update'])->middleware('admin');
