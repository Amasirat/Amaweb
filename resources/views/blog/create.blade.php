<x-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.bubble.css" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <x-form.form action="/create" :hasFile="true">
        <div class="flex flex-row justify-between max-sm:flex-col max-sm:space-y-8">
        <div class="flex flex-col">
            <x-form.input-field class="h-9 w-96" name="title" label="title" type="text"/>
            <x-form.error field="title" />
        </div>
            <x-form.input-field class="h-9 w-72 p-1" name="image" label="image" type="file" />
            <x-form.error field="image" />
        </div>

        <textarea class="bg-white/20 rounded-lg min-h-96 p-5" name="body" placeholder="Write here..."></textarea>

        <x-form.error field="body" />
        <x-form.submit value="Post" />
    </x-form.form>
</x-layout>
