@props(["blog"])

<a href="/blogs/{{ $blog->id }}">
    <div class="bg-white/15 rounded-xl w-11/12 h-auto p-4 m-5 flex flex-row hover:bg-white/45 duration-500 cursor-pointer">

        <div class="w-1/3">
            <img class="w-full h-full max-md:w-52 max-md:h-52"
                src="{{ Vite::asset('resources/images/placeholders/achildsDreamcover.png') }}">
        </div>

        <div class="w-2/3 flex flex-col space-y-5 p-6">
            <div class="font-bold text-2xl">{{ $blog->title }}</div>
            <div class="text-gray-400">
                Voluptate adipisicing nisi officia non proident pariatur.
                Sint non in excepteur amet officia mollit quis cupidatat.
                Commodo Lorem ullamco esse cupidatat adipisicing non voluptate ea.
                Pariatur eiusmod excepteur ullamco qui exercitation aliquip adipisicing
                sit tempor adipisicing minim cillum commodo ullamco.
            </div>
        </div>
    </div>
</a>
