<x-layout>
    <div class="h-auto flex flex-col space-y-10 p-14 max-md:p-0">

    <h1 class="font-bold text-2xl ml-2">Programming</h1>
        <div class="border-t-2 flex flex-col space-y-10">
            <x-project :image="Vite::asset('resources/images/projects/website.png')" title="This website" href="/projects" id="amaweb_project">
                You're looking at this thing! It was an incredible learning experience and taught me my limitations as a
                software developer. It actually made me realize I have to take learning Javascript seriously. So Off we go!!
                Hopefully I can develop and improve this webiste given more time and experience. For now, I'm glad I finished this
                for myself.
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/PongClone.png')" title="PongClone" href="https://github.com/Amasirat/PongClone">
                I've always wanted to learn game engines ever since I was in middle school and had gotten my start on learning C#.
                I could never be able to do anything worthwhile though...Followed a few tutorials on Unity,
                tried to work with Unreal (Epic fail on that one lol), it seemed like it was impossible. That was because <bold>it was</bold>
                ...By my knowledge and skill level then, which was close to 0 as compared to my knowledge now, after going to university.
                Now that I've learned a few things about programming paradigms I managed to build a simple Pong clone as practice.
                Along with the whole menu system and state management which took me a lot more time than the gameplay itself surprisingly.
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/darkened.png')" title="Darkened" href="https://github.com/Amasirat/Darkened">
                <p>
                So after learning the Godot Engine by building a simple project, I naturally started work on a game
                using...SFML. Naturally.
                It turned out like this in hindsight but I assure I had a reason for doing that. I wanted to challenge myself by
                trying to build a project entirely with code, using only the simplest building blocks for rendering.
                </p>
                <p>
                The idea for this game came from my desire to practice OOP after finishing my first year. Back then I had no idea
                where to start with rendering graphics, so I wanted to make a console text-based game. Somehow it occured to me...
                The fact that you can't see or hear anything..is because it's <i>a spell!!</i>, one where you have been summoned to save the people from.
                That's why you can't see any graphics, not because I did not know how to render stuff lol
                </p>
                <p>
                That was the starting point, it of course went through cycles of scope creep as you do, the next thing I knew it got abandoned.
                </p>
                I still absolutely loved the idea, so I decided to revisit it when I became a more capable programmer.
                This time I would make a game that only relied on sounds and limited vision! Although I needed more control than the console allowed,
                so I found a middle point between no rendering and a full-fledged game engine, and that was SFML.
                </p>
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/nandtree.png')" title="NANDTree" href="https://github.com/Amasirat/NANDTree">
                This is my Algorithm Design's final project. It was a problem about a structure called a NAND Tree where every
                leaf nodes are 1s and 0s and its parents are gates that do a NAND operation recursively until the tree's end value
                is evaluated. It was a very proof heavy project and honestly quite difficult, but it gave me perspective on how more
                research-oriented work in Computer Science is like. At the end of it all, I think I enjoyed my work on it.
                The full description of the project is documented on my github.
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/randimania.png')" title="Randimania" href="https://github.com/Amasirat/randimania">
                This might be my first ever full-on project which was aimed to solve a specific issue I had.
                I wanted to use a randomizer to be able to get some random Drawabox exercises to do each day as warm up.
                It was a great opportunity to get a good project going.
            </x-project>
        </div>



        <h1 class="font-bold text-2xl ml-2">Music</h1>
        <div class="border-t-2 flex flex-col space-y-10">
            <x-project :image="Vite::asset('resources/images/projects/your-love-is-a-drug.jpg')" title="Your Love is a Drug Cover" href="https://archiveofourown.org/works/59630983/chapters/152087257">
                My first ever cover made in Reaper using synths. Music production is a whole another world of music than doing
                music with notation softwares. For my first attempt, I believe it went as well as it could.
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/requiem of silence.jpg')" title="Requiem of Silence" href="https://archiveofourown.org/works/59630983/chapters/152087257">
                My first ever completed transcribtion from ear. Requiem of Silence is a simple but yet devestatingly beautiful
                piece of music. Because it was simple, I felt I could try my hand at transcribing the parts.
                It was still incredibly difficult but it was yet another stepping stone for my improvement as a musician and composer.
                It helps a lot that it became pretty popular! I wish my other more polished later works would get more love too...
            </x-project>
        </div>


        <h1 class="font-bold text-2xl ml-2">Writing</h1>
        <div class="border-t-2">
            <x-project title="Second Awakening" href="https://archiveofourown.org/works/59630983/chapters/152087257">
                This story is what you would call fanfiction! It's a result of my over-ambitious mind and a dream! It's incredibly slow to update
                but once it does...well nothing happens. A new chapter releases. What did you expect?
            </x-project>
        </div>
    </div>
</x-layout>
