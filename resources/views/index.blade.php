@vite('resources/js/scroll.js')
<x-layout>
    <section class="flex flex-row max-md:flex-col">
    <div class="w-1/2 max-md:min-w-full content-center">
        <x-image class="w-62 h-70" href="/about" src="{{ Vite::asset('resources/images/homepage/portrait.jpg') }}" />
    </div>
        <div class="w-1/2 max-md:min-w-full">
            <div class="bg-white/10 px-5 py-3 m-4 min-h-full rounded-xl">
                <h2 class="py-5 font-bold text-4xl">Welcome!</h2>
                <div class="p-3 text-lg space-y-4">
                <p>
                   If you have found this website, either on your journey of surfing through the net
                   (Pretty old fashioned but respectable) or getting a link to it from me or anyone else, welcome!
                   You will find many valuable information on this website, such as...my projects....my thoughts on things...,
                   mainly my thoughts on things to be honest.
                   It's a very me centered website as most personal websites are I guess.
                </p>
                <p>
                   You also have the incredible feature of...drumroll!!!!...Making an account on my personal website.
                   That way I can make sure you get the latest valuable information on my next thinkpiece. That's exactly
                   what you need in your life right now! (That feature is still pending...)
                </p>
                <p>
                   Who am I? I am many things! I am a Computer Engineering student, a musician, a composer, a writer,
                   and someone who wants to draw. I have many thoughts and many interests and this site is both my way of showing that off
                   while also having said that I have worked on a Laravel project and I know what I'm talking about!
                </p>
                <p>
                   So feel free to browse around! Make yourself at home!.
                </p>
                <p>
                    Check out the Blogs section for my latest <i>musings</i>
                </p>
                </div>
            </div>
        </div>
    </section>

    <div class="m-5">
        <h1 class="italic font-bold text-2xl p-10 text-center max-sm:text-xl">
            "A jack of all trades is a master of none, but often times better than a master of one"
        </h1>
    </div>


    <section class="space-y-2">
        <x-title size="medium">Featured</x-title>

        <div>
            <div class="flex flex-row justify-between w-full">
                <!-- Left Scroll Button -->
                <button id="scroll-left" class="z-10 bg-white/12 p-2 rounded-md shadow">
                    &larr;
                </button>

                <!-- Right Scroll Button -->
                <button id="scroll-right" class="z-10 bg-white/12 p-2 rounded-md shadow">
                    &rarr;
                </button>
            </div>

            <div id="scrollable-div" class=" bg-white/5 p-4 flex flex-row overflow-x-auto whitespace-nowrap h-auto space-x-7">
                @foreach ($featured_blogs as $blog)
                <x-blog.article :item="$blog" />
                @endforeach

                @if($featured_blogs->count() == 0)
                    <div class="h-auto p-24">
                        <span class="p-28 min-xl:p-32 text-white/30">No Featured blogs yet...I've got a massive case of writer's block guys!</span>
                    </div>
                @endif
            </div>
        </div>
    </section>

</x-layout>
