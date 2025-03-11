@props([
    "method" => "POST",
    "action" => "",
    "hasFile" => false,
    "width" => "default"
])
@php
    $class = "pb-8 flex flex-col flex-wrap justify-between space-y-6 space-x-2 px-5";
    // for acommodating methods such as patch or delete
    $isextra = false;
    if($method != "POST" && $method != "GET")
    {
        $extraMethod = $method;
        $isextra = true;
        $method = "POST";
    }

    // This is for making sure if there's a file uploaded, the form has the correct enctype
    $enctype = "";
    if($hasFile)
    {
        $enctype = "multipart/form-data";
    }
@endphp

<form {{ $attributes->merge(["method" => $method, "action" => $action, "class" => $class, "enctype" => $enctype]) }}>
    @csrf
    @if($isextra)
        @method($extraMethod)
    @endif

    {{ $slot }}

</form>
