<x-layout>
    <x-form.form action="/create" :hasFile="true">
        <div class="flex flex-row justify-between max-sm:flex-col max-sm:space-y-8">
        <div class="flex flex-col">
            <x-form.input-field class="h-9 w-96" name="title" label="title" type="text"/>
            <x-form.error field="title" />
        </div>
            <x-form.input-field class="h-9 w-72" name="image" label="image" type="file" />
            <x-form.error field="image" />
        </div>

        <textarea name="body" class="bg-white/35 rounded-lg min-h-96 p-5" placeholder="Write Here..."></textarea>
        <x-form.error field="body" />
        <x-form.submit value="Post" />
    </x-form.form>
</x-layout>
