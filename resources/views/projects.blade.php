<x-layout>
    <div class="h-auto flex flex-col space-y-10 p-14 max-md:p-0">

    <x-title>Programming</x-title>
        <div class="flex flex-col space-y-10">
            <x-project :image="Vite::asset('resources/images/projects/website.png')" title="This website" href="/projects" id="amaweb_project">
                You're looking at this thing! It was an incredible learning experience and taught me my limitations as a
                software developer. Hopefully I can develop and improve this webiste given more time and experience. For now, I'm glad I finished this
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

        <x-title>Music</x-title>
        <div class="flex flex-col space-y-10">
            <x-project :image="Vite::asset('resources/images/projects/your-love-is-a-drug.jpg')" title="Your Love is a Drug Cover" href="https://soundcloud.com/amasirat/your-love-is-a-drug-cover?si=e57bfd4ce4464249a91b6ea50659566b">
               <p>
                My first ever cover made in Reaper using synths. Music production is a whole another world of music than doing
                music with notation softwares. For my first attempt, I believe it went as well as it could.
                </p>

                <p>
                    It's a song from a video game called VA-11 Hall-A, (pronounced Vallhala which realized a bit too late).
                    I found this game through going through spotify recommendations. The music was something really interesting,
                    it strikes a tone that I rarely hear but absolutely adore. That was why this project was an absolute dream.
                </p>
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/requiem of silence.jpg')" title="Requiem of Silence" href="https://youtu.be/fDBM0k44yFA?si=tBfeiZART2CJZpz_">
                My first ever completed transcribtion from ear. Requiem of Silence is a simple but yet devestatingly beautiful
                piece of music. Because it was simple, I felt I could try my hand at transcribing the parts.
                It was still incredibly difficult but it was yet another stepping stone for my improvement as a musician and composer.
                It helps a lot that it became pretty popular! I wish my other more polished later works would get more love too...
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/achildsDreamcover.png')" title="Inside my Dream" href="https://youtube.com/playlist?list=PLmBUjjdBhm5T7WYg2KNQkzmL21juvJuSw&si=OQt4cG0YRTFb31ST">
            <p>One summer week, I decided to participate in a composing gamejam thing.
                The idea was that a theme was given, and based on that theme (either a word or an art piece)
                you had to think up an imaginary game and compose its soundtrack. I decided to pick the art piece.
                In the art piece, a particular element that stood out to me was a figure the child was holding onto.
                It seemed like she was her mother or a guardian of sorts. I got intrigued and thought "What if this art piece was actually a child's fantasy, where they can see their lost guardian?"
                That idea intrigued me, I thought about a game where at the end you'll realize the entire game was a lie. The thesis of the game would be about facing reality.
                However to be able to land that theme, the initial lie had to be convincing, therefore I wrote a completely whimsical main theme.
                The theme heavily relied on progressions from major to major, especially the IV to V, etc.
                My intention was for this theme to eventually morph and change throughout
                the score and be infused with more complex harmony reflecting the change that would occur. The game would in other words be about maturing
                and realizing that you have to move on and not be stuck in your happy thoughts forever.
                Do not be happy in ignorance, be happy despite the knowledge, that is something I really believe in.</p>

                <p>
                    In any case, I only had a week so I could only score the beginning, or the "lie" let's say,
                    It was not ranked that highly, only in the 100s or so however I think in hindsight I am satisfied with
                    what I achieved despite the problems I had with what I came up with. Let me spare you of all the details of why that is.

                    Also yes, the cover was drawn by myself, I'm sure you noticed the amatuerish look of that thing right?
                </p>
            </x-project>

            <x-project :image="Vite::asset('resources/images/projects/original_pieces.png')" title="My Other Original Music" href="https://youtube.com/playlist?list=PLmBUjjdBhm5QjW8a1Bawz650oFZ4lznhA&si=RasDaReC_mJ0nivl">
            A playlist of original pieces of music, this list would be long if I had listed them all.
            </x-project>

        </div>

        <x-title>Writing</x-title>
        <div class="flex flex-col space-y-10">
            <x-project :image="Vite::asset('resources/images/projects/Tensura.png')" title="Second Awakening" href="https://archiveofourown.org/works/59630983/chapters/152087257">
                <p>
                    This story is what you would call fanfiction! It's a result of my over-ambitious mind
                    and a dream! It's incredibly slow to update
                    but once it does...well nothing happens. A new chapter releases. What did you expect?
                </p>

                <p>
                    The goal was to write a story with a similar world of Tensura,
                    however the tone of the story would be different. The world-building will be done in the way
                    that I want to read. It basically serves two purposes. 1.Practice and learn the creative craft of writing
                    2.Write a version of Tensura I would have enjoyed reading.
                    You can only check it out and see for yourself! I have no illusion it'll be any better than the original however
                    I've realized you should sometimes just take a leap and do it.
                </p>
            </x-project>
        </div>
    </div>
</x-layout>
