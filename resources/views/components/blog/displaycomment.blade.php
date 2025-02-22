@props(["comments" => null, "max_recursive_margin" => 6])
@php
    if($comments == null)
        throw new InvalidArgumentException("Comment list was null, could not display comments");

    // filters a comment list to the list of comments that have a null comment_id
    function filter_to_non_replies($comments)
    {
        $new_comments = [];

        $i = 0;
        foreach($comments as $comment)
        {
            if($comment["comment_id"] == null)
                $new_comments[$i] = $comment;
            $i++;
        }
        return $new_comments;
    }
    // a recursive function that returns the maximum tree depth of the comments
    function get_max_depth($comments, $max_depth = 0): int
    {
        foreach($comments as $comment)
        {
            if(count($comment->replies) > 0)
            {
                $max_depth++;
                return get_max_depth($comment->replies, $max_depth);
            }
        }

        return $max_depth;
    }
@endphp

@if (count($comments) == 0)
    <div class="m-14 text-white/50">No Comments! Be the first to comment on this brilliant article!</div>
@endif

@foreach(filter_to_non_replies($comments) as $comment)
    <x-blog.comment :comment="$comment" />
    @if(count($comment->replies) > 0)
        @php
            $max_depth = get_max_depth(filter_to_non_replies($comments));
            $current_comment = $comment;
            $current_depth = 1;

            $stack = new SplStack();
            foreach($current_comment->replies as $reply)
            {
                $stack->push([$reply , $current_depth]);
            }
        @endphp

        @while($stack->count() != 0)
            @php
                $next_node = $stack->pop();
                $current_comment = $next_node[0];
                $current_depth = $next_node[1];
                if($current_depth <= $max_recursive_margin)
                    $margin = "ml-".($current_depth*8);
                else
                    $margin = "ml-".($max_recursive_margin*8);
            @endphp
            <x-blog.comment :comment="$current_comment" class="{{ $margin }}"/>
            @php
                if(count($current_comment->replies) > 0)
                {
                    foreach($current_comment->replies as $reply)
                    {
                        $stack->push([$reply , $current_depth+1]);
                    }
                }
            @endphp
        @endwhile
    @endif
@endforeach
