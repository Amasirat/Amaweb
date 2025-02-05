@props(["name" => "", "width"])

<textarea {{ $attributes->merge(['name' => $name, 'class' => "text-white rounded-xl max-w-96 max-sm:w-11/12 h-52 bg-white/25 p-5"])}}>
{{ $slot }}
</textarea>

