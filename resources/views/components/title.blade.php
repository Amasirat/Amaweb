@props(["size" => "large"])
<div {{ $attributes->merge(['class' => "border-b-2"]) }}>
    @switch($size)
        @case("large")
            <h3 class="px-5">{{ $slot }}</h3>
            @break
        @case("medium")
            <h4 class="px-5">{{ $slot }}</h4>
            @break
        @case("small")
            <h6 class="px-5">{{ $slot }}</h6>
            @break
        @default
            <h3 class="px-5">{{ $slot }}</h3>
    @endswitch

</div>