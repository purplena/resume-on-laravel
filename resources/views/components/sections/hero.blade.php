<section class="mb-12 pt-8 px-4 max-w-maxScreenWidth mx-auto" id="home">

    <div class="flex flex-col items-center md:flex-row-reverse md:justify-between md:gap-10">
        <div class="relative">
            <div class="pulse-container">
                <div class="pulse simple"></div>
            </div>
            <img src="{{ url('/images/photo-yellow-circle.png') }}" alt="image of Lena" class="w-[100%] max-w-heroImage" />
            <div class="w-full flex flex-row justify-center gap-4 absolute -bottom-2 left-0 transform-translate-50-left">
                <div
                    class="w-[40px] h-[40px] bg-white rounded-full border border-solid border-main-500 relative hover:bg-egg">
                    <i class="absolute transform-translate-50-left-top fa-brands fa-linkedin fa-2x "
                        style="color: #b3a3c0;"></i>
                </div>
                <div
                    class="w-[40px] h-[40px] bg-white rounded-full border border-solid border-main-500 relative hover:bg-egg">
                    <i class="absolute transform-translate-50-left-top fa-brands fa-github fa-2x "
                        style="color: #b3a3c0;"></i>
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <h1 class="text-h1 mt-8 mb-4 md:mt-0">{{ __('hero.welcome') }}</h1>
            <h2 class="text-h4 mb-2">
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

            <div class="flex flex-row gap-2">
                <button
                    class="projects-button block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]"
                    id="scroll-to-projects-btn">{{ __('button.projects') }}</button>
                <button
                    class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]"
                    id="scroll-to-contact-btn">{{ __('button.contact') }}</button>
            </div>

        </div>





    </div>
</section>
