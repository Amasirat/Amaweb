<x-layout>
    <div class="flex flex-row-reverse max-md:flex-col mt-10">
        <div class="w-1/2 h-24 flex flex-row justify-end max-md:justify-start max-md:w-11/12">
            <input class="bg-white/30 rounded-xl w-full h-10 m-4 p-2" type="text" placeholder="Search...">
        </div>
        <div class="w-11/12 max-md:w-full max-md:p-0 flex flex-col space-y-6">

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
