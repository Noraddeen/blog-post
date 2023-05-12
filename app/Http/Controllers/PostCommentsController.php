<?php

namespace App\Http\Controllers;

use App\Models\Commend;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    function store(Post $post,Request $request){  // Post::with(Category,User)->where ...... ect
                                                  // can eliminate those request by reomve $with property of model
        $request->validate([
            'commend'=>'required'
        ]);

        $post->Commends()->create(
            [
                'commend' => $request->get('commend'),
                'user_id' => $request->user()->id,
                'post_id' => $post->id
            ]
        );

        return back();
        // this is may need two query. but we can do without do any request. Commend::create(comment,post_id from query string, user_id from request coccie or auth session)
    }

    function destroy(Commend $commend,Request $request){
        $commend->destroy();
        return back();
    }

    function update(Post $post, Commend $commend,Request $request){
        $updatedcommend = $request->validate(
            [
                'commend' => 'required'
            ]
        );

        $post->commends()->update([
            'commend' => $updatedcommend['commend']
        ]);
        return back();
    }
}
