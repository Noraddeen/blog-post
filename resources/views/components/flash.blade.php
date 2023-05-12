@if(session()->has('messege'))
    <p  x-data = "{sh : false}"
        x-init = "setTimeout( function (){sh = true; setTimeout( function (){sh = false;}, 4000) }, 4000)"
        x-show = "sh"
        class= "fixed bottom-4 right-4 w-64 p-2 bg-blue-500 rounded-xl text-center border border-grey-400 text-white" >
        {{session()->get('messege')}}
    </p>
@endif
