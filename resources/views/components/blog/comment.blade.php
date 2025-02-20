@props(["comment"])
@vite('resources/js/comment.js')

@php
    use App\MarkDownService;

    $timestamp_array = explode(" ", $comment->created_at);
    $commentDate = $timestamp_array[0];

@endphp

<div {{ $attributes->merge(['class' => "comment-wrapper bg-white/15 p-5 rounded-xl"])}}>
    <div class="flex flex-row justify-between">
        <div class="w-5/6 h-10 flex flex-row">
            <div class="h-auto w-10">
                <img class="h-full w-full rounded-3xl" src="{{
                $comment->user != null && $comment->user->profile_pic != null ?
                        Vite::asset('/public/storage/'.$comment->user->profile_pic) :
                        Vite::asset('/resources/images/placeholders/icons8-customer-50.png')
                    }}"
                    alt="profile_pic">
            </div>

            <div class="text-sm w-1/2 p-2 {{ ($comment->user == $comment->blog->user) ? 'text-blue-500' : 'text-white' }}">
                @if($comment->user != null)
                    {{ $comment->user->username }}
                    @if($comment->user == $comment->blog->user)
                        <span class="bg-blue-500 text-white p-1 rounded-lg">Author</span>
                    @endif
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
        <div class="comment-text">
            {!! MarkDownService::Parse($comment->body) !!}
        </div>
        <div class="edit-comment-box hidden">
            <x-form.form method="PATCH" action="/comment/edit">
                <x-blog.textarea name="edited">
                    {{ $comment->body }}
                </x-blog.textarea>
                <x-form.error field="edited" />
                <textarea class="hidden" name="comment_id">{{ $comment->id }}</textarea>
                <div class="flex flex-row space-x-3">
                    <x-form.button class="cancel-edit">Cancel</x-form.button>
                    <x-form.submit value="Update" />
                </div>
            </x-form.form>
        </div>
    </div>

    <div class="mt-2 space-x-2">
    <x-form.button class="reply-button">Reply</x-form.button>
    @if($comment->user == Auth::user())
        <button class="edit-comment text-blue-500 hover:text-blue-200 duration-200">Edit</button>
    @endif
    </div>

    <div class="reply-form hidden bg-white/15 rounded-xl mt-2">
        <x-form.form>
        @guest
            <x-form.input-field label="guest_name"/>
        @endguest

            <x-blog.textarea name="body"/>
            <input name="comment_id" type="number" class="hidden" value="{{ $comment->id }}" />
            <div>
                <x-form.button class="reply-cancel">Cancel</x-form.button>
                <x-form.submit value="Reply" />
            </div>
        </x-form.form>
    </div>
</div>

