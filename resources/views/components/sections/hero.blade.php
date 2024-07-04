<section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto" id="home">
    <div class="flex flex-col items-center md:flex-row-reverse md:justify-between md:gap-10">
        <div class="relative">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -z-10">
                <div class="pulse simple h-[180px] w-[180px] bg-main-200 rounded-full"></div>
            </div>
            <img src="{{ url('/images/photo-bg-empty.png') }}" alt="image of Lena" class="w-[100%] max-w-heroImage" />
            <div
                class="w-full flex flex-row justify-center gap-4 absolute -bottom-2 left-1/2 transform -translate-x-1/2">
                <x-sections.components.social-icon-links href="https://github.com/purplena" icon="fa-github" />
                <x-sections.components.social-icon-links href="https://www.linkedin.com/in/elena-khramova-4a800b84/"
                    icon="fa-linkedin" />
            </div>
        </div>
        <div class="flex flex-row gap-4">
            <button
                class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end"
                id="scroll-to-projects-btn">{{ __('button.projects') }}</button>
            <button
                class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end"
                id="scroll-to-contact-btn">{{ __('button.contact') }}</button>
        </div>

    </div>
</section>
