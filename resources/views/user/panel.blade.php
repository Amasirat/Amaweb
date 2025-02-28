@vite('resources/js/panel.js')
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
                @if($user->email_verified_at != null)
                <span class="text-sm">{{ $user->email }}</span>
                @else
                <span class="text-sm">Your email is not verified.</span>
                <x-form.form action="/email/verification-notification">
                    <button class="text-blue-500 hover:text-blue-200 duration-100" type="submit">Send new email verification</button>
                </x-form.form>
                @endif
                <div>
                    <x-form.button id="picture-button">Edit Picture</x-form.button>
                    <div class="bg-black/60 rounded-lg absolute hidden" id="picture-upload-div">
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
    @if($user->email_verified_at != null)
    <div class="flex flex-row justify-start m-0">
        <x-form.form method="PATCH" action="/panel/notify_status">
            <!-- The value in the hidden input, gives the opposite of the current notify value,
             that way it will only be a matter of updating the database -->
            <input type="hidden" value="{{ $user->notify ? '0' : '1' }}" name="notify">
            <button
                class="{{ $user->notify == "1" ?
                'hover:bg-red-500 hover:text-white text-red-500' :
                'hover:bg-green-500 hover:text-white text-green-500' }}

                bg-white/30 p-3 rounded-lg duration-300" type="submit">{{ $user->notify ? "Disable " : "Enable" }} Email Notifications</button>
        </x-form.form>
    </div>
    @endif

        <div class="bg-white/5 mt-3 flex flex-col w-1/5 rounded-lg h-auto duration-300 max-md:w-full">
            @can("create-blog")
            <x-link href="/create" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Create Blogs</x-link>
            <x-link href="/panel/blogs" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">See Blogs</x-link>
            @endcan
            <x-link href="/panel/comments" class="text-white text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Comments</x-link>
        </div>
    <div>

    </div>
</x-layout>
