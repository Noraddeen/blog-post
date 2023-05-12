<!--suppress JSUnresolvedFunction -->

<div class="flex space-x-4 p-3 bg-gray-100 rounded-2xl">
    <div >
        <img src="https://avatar-endpoint.herokuapp.com/api/?id={{$commend->id}}" class="w-15 h-10 rounded-xl" alt="">
    </div>
    <div class="space-y-4 w-full">
        <header>
            <h3>{{$commend->user->name}}</h3>
            <time class="text-xs">post at {{Carbon\Carbon::create( $commend->updated_at)->diffForHumans()}}</time>
        </header>
        <p class="comment">
            {{$commend->commend}}
        </p>
        <form class="hidden" method="POST" action="/posts/{{$post->index}}/comments/{{$commend->id}}" onsubmit="submitting">
            @csrf
            @method('PUT')
            <textarea class="w-full" name="commend" id="updateComment" rows="5" >{{$commend->commend}}</textarea>
            <input class="block text-left p-1.5 bg-cyan-100 hover:text-white over:bg-blue-600" type="submit" value="submit">
        </form>

        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="flex justify-end w-full">
            <form class="inline" action="/posts/{{$post->index}}/comments/{{$commend->id}}" method="POST">
                @csrf
                @method('DELETE')
                <input class=" p-1.5 mr-1.5 bg-cyan-100 hover:text-white hover:bg-blue-600 no-underline" type="submit" value="delete">

            </form>
                <a class="p-1.5 bg-cyan-100 hover:text-white hover:bg-blue-600 no-underline" onclick="showUpdate()">update</a>
            </div>
        @endif
    </div>
</div>

<script>
    function showUpdate(){
        const updateForm = document.querySelector('form.hidden');
        updateForm.style.display = 'block';
        document.querySelector('p.comment').style.display = 'none';
    }

    function submitting(e){
        const textarea = document.querySelector('textarea.updateComment');
        if(textarea.value.length = 0){
            e.preventDefault();
            const error = document.createElement('p');
            error.textContent = 'please dont be empty';
            return;
        }
    }
</script>

