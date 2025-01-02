@props(["title" => "Title", "image" => "https://placehold.co/500x400", "href" => "#"])

<a href="{{ $href }}">
    <div class="rounded-xl bg-white/5 min-h-96 flex flex-row max-lg:w-full max-lg:flex-col p-8 hover:bg-white/15">
        <div class="w-1/3 max-xl:w-1/4 max-lg:w-full">
            <img class="rounded-xl max-lg:w-full h-full" src="{{$image}}" alt="project">
        </div>

        <div class="w-2/3 max-xl:w-3/4 flex flex-col max-lg:w-full">
            <div class="flex flex-row w-full p-6">
                <h1 class="font-bold text-6xl mt-6">{{ $title }}</h1>
            </div>

            <div class="text-white/35 p-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</a>
