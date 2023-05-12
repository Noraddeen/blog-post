<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Symfony\Component\String\s;

class SessionController extends Controller
{
    public function store(){
        $credentials = request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
        );

        if(Auth::attempt($credentials)){
            session()->regenerate();      // prevent session fixed attack, by jenerating new id for session
            return redirect('posts')->with('messege','login succeed, welcome');
        }

        // withErrors and withInput are flashing into sessions will not be in respound body
        // withInput : it work with old() function on frondend side
        return back()->withInput()->withErrors(['email'=>'your email is not valid']);
        return back()->withInput()->withErrors(['']);

//        throw ValidationException::withMessages(
//            [
//                'email'=>'your email is not valid'
//            ]
//        );
    }
    public function create(){
        return view('sessions.create',);
    }

    public function destroy(){
              auth()->logout();
       return redirect('posts');
    }
}


// why well generate white page when there is nothing to responde. becouse there is no return to responde. then it will contain empty file to browser

// request->validate(); is by itself comeback to previuse request which is login page create
