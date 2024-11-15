@props(["method" => "POST", "action" => ""])
@php
    $class = "pb-8 m-15 flex flex-col flex-wrap justify-between space-y-6 space-x-2 px-5";
    $isextra = false;
    if($method != "POST" && $method != "GET")
    {
        $extraMethod = $method;
        $isextra = true;
        $method = "POST";
    }
@endphp

<form {{ $attributes->merge(["method" => $method, "action" => $action, "class" => $class]) }}>
    @csrf
    @if($isextra)
        @method($extraMethod)
    @endif

    {{ $slot }}

</form>
