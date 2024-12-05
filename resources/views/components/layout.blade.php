<!DOCTYPE html>
<html lang="en" class="flex flex-col">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amaweb</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-white min-h-screen flex flex-col">

    <div class="mb-5 items-center flex flex-row">
        <div class="w-1/2">
            <nav class="w-screen sticky mt-4 pb-5 border-b border-white font-semibold text-xl flex flex-row justify-between max-sm:flex-col">
                <div class="space-x-6 mx-4 flex flex-row max-sm:flex-col max-sm:space-y-5 max-sm:space-x-0">
                    <x-link class="hover:border-b-2 duration-75" href="/" :active="request()->is('/')">Home</x-link>
                    <x-link class="hover:border-b-2 duration-75" href="/blogs" :active="request()->is('blogs')">Blogs</x-link>
                    <x-link class="hover:border-b-2 duration-75" href="/blogs" :active="request()->is('music')">Music</x-link>
                    <x-link class="hover:border-b-2 duration-75" href="/resume" :active="request()->is('resume')">Resume</x-link>
                    <x-link class="hover:border-b-2 duration-75" href="/about" :active="request()->is('about')">About</x-link>
                </div>
                <div class="space-x-3 mx-4 max-sm:py-3 max-sm:space-x-0">
                    @guest
                        <x-link class="hover:border-b-2 transition-transform duration-75" href="/login" :active="request()->is('login')">Login</x-link>
                        <x-link class="hover:border-b-2 duration-75" href="/register" :active="request()->is('register')">Register</x-link>
                    @endguest
                    @auth
                        <img id="profile-icon" class="rounded-3xl" src="https://placehold.co/50x50">
                    @endauth
                </div>
            </nav>
        </div>

        <!-- <div class="w-1/2 flex flex-row justify-end p-5 space-x-2">
            @guest
            <nav>

            </nav>
            @endguest

            @auth

            @endauth
        </div> -->

    </div>

    {{ $slot }}

    <footer class="bg-white/5 h-52 w-full mt-8">
        <div class="w-auto h-max flex flex-row">
            <div class="w-1/2 text-left mt-14 mx-5 font-bold text-xl">
                Follow me on my socials, if you would so please!
            </div>
            <div class="w-1/2 flex flex-row justify-start items-center space-x-8 mt-14 ml-0 max-sm:flex-col max-sm:mx-5 max-sm:space-y-5 max-sm:mt-2 max-sm:place-items-end">
                <a href="https://github.com/Amasirat"><img class="w-8" src="{{ Vite::asset(asset: 'resources/images/icons/icons8-github-48.png') }}" alt="github"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-linkedin-50.png') }}" alt="linkedin"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-youtube-48.png') }}" alt="youtube"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-instagram-50.png') }}" alt="instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
