@props(['name'])
<x-form.field_container>
    <label for="{{$name}}">{{$name}}</label>
    <textarea class=" rounded-xl border border-gray-700  p-2" name="{{$name}}" id="{{$name}}" class="w-full h-20">
    </textarea>
</x-form.field_container>


