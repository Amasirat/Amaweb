<x-layout>
    <div>
        <div class="space-y-10">
            @foreach($comments as $comment)
                <x-blog.comment :comment="$comment" />
            @endforeach
        </div>
    </div>
</x-layout>
