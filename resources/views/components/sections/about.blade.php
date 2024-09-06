<section>
    <svg class="h-auto w-full" width="1550" height="125" viewBox="0 0 1550 125" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M0 35.0756V124.5H1549.5V1.07574C1549.5 1.07574 1471.5 46 1403 31.5757C1334.5 17.1515 1325.45 4.29681 1252 4.07558C1177.2 3.85028 1134.42 12.8656 1063 35.0756C991.578 57.2855 960.5 58.5 960.5 58.5C960.5 58.5 939 62.0757 866.5 31.5757C794 1.07574 736.5 1.07574 736.5 1.07574C702.5 -2.42429 633 1.07565 538.5 35.0756C538.5 35.0756 424.5 72.9245 350.5 80C276.5 87.0755 246.5 92.0755 168 87.0755C89.5 82.0755 0 35.0756 0 35.0756Z"
            fill="#E0DAE5" />
    </svg>
    <div class="bg-main-200 px-4 py-12 w-full -mt-[1px]">
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
                                class="text-main-700 font-bold">Où</span>, <span
                                class="text-main-700 font-bold">Quoi</span>,
                            <span class="text-main-700 font-bold">Comment</span> et <span
                                class="text-main-700 font-bold">Qui</span>
                        </p>
                    @endif
                </div>
            </div>
            <div class="bg-main-400 h-[1px] mb-4"></div>
            <div class="flex flex-col gap-2 md:grid md:grid-cols-3">
                <x-sections.components.about-section header="{{ __('about.education') }}"
                    icon="fa-solid fa-graduation-cap">
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

                <x-sections.components.about-section header="{{ __('about.work') }}" icon="fa-solid fa-briefcase">
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

                <x-sections.components.about-section header="{{ __('about.ITskills') }}" icon="fa-solid fa-code">
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
    </div>
</section>
