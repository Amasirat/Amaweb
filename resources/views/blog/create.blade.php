<x-layout>
    <div class="m-15">
        <x-form.form action="/blog/create" :hasFile="true" id="create-form">
            <div class="flex flex-row justify-between max-sm:flex-col max-sm:space-y-8">
                <div class="flex flex-col">
                    <x-form.input-field class="h-9 w-96" name="title" label="title" type="text"/>
                    <x-form.error field="title" />
                </div>
                <div>
                    <x-form.input-field class="h-9 w-72 p-1" name="image" label="image" type="file" />
                    <x-form.error field="image" />
                </div>
            </div>

            <textarea class="bg-white/20 rounded-lg min-h-96 p-5" name="body" placeholder="Write here..."></textarea>
            <x-form.error field="body" />

            <div class="mx-6 flex flex-row items-center space-x-4">
                <x-form.submit value="Post" />
                <x-form.submit value="Save Draft" formaction="/draft/create" />
            </div>
        </x-form.form>

    </div>
</x-layout>
