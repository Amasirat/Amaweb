@props(["item", "link" => "/blogs/".$item->id])

@php
    $title_limit = 33; // The minimum length that can be outputed without overflow
@endphp
<a class="text-white" href="{{ $link }}">
    <div class="bg-white/5 hover:bg-white/25 duration-300 w-96 h-96 rounded-xl p-2 shadow-2xl overflow-hidden">
        <div class="flex flex-row justify-center">
            <img class="shadow-2xl rounded-md w-96 h-72" src="{{ $item->image() }}" alt="blog-image">
        </div>

        <div class="p-2">
            <span class="font-bold text-xl">
                {{ (strlen($item->title) < config("app.title_limit")) ?
                    $item->title :
                    substr($item->title, 0, config("app.title_limit"))."..."}}
            </span>
        </div>
    </div>
</a>
