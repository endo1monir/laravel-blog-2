<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PostController extends Controller
{
    //

public function index(){

  //dd(request()->url());
  return view('posts.index',['posts'=>Post::filter(request(['search','category','author']))->paginate(8)
->withQueryString()]);
//   return view('posts.index',['posts'=>$this->getPosts(),'categories'=>Category::all(),
//   // 'currentCategory'=>Category::firstWhere('slug',request('category'))

// ]);
    }

public function show(Post $post){
return view('posts.show',['post'=>$post,'categories'=>Category::all()
]);
}
protected function getPosts(){
   $posts=Post::filter(request(['search','category','author']))->get();

//   if(request('search')){
// $posts=Post::where('title','like','%'.request('search').'%')
// ->orWhere('title','like','%'.request('search').'%')->get();
//   }
  return $posts;
}
// index,show,create,store,edit,update,destroy

public function create(){
//     if(auth()->guest()){
// abort(HttpFoundationResponse::HTTP_FORBIDDEN);
//     }
//     if(auth()->user()->username!=='endomon'){
// abort(HttpFoundationResponse::HTTP_FORBIDDEN);
//     }
return view('posts.create');
}
}
