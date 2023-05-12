<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use function cache;
use function resource_path;

class Posts
{

    public $title;
    public $date;
    public $excerpt;
    public $body;
    public $index;

    /**
     * @param $title
     * @param $date
     * @param $excerpt
     * @param $body
     */
    public function __construct($title, $date, $excerpt, $body, $index)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->index = $index;
    }
    /**
     * @throws Exception
     */
    public static function find($index)
    {
        return cache()->rememberForever(
            "posts.$index",
            fn()=>collect(static::all())->firstWhere('index',$index)
        );
    }

    public static function findOrFail($index){
        return static::find($index) ?? throw new ModelNotFoundException();
    }

    public static function all()
    {
            collect(File::files(resource_path('posts')))
            ->map(fn($fileInfo)=>YamlFrontMatter::parseFile($fileInfo))
            ->each(function($file) {
                $post = new Post();
                global $counter ;
                $post->title =  $file->matter('title');
                $post->published_at = date("Y-m-d h:m:s",$file->date);
                $post->excerpt = $file->excerpt;
                $post->index = $file->index;
                $post->body = $file->body();
            //    $post->user_id = $users
            //    $post->category_id = ;
                $post->save();
            });
      //      ->sortByDesc('date')

    }

}
