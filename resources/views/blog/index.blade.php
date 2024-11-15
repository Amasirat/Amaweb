<x-layout>
    <div class="flex flex-row-reverse max-md:flex-col mt-10">
        <div class="w-1/4 h-24 flex flex-row justify-end">
            <input class="w-60 h-10 rounded-xl p-2 bg-white/30" type="text" placeholder="Search...">
        </div>
        <div class="w-3/4 pt-10 max-md:w-full">
            @foreach($blogs as $blog)
                <x-blog.wide-article :blog="$blog" />
            @endforeach
        </div>

    </div>
</x-layout>
