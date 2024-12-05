@props(["comment"])
<div class="bg-white/15 m-10 p-5 rounded-xl">
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
        {{ $comment->body }}
    </div>
</div>
