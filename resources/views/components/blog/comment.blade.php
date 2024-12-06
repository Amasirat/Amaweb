@props(["comment"])
@vite('resources/js/comment.js')

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
    <div class="mt-5">
        <button id="reply_button">Reply</button>
    </div>
</div>

<!-- <div id="reply_division" class="w-1/4 bg-blue/20 z-10 position static">
    <x-form.form>
        @guest
            <x-form.input-field label="guest_name"/>
            <x-form.input-field label="email" />
        @endguest
        <textarea name="body" class="text-white rounded-xl w-96 h-52 bg-white/25 p-5"></textarea>
        <div class="flex flex-row justify-between">
            <x-form.submit value="Reply" />
            <button id="cancel_button" class="px-1">Cancel</button>
        </div>
    </x-form.form>
</div> -->


