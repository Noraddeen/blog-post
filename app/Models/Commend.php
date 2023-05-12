<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commend extends Model
{
    use HasFactory;
    protected $guarded = [];


    function post(){
        return $this->belongsTo(Post::class,'post_id');
    }

    function user(){
        return $this->belongsTo(User::class);
    }

}
