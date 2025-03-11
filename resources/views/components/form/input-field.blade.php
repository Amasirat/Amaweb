@props(["label" => "Input", "title" => $label, "type" => "text"])
<div class="flex flex-col space-y-1">
    <label class="font-bold border-t-2 border-r-2 rounded-sm w-fit px-3" for="{{ $label }}">{{ ucfirst($title) }}</label>
    <input {{ $attributes->merge([
        "class" => "w-64 rounded-md h-7 bg-white/25 px-2",
        "type" => $type,
        "name" => $label,
        "placeholder" => ucfirst($title),
        "value" => ""
    ]) }}>

</div>
