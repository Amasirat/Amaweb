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
                    <a href="/blogs/{{$blog->id}}/edit">Edit</a>
                @endcan
            </div>
        </div>
        <div class="border-t-2 mt-5 p-10 text-md">

            {!! $blog->body !!}

        </div>

        <div class="border-t-2 border-dashed mt-10">
            <div>
                <x-form.form>
                    @guest
                        <x-form.input-field label="guest_name"/>
                    @endguest
                    <x-blog.textarea name="body" />
                    <x-form.submit value="Comment" />
                </x-form.form>
            </div>

            <div class="flex flex-col space-y-10">
               <x-blog.displaycomment :comments="$blog->comments->reverse()" />
            </div>
        </div>
    </div>
</x-layout>
