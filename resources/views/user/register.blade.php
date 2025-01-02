<x-layout>
    <!-- The margin is to align the footer at the bottom of the screen correctly -->
    <div class="flex flex-row justify-between max-md:flex-col">
        <div class="max-md:w-full">
        <x-form.form action="/register">
            <div class="flex flex-col flex-wrap space-y-4">
                <x-form.input-field label="username" />
                <x-form.error field="username" />
                <x-form.input-field type="email" label="email" />
                <x-form.error field="email" />
                <x-form.input-field type="password" label="password" />
                <x-form.error field="password" />
                <x-form.input-field type="password" label="password_confirmation" title="Confirm Password" />
                <x-form.error field="password_confirmation" />
            </div>
            <div>
                <x-form.submit value="Register" />
            </div>
        </x-form.form>
        </div>

        <div class="p-5 bg-white/5 rounded-lg m-6 max-md:w-full max-md:m-0">
            <h1 class="text-4xl font-bold">Why would you want to register?</h1>
            <h6 class="text-xl mt-4">Reasons for registering:</h6>
            <ol class="p-2 space-y-2">
                <li>You can be annoyed by me via Email whenever I release something</li>
                <li>You can comment as yourself</li>
                <li>...</li>
            </ol>

            <h6 class="text-xl">Reasons against registering: </h6>
            <ol class="p-2 space-y-2">
                <li>You can be annoyed by me via Email whenever I release something</li>
                <li>It's kind of pointless</li>
                <li>This website does not do anything useful like recommending you articles based on its sophisticated machine learning models</li>
                <li>It doesn't even give you a way of favoriting blogs (Why would you want to even do that?)</li>
            </ol>
        </div>
    </div>
</x-layout>
