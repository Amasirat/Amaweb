@props(["comments" => null])
@php
    if($comments == null)
        throw new InvalidArgumentException("Comment list was empty, could not display comments");
@endphp

@if (count($comments) == 0)
    <div class="m-14 text-white/50">No Comments! Be the first to comment on this brilliant article!</div>
@endif

@foreach($comments as $comment)
    <x-blog.comment :comment="$comment" />
@endforeach
