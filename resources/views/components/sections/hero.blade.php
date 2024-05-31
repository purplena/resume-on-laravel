<section class="mb-12 pt-8 px-4 max-w-maxScreenWidth mx-auto" id="home">
    <h1 class="text-h1 text-center mb-2 sm:mt-0">{{ __('hero.welcome') }}</h1>
    <h2 class="text-h4 text-center">
        &lt;Full Stack Web Developer/&gt;
    </h2>
    <div class="flex flex-col items-center relative">
        <div class="pulse-container">
            <div class="pulse simple"></div>
        </div>
        {{-- <div class="circle one"></div>
        <div class="circle two"></div>
        <div class="circle three"></div> --}}
        <div>
            <img src="{{ url('/images/photo-yellow-circle.png') }}" alt="image of Lena" class="max-h-heroImage" />
        </div>



        <div
            class="w-full flex flex-col gap-2 xs:flex-row absolute -bottom-8 left-0 hero-buttons-container xs:-bottom-2 sm:gap-4 xs:w-auto">
            <button
                class="projects-button block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]"
                id="scroll-to-projects-btn">{{ __('button.projects') }}</button>
            <button
                class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]"
                id="scroll-to-contact-btn">{{ __('button.contact') }}</button>
        </div>

    </div>
</section>
