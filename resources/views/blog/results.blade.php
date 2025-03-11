<x-layout>
<div class="flex flex-col mt-10">
        <x-blog.search />

        <x-title class="mb-10">Search Results: {{ count($blogs) }}</x-title>
        <div class="w-11/12 max-md:w-full max-md:p-0 flex flex-col space-y-6">

            @if (count($blogs) == 0)
            <div class="flex flex-row justify-center mt-10">
                <div class="text-xl text-white/35 mt-48">
                    Nothing Found!
                </div>
            </div>
            @endif
            @foreach($blogs as $blog)
                <x-blog.wide-article :item="$blog" class="w-3/4" />
            @endforeach
        </div>

    </div>
</x-layout>
