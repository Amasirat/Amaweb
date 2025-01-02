<x-layout>
    <x-form.form method="PATCH" action="/create" :hasFile="true">
        {{dd($blog->title)}}
        <div class="flex flex-row justify-between max-sm:flex-col max-sm:space-y-8">
        <div class="flex flex-col">
            <x-form.input-field class="h-14 w-96" name="title" label="title" value="{{ $blog->title }}" type="text"/>
            <input type="text" class="bg-gray-500 text-white" value="{{ $blog->title }}">
            <x-form.error field="title" />
        </div>
            <x-form.input-field class="h-14 w-72" name="image" label="image" type="file" />
            <x-form.error field="image" />
        </div>

        <textarea name="body" value="{{ $blog->body }}" class="bg-white/35 rounded-lg min-h-96 p-5" placeholder="Write Here..."></textarea>
        <x-form.error field="body" />
        <x-form.submit value="Post" />
    </x-form.form>
</x-layout>
