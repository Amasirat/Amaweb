<x-layout>
    <div class="flex flex-col">
        <div class="mt-5 ml-10">
            <div>
                <img src="https://placehold.co/1200x600">
            </div>
            <div class="mt-5 text-2xl font-bold">{{ $blog->title }}</div>
            <div>
                <div class="text-gray-300 mt-5 text-sm">{{ $blog->created_at }}</div>
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
                    <textarea name="body" class="text-white rounded-xl w-96 h-52 bg-white/25 p-5">
                    </textarea>
                    <x-form.submit value="Comment" />
                </x-form.form>
            </div>

            @foreach($blog->comments as $comment)
                <x-blog.comment :comment="$comment" />
            @endforeach
        </div>
    </div>
</x-layout>
