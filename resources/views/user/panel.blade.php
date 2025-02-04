<x-layout>
    <div class="flex flex-row max-sm:flex-col w-full max-sm:space-y-6">
        <div class="flex flex-row w-2/3 max-sm:flex-col">
            <div>
                <img class="rounded-xl h-40 w-40" alt="profile_picture" src="{{
                $user->profile_pic != null ?
                    'storage/'.$user->profile_pic :
                    Vite::asset('resources/images/placeholders/icons8-customer-50.png')
                }}">
            </div>

            <div class="p-6 max-sm:p-0 flex flex-col space-y-3">
                <span class="font-bold text-xl">{{ ucfirst($user->username) }}</span>
                <span class="text-sm">{{ $user->email }}</span>
                <div>
                    <button class="hover:bg-white/5 duration-300 bg-white/35 p-2 rounded-lg font-bold" id="picture-button">Edit Picture</button>
                    <div class="bg-black/60 rounded-lg absolute invisible" id="picture-upload-div">
                        <x-form.form method="PATCH" action="/upload-image" :hasFile="true">
                            <x-form.input-field class="h-9 p-1" type="file" name="image" label="Image"/>
                            <x-form.submit value="Upload" />
                        </x-form.form>
                    </div>
                    <x-form.error field="image"/>
                </div>
            </div>
        </div>
        <div class="w-1/3 p-10 max-sm:p-0 max-sm:justify-start flex flex-row justify-end">
            <form action="/logout" method="POST">
                @method("DELETE")
                @csrf
                <x-form.submit value="Logout"/>
            </form>
        </div>
    </div>
        @can("create-blog")
        <div class="bg-white/5 mt-6 flex flex-col w-1/5 rounded-lg h-auto duration-300 max-md:w-full">
            <x-link href="/create" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Create Blogs</x-link>
            <x-link href="/create" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Favorites</x-link>
            <x-link href="/create" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Comments</x-link>
        </div>
        @endcan

    <div>

    </div>
</x-layout>
