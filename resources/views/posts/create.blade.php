<x-layout>
    <section class="mx-auto max-w-md border border-black border-2 rounded-2xl p-2">
        <h2 class="text-center text-xl font-bold uppercase">post creation</h2>
        <form action="/admin/post/create" method="post" enctype="multipart/form-data">
            <x-form.input name="title"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />
            <div class="flex flex-col mt-6">
                <label for="category">category</label>
                <select class="rounded-xl border border-gray-700  p-2" name="category_id" id="category" class="w-full h-20">
                    @php
                        $selected = false;
                    @endphp
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
            <x-form.button />
        </form>
    </section>
</x-layout>

