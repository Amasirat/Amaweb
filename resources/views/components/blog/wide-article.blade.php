@props(["blog"])

<a href="/blogs/{{ $blog->id }}">
    <div class="bg-white/15 rounded-xl flex flex-row max-md:flex-col w-full h-auto p-4 hover:bg-white/45 duration-500">

        <div class="w-1/3 max-md:w-full">
            <img class="w-full h-full"
                src="{{ Vite::asset('resources/images/placeholders/achildsDreamcover.png') }}">
        </div>

        <div class="w-1/2 grid p-14 max-md:w-full max-md:p-6">
            <div class="font-bold text-4xl self-center">{{ $blog->title }}</div>
        </div>
    </div>
</a>
