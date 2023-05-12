<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 * @method filterByBodyOrTitle(array $filter)
 */
class Post extends Model
{   use HasFactory;  // factory() method

    protected $guarded = [];


    // by this you don't need for using static with function or cancerite load function
    // by Post::without(['','']) we can select to deisable build query for lazy load
    protected $with = ['author', 'category'];





    public function scopeFilter($query, array $filter){
        $query->when($filter['search'] ?? false , fn($query,$search) =>
            $query->where(fn($query)=>
                $query
                ->where('body','like','%'.$search.'%')
                ->orWhere('title','like','%'.$search.'%')
            )
        );
        // $query->when istead of if
//        $query->when($filter['category'] ?? false , fn($query,$category) =>
//        $query
//            ->whereExists(function ($query) use ($category) {
//             $query ->from('categories')
//                    ->whereColumn('categories.id','post.category_id')
//                    ->where('slug',$category);
//            }
//            )
//        );

        $query->when($filter['category'] ?? false , fn($query,$category) =>
            $query
                ->whereHas('category',fn($query)=>$query->where('slug',$category))
        );


        $query->when($filter['author'] ?? false , fn($query, $author)=>
        $query
            ->whereExists(function ($query) use ($author) {
                $query ->from('authors')
                       ->whereColumn('authors.id','post.author_id')
                       ->where('slug',$author);
            }
            )
        );
    }

    function getRouteKeyName(){
        return 'index';
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo( User::class,'user_id');
    }

    public function commends(){
        return $this->hasMany(Commend::class);
    }
}
