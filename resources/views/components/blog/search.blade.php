@props(["action" => "/search"])

<div class="w-1/3 h-24 flex flex-row m-4 justify-end max-md:w-11/12">
    <form method="GET" action="{{ $action }}" class="flex flex-row justify-center space-x-3 w-full h-10">
        <input class="bg-white/30 rounded-xl w-full h-10 p-2" type="text" name="search_string" placeholder="Search...">
        <x-form.submit value="Search" />
    </form>
</div>
