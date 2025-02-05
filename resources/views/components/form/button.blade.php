<button {{ $attributes->merge([
'class' =>
    "hover:bg-background duration-300 bg-white/35 p-2 rounded-lg font-bold",
'type' =>
    'button',
])}}>
{{ $slot }}

</button>
