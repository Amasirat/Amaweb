@props(["blog"])

<a href="/blogs/{{ $blog->id }}">
    <div class="max-sm:flex-col bg-white/15 rounded-xl w-full h-auto p-4 m-5 flex flex-row hover:bg-white/45 duration-500 cursor-pointer">

        <div class="w-1/3">
            <img class="w-full h-full"
                src="{{ Vite::asset('resources/images/placeholders/achildsDreamcover.png') }}">
        </div>

        <div class="w-1/2 flex flex-col space-y-5 p-6">
            <div class="font-bold text-2xl">{{ $blog->title }}</div>
            <div class="text-gray-400">
                Voluptate adipisicing nisi officia non proident pariatur.
                Sint non in excepteur amet officia mollit quis cupidatat.
            </div>
        </div>
    </div>
</a>
