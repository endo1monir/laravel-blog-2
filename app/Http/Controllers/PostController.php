<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
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
return view('admin.posts.create');
}
public function store(){
//  ddd(request()->all());
// ddd(Request()->file('thumbnail'));
//  return request()->file('thumbnail')->store('thumbnails');
 $attributes=request()->validate([
    'title'=>'required',
    'slug'=>['required',ValidationRule::unique('posts','slug')],
    'thumbnail'=>'required|image',
    'excerpt'=>'required',
    'body'=>'required',
    'category_id'=>['required',ValidationRule::exists('categories','id')]
]);
$attributes['user_id']=auth()->user()->id;
$attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
Post::create($attributes);
return redirect('/');
}
}
