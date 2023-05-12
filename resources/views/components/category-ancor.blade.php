@props(['post'])
<a href="/posts?category={{$post->category->slug}}&{{ http_build_query(request()->except('category'))}}"
   class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
   style="font-size: 10px">
    {{$post->category->name}}
</a>
