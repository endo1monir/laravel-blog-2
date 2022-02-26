<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionController extends Controller
{
    //
public function create(){
    return view('sessions.create');
}
public function store(){
    $attributes=request()->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);
    if(auth()->attempt($attributes)){
        session()->regenerate();
        $name=User::where('email',$attributes['email'])->value('name');

return redirect('/')->with('success','Welcome back '. $name);
    }
    //auth faild
//the first way-->
    // return back()
    // ->withInput()
    // ->withErrors(['email'=>'your email not exist']);
//the second way -->
throw ValidationValidationException::withMessages(['email'=>'your email not exist']);
}
    public function destroy(){
auth()->logout();
return redirect('/')->with('success','GoodBye');
}
}
