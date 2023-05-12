<?php

use App\Models\Post;
use Carbon\Carbon;

?>
<?php /** @var Post $post*/ ?>

@props(['post'])
<article
     class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-ancor :post="$post"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>
                    <x-published-at-format :post="$post"/>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->body }}
                </p>

                <p class="mt-4">
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <x-author-botton :post="$post" />
                </div>

                <div class="hidden lg:block">
                    <a href="{{"/posts/".$post->index}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
