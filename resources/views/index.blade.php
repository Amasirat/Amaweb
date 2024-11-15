<x-layout>
    <section class="flex flex-row max-md:flex-col">
        <div class="w-1/2 max-md:min-w-full content-center">
            <img class="hover:border-8 hover:p-0 duration-300 cursor-pointer w-70 h-70 p-6" alt="main-image" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
        </div>
        <div class="w-1/2 max-md:min-w-full">
            <div class="bg-white/10 px-5 py-3 m-4 rounded-xl">
                <h2 class="py-5 font-bold text-4xl">This is div2</h2>

                <p class="p-3">
                    Reprehenderit culpa minim et sunt mollit.
                    Nostrud occaecat consequat magna ut officia cillum
                    veniam anim culpa consectetur dolor culpa.
                    Cupidatat eiusmod dolor elit consectetur mollit
                    exercitation incididunt enim Lorem duis dolore
                    aute cupidatat. Aliquip eu esse laborum cupidatat
                    eu cupidatat mollit do dolore dolore officia.

                    Ad consequat nostrud ut voluptate ea proident
                    ullamco in do dolor sunt officia commodo.
                    Ipsum laborum nulla eu veniam nisi elit nostrud
                    consequat est amet enim veniam tempor cupidatat.
                    Pariatur veniam cupidatat veniam elit sint ea est
                    ullamco nostrud tempor. Nulla consequat aute ullamco
                    nostrud ut ex magna exercitation aute aliqua id.
                    Sunt culpa excepteur ut cillum. Eu sunt reprehenderit
                    id aute occaecat fugiat tempor.
                </p>
            </div>
        </div>
    </section>

    <section class="border-b-2 h-52 w-full mt-5">
        <div class="flex flex-row justify-center w-full">
            <div class="inline-block px-4">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
        </div>
    </section>

    <div class="m-5">
        <h1 class="italic font-bold text-2xl p-10 text-center max-sm:text-xl">
            "A jack of all trades is a master of none, but often times better than a master of one"
        </h1>
    </div>


    <section class="space-y-2">
        <x-title>Featured</x-title>

        <div class="border-t-2">
                    <!-- Left Scroll Button -->
        <button id="scroll-left" class="z-10 bg-white/12 p-2 rounded-full shadow">
            &larr;
        </button>

        <div id="scrollable-div" class="overflow-x-auto whitespace-nowrap h-64">
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>
            <div class="inline-block px-4 h-64 w-80">
                <img class="w-72 h-52 p-4" src="{{ Vite::asset('resources/images/placeholders/city.jpg') }}">
            </div>

        </div>

        <!-- Right Scroll Button -->
        <button id="scroll-right" class="z-10 bg-white/12 p-2 rounded-full shadow">
            &rarr;
        </button>
        </div>
    </section>

</x-layout>
