<x-mail::message>
# Someone replied to you!

How exciting! Let's go check it out!

<x-mail::button :url="url('/blogs')">
Let's go!
</x-mail::button>

Coming to you dearly from your lovely friend,<br>
{{ config('app.name') }}
</x-mail::message>
