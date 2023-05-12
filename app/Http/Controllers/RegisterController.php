<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(Request $request){

        $userAttribute = request()->validate([
            'name'=> 'required|max:255',
            'username'=>'required|max:255',
            'password'=>'required|min:8|max:255',
            'email'=>'required|email|unique:users'
            ]);

        User::create($userAttribute);

       // session()->flash();   there is alternative way by using with chained funcion to redirect
        return redirect('posts')->with('messege','the register being succeeded');
    }
    //
}
