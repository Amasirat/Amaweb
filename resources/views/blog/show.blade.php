<x-layout>
    <div class="flex flex-col">
        <div class="mt-5">
            <div class="w-auto">
                <img class="max-md:w-full w-10/12" src="{{ asset('storage/'.$blog->image) }}">
            </div>
            <div class="mt-5 text-2xl font-bold ml-5">{{ $blog->title }}</div>

            <div class="text-gray-300 mt-5 ml-5 text-sm">
                    {{ $blog->created_at }}
            </div>

            <div class="p-5 flex flex-row space-x-5">
                @can("edit-blog", $blog)
                    <a class="text-blue-500" href="/edit">Edit</a>
                    <a class="text-blue-500" href="">Delete</a>
                @endcan
            </div>
        </div>

        <div class="border-t-2 mt-5 p-10 text-md">

            {!! $blog->body !!}

        </div>

        <div class="border-t-2 border-dashed mt-10">
            @if (count($blog->comments) == 0)
                <div class="m-14 text-white/50">No Comments! Be the first to comment on this brilliant article!</div>
            @endif

            <div>
                <x-form.form>
                    @guest
                        <x-form.input-field label="guest_name"/>
                        <x-form.input-field label="email" />
                    @endguest
                    <textarea name="body" class="text-white rounded-xl max-w-96 max-sm:w-11/12 h-52 bg-white/25 p-5"></textarea>
                    <x-form.submit value="Comment" />
                </x-form.form>
            </div>
            <div class="flex flex-col space-y-10">
            @foreach($blog->comments as $comment)
                @if($comment->comment == null)
                    <x-blog.comment :comment="$comment" />
                @endif
                @foreach($comment->children as $reply)
                    <x-blog.comment class="ml-10 max-md:ml-5" :comment="$reply" />
                    @foreach($reply->children as $reply)
                        <x-blog.comment class="ml-15 max-md:ml-10x" :comment="$reply" />
                    @endforeach
                @endforeach
            @endforeach
            </div>
        </div>
    </div>
</x-layout>
