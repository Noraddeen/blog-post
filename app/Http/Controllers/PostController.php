<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commend;
use App\Models\Post;
use App\Models\User;


use http\Exception\BadUrlException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index() {
        return view('posts/posts',
            ['posts' => $this->getPosts(request(['search','category']))->simplePaginate(6)] );
    }

    private function getPosts(array $filter){
        return Post::latest()->filter($filter);
    }

    public function show(Post $post){
        return view('posts/post', ['post' => $post ]);
    }

    public function showAuthorPosts(User $author){
        return view(
            'posts/posts',
                ['posts' => $author->posts()->simplePaginate(6)]
        );
    }

    public function showCategoryPosts(Category $category){
        return view(
            'posts/posts',
            ['posts' => $category->posts()->simplePaginate(6)]
        );
    }

    public function create(){
        return view('posts/create',
            ['categories' => Category::all()]
        );
    }

    public function store(){

            $post = request()->validate([
                'title' => 'required|max:120',
                'excerpt' => 'required|max:250',
                'body' => 'required',
                'category_id' => ['required',Rule::exists('categories','id')]
            ]);

            $post['index'] = Str::slug($post['title']);
            $post['user_id'] = Auth()->user()->id;
            $file = request()->file('thumbnail');
            $post['thumbnail'] = $file->storeAs('thumbnails',"{$post['index']}.{$file->extension()}");
            Post::create($post);

            return redirect('posts')->with('message','post saved succesfully');
    }
}


