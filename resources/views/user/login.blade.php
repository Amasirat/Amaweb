<x-layout>
    <x-form.form action="/login" class="mb-24">
        <x-form.input-field label="username" />
        <x-form.input-field label="password" />

        <x-form.submit value="Login" />
        <x-link href="/register">Do you want to register?</x-link>
        <x-link href="">Forgot Password?</x-link>
    </x-form.form>
</x-layout>
