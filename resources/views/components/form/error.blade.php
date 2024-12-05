@props(["field"])

@error($field)
    <span class="text-red-500 italic">{{ $message }}</span>
@enderror
