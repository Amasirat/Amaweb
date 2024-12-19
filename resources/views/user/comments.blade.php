<x-layout>
    <div>
        <div>
            @foreach($comments as $comment)
                <x-blog.comment :comment="$comment" />
            @endforeach
        </div>
    </div>
</x-layout>
