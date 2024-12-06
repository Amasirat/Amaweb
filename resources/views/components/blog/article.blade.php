@props(["blog"])

<a href="/blogs/{{ $blog->id }}">
    <div class="bg-white/15 hover:bg-white/25 duration-300 max-w-72 h-56 rounded-xl p-2 shadow-2xl overflow-hidden">
        <div class="flex flex-row justify-center">
            <img class="shadow-2xl rounded-md w-40" src="{{ Vite::asset('resources/images/placeholders/achildsDreamcover.png') }}" alt="blog-image">
        </div>

        <div>
            <span class="font-bold">{{ $blog->title }}</span>
        </div>
    </div>
</a>
