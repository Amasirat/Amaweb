<x-layout>
    <div class="flex flex-row-reverse max-md:flex-col mt-10 mb-80">
        <div class="w-1/2 h-24 flex flex-row justify-end mr-5 max-sm:justify-start max-sm:mx-3">
            <input class="w-60 h-10 rounded-xl p-2 bg-white/30" type="text" placeholder="Search...">
        </div>
        <div class="w-11/12 pt-10 max-md:w-full">

            @if (count($blogs) == 0)
            <div class="flex flex-row justify-center mt-10">
                <div class="text-xl text-white/35 mt-15">
                    Nothing's here!
                </div>
            </div>
            @endif

            @foreach($blogs as $blog)
                <x-blog.wide-article :blog="$blog" class="w-3/4" />
            @endforeach

            <div>
                {{ $blogs->links('pagination::tailwind') }}
            </div>
        </div>

    </div>
</x-layout>
