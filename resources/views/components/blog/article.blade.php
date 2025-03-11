@props(["blog"])

@php

    if(! is_null($blog->image))
        $blogImage = url($blog->image);
    else
        $blogImage = "https://placehold.co/500x400";

    $title_limit = 33; // The minimum length that can be outputed without overflow
@endphp
<a class="text-white" href="/blogs/{{ $blog->id }}">
    <div class="bg-white/5 hover:bg-white/25 duration-300 w-96 h-96 rounded-xl p-2 shadow-2xl overflow-hidden">
        <div class="flex flex-row justify-center">
            <img class="shadow-2xl rounded-md w-96 h-72" src="{{ $blogImage }}" alt="blog-image">
        </div>

        <div class="p-2">
            <span class="font-bold text-xl">
                {{ (strlen($blog->title) < $title_limit) ?
                    $blog->title :
                    substr($blog->title, 0, $title_limit)."..."}}
            </span>
        </div>
    </div>
</a>
