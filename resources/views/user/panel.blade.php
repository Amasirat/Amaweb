<x-layout>
    <div class="flex flex-row max-sm:flex-col w-full max-sm:space-y-6">
        <div class="flex flex-row w-2/3 max-sm:flex-col">
            <div>
                <img class="rounded-1xl" alt="profile_picture" src="https://placehold.co/100x100">
            </div>

            <div class="p-6 max-sm:p-0 flex flex-col space-y-3">
                <span class="font-bold text-xl">{{ ucfirst($user->username) }}</span>
                <span class="text-sm">{{ $user->email }}</span>
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
        <div class="bg-white/5 mt-6 flex flex-col w-1/5 rounded-lg min-h-96 duration-300 max-md:w-full">
            <x-link href="/create" class="text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Create Blogs</x-link>
            <x-link href="" class="text-sm font-bold text-center max-md:text-lg hover:bg-white/15 hover:border-white-100 hover:border-4 p-10">Favorites</x-link>
        </div>
        @endcan

    <div>

    </div>
</x-layout>
