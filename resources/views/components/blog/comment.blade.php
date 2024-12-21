@props(["comment"])
@vite('resources/js/comment.js')

@php
    use App\MarkDownService;

    $timestamp_array = explode(" ", $comment->created_at);
    $commentDate = $timestamp_array[0];

@endphp

<div class="bg-white/15 p-5 rounded-xl max-md:m-2">

    <div class="flex flex-row justify-between">
        <div class="w-5/6 h-10 flex flex-row">
            <div class="h-auto">
                <img class="h-full w-full rounded-3xl" src="https://placehold.co/10" alt="profile_picture">
            </div>

            <div class="text-sm w-1/2 p-2">
                @if($comment->user != null)
                    {{ $comment->user->username }}
                @else
                    {{ $comment->guest_name }}
                @endif
            </div>
        </div>

        <div class="w-1/6 flex flex-row justify-end">
            <div class="text-sm text-white/20">
                {{ $commentDate == date('Y-m-d') ? "Today" : $commentDate }}
            </div>
        </div>

    </div>

    <div class="mt-5">
        {!! MarkDownService::Parse($comment->body) !!}
    </div>
</div>

