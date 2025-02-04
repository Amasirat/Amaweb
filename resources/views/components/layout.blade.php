<!DOCTYPE html>
<html lang="en" class="flex flex-col">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-white min-h-screen flex flex-col">

    <div class="mb-5 items-center flex flex-row">
        <div class="w-1/2">
            <nav class="w-screen sticky mt-4 pb-5 border-b border-white font-semibold text-xl flex flex-row justify-between max-md:flex-col max-md:space-y-10">
                <div class="space-x-6 mx-4 flex flex-row max-md:flex-col max-md:space-y-10 max-md:space-x-0">
                    <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/" :active="request()->is('/')">Home</x-link>
                    <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/blogs" :active="request()->is('blogs')">Blogs</x-link>
                    <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/projects" :active="request()->is('projects')">Projects</x-link>
                    <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/about" :active="request()->is('about')">About</x-link>
                </div>
                <div class="space-x-3 mx-4 flex flex-row max-sm:py-3 max-md:space-x-0 max-md:text-center max-md:space-y-10 max-md:flex-col">
                    @guest
                        <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/login" :active="request()->is('login')">Login</x-link>
                        <x-link class="text-white hover:border-b-2 duration-75 max-md:text-center max-md:p-5 max-md:hover:border-2" href="/register" :active="request()->is('register')">Register</x-link>
                    @endguest
                    @auth
                        <a href="/panel">
                            <img id="profile-icon" class="max-md:mx-0 max-md:w-10 rounded-3xl mx-5 cursor-pointer w-8 h-8" src="{{
                        (Auth::user()->profile_pic != null) ?
                        Vite::asset('/public/storage/'.Auth::user()->profile_pic) :
                        Vite::asset('/resources/images/placeholders/icons8-customer-50.png') }}">
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>

    {{ $slot }}

    <footer class="bg-white/5 h-52 w-full mt-80">
        <div class="w-auto h-max flex flex-row">
            <div class="w-1/2 text-left mt-14 mx-5 font-bold text-xl">
                These are the places I inhabit online..
                <p class="text-sm font-normal">at least the ones I want you to know about lol</p>
            </div>
            <div class="w-1/2 flex flex-row justify-start items-center space-x-8 mt-14 ml-0 max-sm:flex-col max-sm:mx-5 max-sm:space-y-5 max-sm:mt-2 max-sm:place-items-end">
                <a href="https://github.com/Amasirat"><img class="w-8 max-md:w-5" src="{{ Vite::asset(asset: 'resources/images/icons/github-icon.svg') }}" alt="github"></a>
                <a href="https://bsky.app/profile/amasirat.bsky.social"><img class="w-8 max-md:w-5" src="{{ Vite::asset('resources/images/icons/bluesky-icon.svg') }}" alt="bluesky"></a>
                <a href="https://linkedin.com/in/amirhossein-basirat-355191287"><img class="w-8 max-md:w-5" src="{{ Vite::asset('resources/images/icons/linkedin-app-icon.svg') }}" alt="linkedin"></a>
                <a href="https://youtube.com/@amasirat?si=pI9tV6i1lDtryUsE"><img class="w-8 max-md:w-5" src="{{ Vite::asset('resources/images/icons/youtube-color-icon.svg') }}" alt="youtube"></a>
                <a href=""><img class="w-8 max-md:w-5" src="{{ Vite::asset('resources/images/icons/ig-instagram-icon.svg') }}" alt="instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
