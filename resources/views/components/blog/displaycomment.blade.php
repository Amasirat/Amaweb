@props(["comments" => null])
@php
    if($comments == null)
        throw new InvalidArgumentException("Comment list was empty, could not display comments");
@endphp

@foreach($comments as $comment)
    <x-blog.comment :comment="$comment" />
@endforeach
