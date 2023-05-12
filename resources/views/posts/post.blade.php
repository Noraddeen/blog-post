<?php

use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;
/** @var Post $post */
/** @var Category $category */
//dd($post);
?>


<x-layout>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                   <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>
        </nav>

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        <x-published-at-format :post="$post"/>
                    </p>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                         <x-author-botton :post="$post" />
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/posts"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>

                        <div class="space-x-2">
                        <x-category-ancor :post="$post"/>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p> {{ $post->body }}</p>
                    </div>
                </div>
                <section class="comment-container col-span-8 col-start-5 space-y-4">
                    @include('posts._add_comment_form')
                    @if(!empty($post->commends))
                        @foreach($post->commends as $commend)
                        <x-post-commend :post="$post" :commend="$commend"/>
                        @endforeach
                    @endif
                </section>
            </article>
        </main>
    </section>
</x-layout>


