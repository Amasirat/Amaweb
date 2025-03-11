<x-layout>
    <x-title size="large" class="mt-8">Drafts</x-title>
    <div class="flex flex-col space-y-8 w-full mt-11">
        @if(count($drafts) == 0)
            <x-empty-page>No Drafts Present!</x-empty-page>
        @endif

        @foreach($drafts as $draft)
        <x-blog.wide-article :item="$draft" link="/panel/drafts/{{ $draft->id }}" />
        @endforeach
    </div>

    <div>
        {{ $drafts->links('pagination::tailwind') }}
    </div>
</x-layout>