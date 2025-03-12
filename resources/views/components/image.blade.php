@props(["src" => "", "href" => "#"])
<a href="{{ $href }}">
    <img {{$attributes->merge([
        "class" => "hover:border-8 hover:p-0 duration-300 cursor-pointer p-6",
        "src" => $src
    ])}}>
</a>
