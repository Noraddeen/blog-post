<?php use Illuminate\Support\Collection;
ini_set('memory_limit','16M');
?>
<?php /** @var Collection $posts */ ?>

<x-Layout>
     @include('posts._posts-header')
    <div>
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            @if($posts->count())
                    <x-post-featured-card :post="$posts[0]"/>
                @if($posts->count() > 1)
                    <div class="lg:grid lg:grid-cols-6">
                        @foreach($posts->skip(1) as $post)
                        <x-post-card :post="$post" class="{{ $loop->iteration > 2 ? 'col-span-2':'col-span-3'}}" />
                        @endforeach
                    </div>
                    {{  $posts->links() }}
                @endif()
            @else
                <p class="text-center">don't have any post yet</p>
            @endif
        </main>
    </div>
</x-Layout>


