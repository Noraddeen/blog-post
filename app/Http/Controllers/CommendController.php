<?php

namespace App\Http\Controllers;

use App\Models\Commend;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CommendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function get($pId){
        Commend::where('post_id',$pId)->all();
    }

    public function store(){
        $commend = request()->validate(
            [
                'post_id'=>'required',
                'user_id'=>'required',
                'commend' => 'required'
            ]
        );
        Commend::create($commend);
        return back();
     }

     function update($id){
        $updatedcommend = request()->validate(
            [
                'commend' => 'required'
            ]
        );


        $commend->update([
            'commend' => $updatedcommend['commend']
        ]);
         return back();
     }

    function destroy(Commend $commend){
        $commend->delete();
        return back();
    }
    //
}
