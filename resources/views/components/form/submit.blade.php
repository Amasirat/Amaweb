@props(["value" => "Submit"])

<button {{ $attributes->merge([
    'class' => "shadow-lg bg-white/35 w-fit px-3 py-2 rounded-lg font-bold hover:bg-background duration-300 cursor-pointer",
    'type' => "submit",
]) }}>{{ $value }}</button>
