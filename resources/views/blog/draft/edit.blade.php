<x-layout>
@vite('resources/js/edit.js')


<div class="flex flex-col w-full space-y-5">
    <div class="w-full pl-7 flex flex-row space-x-3 items-center">
        <a href="/panel/drafts"><button class="p-4 rounded-lg bg-white/25 hover:bg-white/45 duration-300"><img src="{{ Vite::asset('resources/images/icons/arrow-back.svg') }}" alt="back-arrow"></button></a>
        <span>Back to drafts</span>
    </div>

    <div class="flex flex-col space-x-4 m-7">
        <button id="modal-button" class="text-white max-w-20 bg-red-500 p-2 rounded-lg hover:bg-red-950 duration-300">Delete</button>
        <div id="delete-modal" class="hidden bg-white/5 shadow-xl w-96 h-52 p-6 rounded-lg">
            <div>
                <p class="text-red-500 font-bold text-lg">Are you sure you want to delete this draft?</p>
            </div>
            <div class="p-5 flex flex-row justify-between">
                <div class="p-6">
                    <button id="cancel-modal" class="hover:bg-background duration-300 p-2 rounded-lg bg-white/15">Cancel</button>
                </div>
                <div>
                    <x-form.form method="DELETE" action="/panel/drafts/{{ $draft->id }}">
                        <x-form.submit class="bg-red-500" value="Delete" />
                    </x-form.form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <x-form.form id="form" action="/panel/drafts/{{$draft->id}}" :hasFile="true">
            <div class="flex flex-row items-center max-md:items-start justify-between max-md:flex-col max-md:space-y-8">
                <div class="flex flex-col">
                    <x-form.input-field class="h-20 w-96 text-2xl font-bold" name="title" label="title" value="{{ $draft->title }}" type="text"/>
                    <x-form.error field="title" />
                </div>
                <div class="flex flex-col">
                <x-image class="w-68 h-64" href="{{ $draft->image() }}" src="{{ $draft->image() }}" alt="current_saved_draft_image"/>
                    <x-form.input-field class="h-9 w-72 p-1" name="image" label="image" type="file" />
                    <x-form.error field="image" />
                </div>
            </div>

            <textarea name="body" class="whitespace-pre-wrap bg-white/35 rounded-lg min-h-96 p-5" placeholder="Write Here...">{{$draft->body}}</textarea>
            <x-form.error field="body" />
            <div class="flex flex-row space-x-4 ml-5">
                <x-form.submit value="Save" form="form" />
                <x-form.submit value="Post Blog" form="form" formaction="/panel/drafts/post-draft/{{ $draft->id }}" />
            </div>
        </x-form.form>
    </div>


</div>


</x-layout>