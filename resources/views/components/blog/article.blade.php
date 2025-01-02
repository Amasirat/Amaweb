@props(["blog"])

@php
    if(! is_null($blog->image))
        $blogImage = asset('storage/'.$blog->image);
    else
        $blogImage = "https://placehold.co/500x400";
@endphp
<a href="/blogs/{{ $blog->id }}">
    <div class="bg-white/5 hover:bg-white/25 duration-300 w-96 h-96 rounded-xl p-2 shadow-2xl overflow-hidden">
        <div class="flex flex-row justify-center">
            <img class="shadow-2xl rounded-md w-96 h-72" src="{{ $blogImage }}" alt="blog-image">
        </div>

        <div class="p-5">
            <span class="font-bold text-xl">{{ $blog->title }}</span>
        </div>
    </div>
</a>
