<x-layout>
    <div class="flex flex-row max-sm:flex-col w-full max-sm:space-y-6">
        <div class="w-1/3">
            <img class="rounded-1xl" alt="profile_picture" src="https://placehold.co/100x100">
        </div>

        <div class="w-1/3 p-6 max-sm:p-0 flex flex-col space-y-3">
            <span class="font-bold text-xl">{{ ucfirst($user->username) }}</span>
            <span class="text-sm">{{ $user->email }}</span>
        </div>
        <div class="w-1/3 p-10 max-sm:p-0 max-sm:justify-start flex flex-row justify-end">
            <form action="/logout" method="POST">
                @method("DELETE")
                @csrf
                <x-form.submit value="Logout"/>
            </form>
        </div>

    </div>

        <div class="bg-white/5 flex flex-col w-1/6 rounded-lg p-4 min-h-96 hover:bg-white/10 duration-300">
            @can("create-blog")
            <x-link href="/create" class="text-sm font-bold m-2">Create Blogs</x-link>
            @endcan
            <x-link href="" class="text-sm font-bold m-2">Favorites</x-link>
            <x-link href="" class="text-sm font-bold m-2">Comments</x-link>
        </div>

    <div>

    </div>
</x-layout>
