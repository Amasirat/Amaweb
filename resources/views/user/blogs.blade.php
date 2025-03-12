<x-layout>
    <div>
        <div class="space-y-14 mt-10">
            @foreach($blogs as $blog)
            <div>
                <a href="/blogs/{{$blog->id}}" class="text-white">
                <div class="p-5 bg-white/15 w-2/5 max-md:w-full hover:w-3/4 hover:bg-white/30 duration-300" >

                    <x-blog.wide-article :item="$blog" />
                </div></a>
            </div>
            @endforeach
        </div>

        @if(count($blogs) == 0)
            <div class="text-white/30 pt-40 pl-52">
                You have written no blogs!
            </div>
        @endif
    </div>
</x-layout>
