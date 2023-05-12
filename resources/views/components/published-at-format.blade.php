@props(['post'])
<span class="mt-2 block text-gray-400 text-xs">
    Published at <time> {{ Carbon\Carbon::create( $post->published_at)->diffForHumans()}}</time>
</span>
