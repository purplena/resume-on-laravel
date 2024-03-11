<section class="mb-12 px-4 max-w-maxScreenWidth sm:flex sm:items-end sm:mx-auto sm:px-0">
    <div>
        <img src="./images/photo-of-me-purple-small.png" alt="image of Lena" class="max-h-heroImage" />
    </div>
    <div>
        <h1 class="text-h1 mb-4 mt-4 sm:mt-0">Hi, I'm Lena</h1>
        <div class="flex flex-col gap-2 mb-4">
            <p>
                {{ __('home.welcome') }}
                I am a junior full-stack web developper.
            </p>
            <p>
                My favorite color is purple. That's how the name of my website
                appeared.
            </p>
            <p>
                I started learnig programming in September 2022 and I have never stopped since then.
            </p>
            <p>
                Let's work together?
            </p>
        </div>
        <div class="flex flex-row gap-4">
            <x-button-href text="projects" />
            <x-button-href text="skills" />
        </div>
    </div>
</section>
