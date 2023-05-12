@if(Illuminate\Support\Facades\Auth::check())
    <div class="bg-gray-100 rounded-2xl border border-gray-400 p-2">
        <form action="/posts/{{$post->index}}/comments" method="post" >
            @csrf
            <h3 class="font-bold mb-2">{{Illuminate\Support\Facades\Auth::user()->name}}</h3>
{{--        <input type="hidden" name="post_id" value="{{$post->id}}">--}}
            <textarea class="w-full bg-cyan-100" name="commend" id="" cols="30" rows="5" placeholder="comment here"></textarea>
            <div>
                <input class="p-2 rounded-xl hover:bg-blue-900 hover:text-white"type="submit" value="add">
            </div>
        </form>
    </div>
@else
    <p>login so for commenting</p>
@endif
