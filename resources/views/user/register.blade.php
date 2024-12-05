<x-layout>
    <!-- The margin is to align the footer at the bottom of the screen correctly -->
    <x-form.form action="/register" class="mb-20">
        <div class="flex flex-col flex-wrap space-y-4">
            <x-form.input-field label="username" />
            <x-form.input-field type="email" label="email" />
            <x-form.input-field type="password" label="password" />
            <x-form.input-field type="password" label="password_confirmation" title="Confirm Password" />
        </div>
        <div>
            <x-form.submit value="Register" />
        </div>
    </x-form.form>
</x-layout>
