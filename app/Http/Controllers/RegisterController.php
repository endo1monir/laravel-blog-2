<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule as ValidationRule;
use TijsVerkoyen\CssToInlineStyles\Css\Rule\Rule as RuleRule;

class RegisterController extends Controller
{
    //
    public function create(){
        return view('register.create');
    }
    public function store(){
// dd(request()->all());
$attributes=request()->validate([
    'name'=>'required|max:255',
  //  'username'=>'required|max:255|min:3|unique:users,username',
  'username'=>['required','max:255','min:3',ValidationRule::unique('users','username')],
    'email'=>'required|email|max:255',
    'password'=>'required|min:7|max:255'
]);   
//$attributes['password']=bcrypt($attributes['password']);
User::create($attributes);
return redirect('/');
}
}
