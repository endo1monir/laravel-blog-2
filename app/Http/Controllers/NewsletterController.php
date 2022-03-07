<?php

namespace App\Http\Controllers;

use App\Services\NewsLetter;
use Illuminate\Http\Request;
use League\CommonMark\Node\Inline\Newline;

class NewsletterController extends Controller
{

 public function __invoke(NewsLetter $newsletter){
        request()->validate([
            'email'=>'required|email'
        ]);
        try{
        // $newsletter=new NewsLetter();
         $newsletter->subscribe(request('email'));
        }
        catch(\Exception $e){
        throw \Illuminate\Validation\ValidationException::withMessages(['email'=>'this email couldn\'t be added to our nesletter']);
        }

        return redirect('/')->with('success','you are now signed up with newsteller');

    }
}
