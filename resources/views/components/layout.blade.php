<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amaweb</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-white min-h-screen">

    <div class="mb-5 items-center flex flex-row">
        <div class="w-1/2">
            <nav class="w-screen sticky mt-4 pb-5 border-b border-white font-semibold text-xl flex flex-row justify-between max-sm:flex-col">
                <div class="space-x-6 mx-4">
                    <x-link href="/" :active="request()->is('/')">Home</x-link>
                    <x-link href="/blogs" :active="request()->is('/blogs')">Blogs</x-link>
                    <x-link href="/blogs" :active="request()->is('/music')">Music</x-link>
                    <x-link href="/resume" :active="request()->is('/resume')">Resume</x-link>
                    <x-link href="/about" :active="request()->is('/about')">About</x-link>
                </div>
                <div class="space-x-3 max-sm:py-3 mx-4">
                    @guest
                        <x-link href="/login" :active="request()->is('login')">Login</x-link>
                        <x-link href="/register" :active="request()->is('register')">Register</x-link>
                    @endguest
                    @auth

                    @endauth
                </div>
            </nav>
        </div>

        <div class="w-1/2 flex flex-row justify-end p-5 space-x-2">
            @guest
            <nav>

            </nav>
            @endguest

            @auth

            @endauth
        </div>

    </div>

    {{ $slot }}

    <footer class="bg-white/5 h-52 w-full mt-5">
        <div class="w-auto h-max flex flex-row">
            <div class="w-1/2 text-center mt-10">
            </div>
            <div class="w-1/2 flex flex-row justify-end items-center space-x-8 mt-10 ml-0 max-sm:flex-col max-sm:space-x-0 max-sm:space-y-5 max-sm:mt-2 max-sm:place-items-end">
                <a href="https://github.com/Amasirat"><img class="w-8" src="{{ Vite::asset(asset: 'resources/images/icons/icons8-github-48.png') }}" alt="github"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-linkedin-50.png') }}" alt="linkedin"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-youtube-48.png') }}" alt="youtube"></a>
                <a href=""><img class="w-8" src="{{ Vite::asset('resources/images/icons/icons8-instagram-50.png') }}" alt="instagram"></a>
            </div>
        </div>
    </footer>
</body>
</html>
