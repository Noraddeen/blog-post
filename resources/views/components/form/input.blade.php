@props(['type' => 'text','name'])
<x-form.field_container>
    <label for="{{$name}}">{{$name}}</label>
    <input class=" rounded-xl border border-gray-700  p-2" type="{{$type}}" name="{{$name}}">
    @error($name)
    <p class="text-red-600 text-md">{{$message}}</p>
    @enderror
</x-form.field_container>

