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
    <div>

    </div>
</x-layout>
