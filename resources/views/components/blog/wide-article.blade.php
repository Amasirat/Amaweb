@props(["item", "link" => "/blogs/".$item->id])

<a class="text-white" href="{{ $link }}">
    <div class="bg-white/15 rounded-xl flex flex-row max-lg:flex-col w-full h-auto p-4 hover:bg-white/45 duration-500">

        <div class="w-1/3 max-lg:w-full">
            <img class="w-full h-full" src="{{ $item->image() }}">
        </div>

        <div class="w-1/2 grid p-14 max-lg:w-full max-lg:p-6">
            <div class="font-bold text-4xl self-center">{{ $item->title }}</div>
        </div>
    </div>
</a>
