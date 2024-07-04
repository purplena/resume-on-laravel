<section class="bg-main-200 rounded-3xl px-4 py-12">
    <div class="max-w-maxScreenWidth mx-auto">
        <div class="flex flex-row justify-between mb-4">
            <h2 class="text-h3">{{ __('about') }}</h2>
            <div class="text-right">
                @if (App::isLocale('en'))
                    <p><span class="text-main-700 font-bold">Curiosity</span> is my tool</p>
                    <p><span class="text-main-700 font-bold">New knowledge</span> is my passion</p>
                @elseif (App::isLocale('fr'))
                    <p>J'ai toujours près de moi mes cinq fidèles amis</p>
                    <p>C'est à eux que je dois tout ce que j'ai appris</p>
                    <p>Leurs
                        noms sont <span class="text-main-700 font-bold">Quand</span>, <span
                            class="text-main-700 font-bold">Où</span>, <span class="text-main-700 font-bold">Quoi</span>,
                        <span class="text-main-700 font-bold">Comment</span> et <span
                            class="text-main-700 font-bold">Qui</span>
                    </p>
                @endif
            </div>
        </div>
        <div class="bg-main-400 h-[1px] mb-4"></div>
        <div class="flex flex-col gap-2 md:grid md:grid-cols-3">
            <x-sections.components.about-section header="{{ __('about.education') }}"
                icon="fa-solid fa-graduation-cap about-section-icon">
                <div>
                    <p class="text-center leading-5"><span
                            class="font-bold text-[16px]">{{ __('about.degree.1') }}</span></p>
                    <p class="text-center leading-5">{{ __('about.education.university.1') }}</p>
                    <p class="text-center leading-5">{{ __('about.graduation.year') }}: 2015</p>
                    <p class="text-center leading-5">{{ __('about.location.1') }}</p>
                </div>

                <div>
                    <p class="text-center leading-5"><span
                            class="font-bold text-[16px]">{{ __('about.degree.1') }}</span></p>
                    <p class="text-center leading-5">{{ __('about.education.university.1') }}</p>
                    <p class="text-center leading-5">{{ __('about.graduation.year') }}: 2015</p>
                    <p class="text-center leading-5">{{ __('about.location.2') }}</p>
                </div>

            </x-sections.components.about-section>

            <x-sections.components.about-section header="{{ __('about.work') }}"
                icon="fa-solid fa-briefcase about-section-icon">
                <div>
                    <p class="text-center font-bold text-[16px] leading-5">Sales Capability, PepsiCo</p>
                    <p class="text-center leading-5">{{ __('about.work.pepsi.1') }}</p>
                    <p class="text-center leading-5">{{ __('about.work.pepsi.2') }}</p>
                    <p class="text-center leading-5">{{ __('about.work.pepsi.3') }}</p>
                    <p class="text-center leading-5">2013-2019</p>
                </div>

                <div>
                    <p class="text-center font-bold text-[16px] leading-5">{{ __('about.work.web.1') }}</p>
                    <p class="text-center leading-5">{{ __('about.work.web.2') }}</p>
                    <p class="text-center leading-5">2023++</p>
                </div>
            </x-sections.components.about-section>

            <x-sections.components.about-section header="{{ __('about.ITskills') }}"
                icon="fa-solid fa-code about-section-icon">
                <div class="flex flex-col items-center">
                    <p class="font-bold text-[16px] leading-5">
                        Full-Stack
                    </p>
                    <p class="leading-5">HTML/CSS/SASS</p>
                    <p class="leading-5">Bootstrap/Tailwind/MUI</p>
                    <p class="leading-5">Javascript</p>
                    <p class="leading-5">React.js</p>
                    <p class="leading-5">PHP & OOP</p>
                    <p class="leading-5">Laravel</p>
                    <p class="leading-5">Symfony</p>
                    <p class="leading-5">MySQL</p>
                    <p class="leading-5">Github & Git Version Control</p>
                    <p class="leading-5">Figma</p>
                </div>
            </x-sections.components.about-section>
        </div>
    </div>
</section>
