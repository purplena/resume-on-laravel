<section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto mt-navbarMargin" id="home">
    <div class="flex flex-col items-center md:flex-row-reverse md:justify-between md:gap-10">
        <div class="relative">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -z-10">
                <div class="pulse-cirle pulse simple h-[180px] w-[180px] rounded-full"></div>
            </div>
            <img src="{{ asset('/images/assets/photo-bg-empty.png') }}" alt="image of Lena"
                class="w-[100%] max-w-heroImage" />
            <div
                class="w-full flex flex-row justify-center gap-4 absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                <x-sections.components.social-icon-links href="https://github.com/purplena" icon="fa-github" />
                <x-sections.components.social-icon-links href="https://www.linkedin.com/in/elena-khramova-4a800b84/"
                    icon="fa-linkedin" />
            </div>
        </div>
        <div class="flex flex-col">
            <h1 class="text-h1 mt-8 mb-4 md:mt-0">{{ __('hero.welcome') }}</h1>
            <h2 class="text-h4 mb-2 typing-h2">
                &lt;{{ __('hero.h2') }}/&gt;
            </h2>
            <div class="leading-loose mb-2 w-[100%] max-w-heroParagraph">
                <p>
                    {{ __('hero.p2') }}
                </p>
                <p>
                    {{ __('hero.p3') }}
                </p>
                <p>
                    {{ __('hero.p4') }}
                </p>
            </div>

            <div class="flex flex-col xs:flex-row gap-2">
                <button
                    class="btn-transition block w-[170px] py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg"
                    id="scroll-to-projects-btn">{{ __('button.projects') }}</button>
                <button
                    class="btn-transition block w-[170px] py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg"
                    id="scroll-to-contact-btn">{{ __('button.contact') }}</button>
            </div>
        </div>

    </div>
</section>
