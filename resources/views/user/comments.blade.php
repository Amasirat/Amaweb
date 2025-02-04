<x-layout>
    <div>
        <div class="space-y-14 mt-10">
            @foreach($comments as $comment)
            <div>
                <a href="/blogs/{{$comment->blog->id}}" class="text-white">
                <div class="p-5 bg-white/15 w-2/5 max-md:w-full hover:w-3/4 hover:bg-white/30 duration-300" >
                    <span class="text-white/15">from "{{ $comment->blog->title }}"</span>

                    <x-blog.comment :comment="$comment" />
                </div></a>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
