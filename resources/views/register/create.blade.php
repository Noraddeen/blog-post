<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-sm mx-auto mt-10 bg-slate-200 p-6 rounded-xl border border-grey-400">
            <h1 class="text-center text-lg font-bold">register</h1>
            <form action="register" method="post" class="mt-10">
                @csrf
            {{--  will generete input type hyden name _token value from hashed methods --}}
                <div class="mb-5">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-300"
                           for="username"
                    >username
                    </label>
                    <input type="text" id="username" name="username" class="border border-grey-400 p-2 w-full">
                    @error("username")
                    <p class="text-red text-sm"></p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-300"
                           for="name">
                        name
                    </label>
                    <input type="text" id="name" name="name" class="border border-grey-400 p-2 w-full">
                    @error("name")
                    <p class="text-red text-sm"></p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-300"
                           for="email">
                        email
                    </label>
                    <input type="text" id="email" name="email" class="border border-grey-400 p-2 w-full">
                    @error("email")
                    <p class="text-red text-sm"></p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label class="block mb-2 uppercase font-bold text-xs text-grey-300"
                           for="password"
                    >
                        password
                    </label>
                    <input type="password" id="password" name="password" class="border border-grey-400 p-2 w-full">
                    @error("password")
                    <p class="text-red text-sm"></p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="submit" id="submit" name="submit" class="bg-blue-200 border border-grey-400 p-2 w-full">
                </div>
            </form>
        </main>
    </section>
</x-layout>
