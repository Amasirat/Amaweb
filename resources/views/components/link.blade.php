@props(["active" => false])
@php
    $class = "hover:text-white/45 boxtransition-colors duration-300";
    if($active)
    {
        $class .= " text-white/45";
    }
@endphp

<a {{ $attributes->merge(["class" => $class])}}>{{ $slot }}</a>
