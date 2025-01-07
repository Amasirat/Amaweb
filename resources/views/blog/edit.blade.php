<x-layout>
    @vite('resources/js/blog/edit.js')
<div>
    <x-form.form method="PATCH" id="blog-edit" action="/blogs/{{$blog->id}}" :hasFile="true">
        <div class="flex flex-row justify-between max-sm:flex-col max-sm:space-y-8">
        <div class="flex flex-col">
            <x-form.input-field class="h-14 w-96" name="title" label="title" value="{{ $blog->title }}" type="text"/>
            <x-form.error field="title" />
        </div>
            <x-form.input-field class="h-14 w-72" name="image" label="image" type="file" />
            <x-form.error field="image" />
        </div>

        <textarea name="body" class="bg-white/35 rounded-lg min-h-96 p-5" placeholder="Write Here...">
            {{$blog->body}}
        </textarea>
        <x-form.error field="body" />
    </x-form.form>
    <div class="flex flex-row space-x-4 ml-5">
        <x-form.submit value="Update" form="blog-edit" />
        <button id="modal-button" class="text-red-500">Delete</button>
    </div>
</div>

<div id="delete-modal"
    class="invisible flex flex-col bg-white/5 shadow-xl
    w-96 h-52 p-6
    rounded-lg relative left-28">
    <div>
        <p class="text-red-500 font-bold text-lg">Are you sure you want to delete this blog?</p>
    </div>
    <div class="p-5 flex flex-row justify-between">
        <div class="p-6">
            <button id="cancel-modal" class="hover:bg-background duration-300 p-2 rounded-lg bg-white/15">Cancel</button>
        </div>
        <div>
            <x-form.form method="DELETE" action="/blogs/{{ $blog->id }}">
                <x-form.submit class="bg-red-500" value="Delete" />
            </x-form.form>
        </div>
    </div>

</div>


</x-layout>
