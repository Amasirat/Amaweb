@props(["comment"])
@vite('resources/js/comment.js')

@php
    use App\MarkDownService;
@endphp

<div class="bg-white/15 m-10 p-5 rounded-xl max-md:m-2">
    <div class="w-1/5 h-10 flex flex-row justify-start">
        <div class="h-10">
            <img class="h-full w-full rounded-3xl" src="https://placehold.co/10" alt="profile_picture">
        </div>
        <div class="p-2 text-center">
            @if($comment->user != null)
                {{ $comment->user->username }}
            @else
                {{ $comment->guest_name }}
            @endif
        </div>
    </div>

    <div class="mt-5">
        {!! MarkDownService::Parse($comment->body) !!}
    </div>
</div>

