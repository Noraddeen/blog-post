<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

use App\Services\MailchimpNewsletterService;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\CommendController;

Route::controller(PostController::class)->group(function (){

    Route::get('posts','index');

    Route::get('posts/{post}', 'show')->where('post','[A-z_/-]+');

    Route::get('admin/post/create','create')->middleware('admin');

    Route::post('admin/post/create','store')->middleware('admin');

    Route::get('categories/{category:slug}' , 'showCategoryPosts');

    Route::get('authors/{author:username}' , 'showAuthorPosts');
});


Route::get('register',[RegisterController::class,'create'])->middleware('guest'); // peace of code to run any time the request is coming in this end point can redirect user to author router

Route::post('register',[RegisterController::class,'store'])->middleware('guest');

Route::get('login',[SessionController::class,'create'])->middleware('guest');

Route::post('login',[SessionController::class,'store'])->middleware('guest');

Route::post('logout',[SessionController::class,'destroy'])->middleware('auth');

Route::controller(CommendController::class)->group(function (){

    Route::put('commend/{commend:id}','update');
    Route::delete('commend/{commend:id}','destroy');

});


Route::controller(PostCommentsController::class)->group(function (){

    Route::post('posts/{post:index}/comments','store');
    Route::put('posts/{post:index}/comments/{commend:id}','update');
    Route::delete('posts/{post:index}/comments/{commend:id}','destroy');

});


Route::post('subscribe',NewsletterController::class);


Route::get('df',function(){
    return view('download');
});
