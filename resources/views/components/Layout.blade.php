<!doctype html>

<title>Laravel From Scratch Blog</title>
<meta name="csrf-token" content="{{csrf_token()}}">
{{--/*<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">*/--}}
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link href="/css/app.css" rel="stylesheet">

<style>
    html{
        scroll-behavior:smooth;
    }
</style>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="flex mt-8 md:mt-0 items-center">
            @if(auth()->check())
                    <x-dropdown />
            @else
                <a href="/login" class="text-xs font-bold uppercase mr-3">login</a>
                <a href="/register" class="text-xs font-bold uppercase">register</a>
            @endif
            <a href="#subscribe" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>


    {{ $slot  }}


    <footer id = "subscribe"class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block lg:bg-gray-200 rounded-full">
                <form method="POST" action="/subscribe" class="flex text-sm ">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden md:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>
                        <input id="email"  name="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent border-none py-2 lg:py-0 pl-4 focus:outline-none">
                        @error('email')
                        <p class="text-red-600">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="transition-colors duration-500 bg-blue-400 hover:bg-blue-900 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>
<x-flash />
<script src="\js\flowbite.js"></script>
</body>

