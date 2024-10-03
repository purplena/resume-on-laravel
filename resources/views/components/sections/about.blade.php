<section class="relative z-0">
    <x-svg.shadow-wave-1 />
    <x-svg.top-wave />
    <div class="bg-main-200 px-4 py-12 w-full -mt-[5px] -mb-[1px]">
        <div class="max-w-maxScreenWidth mx-auto">
            <div class="flex flex-col md:flex-row gap-6 xs:gap-4 md:justify-around education-div">
                {{-- Col 1 --}}
                <div>
                    {{-- Education --}}
                    <div class="mb-6">
                        <h2 class="text-left text-h3 mb-4">{{ __('about.education') }}</h2>
                        <div class="flex flex-col gap-4 justify-center items-center max-w-[350px] mx-auto">
                            {{-- Education 1 --}}
                            <div class="relative">
                                <img src="{{ asset('/images/assets/arrow.png') }}"
                                    class="hidden sm:block sm:absolute sm:-top-7 sm:-left-[100px] sm:z-20 h-[150px] md:h-[120px] md:-left-[45px] md:-top-[9px] lg:h-[150px] lg:-left-[90px] "
                                    alt="">
                                <div class="min-w-[200px] max-w-[290px]">
                                    <div class="flex flex-col justify-center items-center p-2" style="z-index: 10;">
                                        <p class="text-center leading-5"><span
                                                class="font-bold text-[16px]">{{ __('about.degree.1') }}</span></p>
                                        <img class="h-[37px]" src="{{ asset('/images/assets/hat-transparent.png') }}"
                                            alt="">
                                        <p class="text-center leading-5 w-[200px]">
                                            {{ __('about.education.university.1') }}</p>
                                        <p class="text-center leading-5">{{ __('about.graduation.year') }}: <span
                                                class="font-bold">2015</span></p>
                                        <p class="text-center leading-5">{{ __('about.location.1') }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- Education 2 --}}
                            <div class="relative">
                                <img src="{{ asset('/images/assets/arrow.png') }}"
                                    class="hidden sm:block sm:absolute sm:-top-10 sm:-right-20 sm:z-20 h-[150px] md:h-[120px] md:-right-10 md:-top-[55px] lg:h-[150px] lg:-right-20 scale-x-[-1]"
                                    alt="">
                                <div class="min-w-[200px] max-w-[290px]">
                                    <div class="flex flex-col justify-center items-center p-4" style="z-index: 10;">
                                        <p class="text-center leading-5"><span
                                                class="font-bold text-[16px]">{{ __('about.degree.2') }}</span></p>
                                        <img class="h-[38px]" src="{{ asset('/images/assets/rouleau.png') }}"
                                            alt="">
                                        <p class="text-center leading-5">{{ __('about.education.university.2') }}</p>
                                        <p class="text-center leading-5">{{ __('about.graduation.year') }}: <span
                                                class="font-bold">2024</span></p>
                                        <p class="text-center leading-5">{{ __('about.location.2') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Technologies --}}
                    <div class="relative">
                        <h2 class="text-h3 text-left mb-4 typing-demo">Technologies</h2>
                        <div>
                            <div class="flex flex-row mb-4 xs:mb-0 gap-4 justify-center mx-auto max-w-[190px]">
                                <img class="hidden xs:block xs:h-[55px] xs:scale-x-[-1]"
                                    src="{{ asset('/images/assets/arrow-tech.png') }}" alt="computer-illustration">
                                <img class="w-[83px] h-[48px] mx-auto"
                                    src="{{ asset('/images/assets/_computer.png') }}" alt="computer-illustration">
                                <img class="hidden xs:block xs:h-[55px]"
                                    src="{{ asset('/images/assets/arrow-tech.png') }}" alt="computer-illustration">
                            </div>
                            <div
                                class="flex flex-col xs:flex-row justify-center items-center xs:items-start gap-6 xs:gap-0 max-w-[350px] mx-auto">
                                <div>
                                    <h3 class="text-h5 text-center mb-2">Front-End</h3>
                                    <div class="flex flex-col gap-1 w-[200px] flex-wrap">
                                        <div class="flex flex-row gap-4 justify-center ">
                                            <div class="tech-icon">
                                                <x-svg.figma />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.html />
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-4 justify-center">
                                            <div class="tech-icon">
                                                <x-svg.javascript />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.react />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.typescript />
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-4 justify-center">
                                            <div class="tech-icon">
                                                <x-svg.tailwind />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.css />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-h5 text-center mb-2">Back-End</h3>
                                    <div class="flex flex-col gap-1 w-[200px]">
                                        <div class="flex flex-row gap-4 justify-center">
                                            <div class="tech-icon">
                                                <x-svg.php />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.laravel />
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-4 justify-center">
                                            <div class="tech-icon">
                                                <x-svg.symfony />
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-4 justify-center">
                                            <div class="tech-icon">
                                                <x-svg.docker />
                                            </div>
                                            <div class="tech-icon">
                                                <x-svg.github />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Col 2 //Carrier --}}
                <div>
                    <h2 class="text-h3 mb-4 text-left relative z-30">{{ __('about.work') }}</h2>
                    <div class="flex flex-col justify-center items-center gap-4 xxs:gap-0">
                        <div class="relative">
                            <img src="{{ asset('/images/assets/arrow.png') }}"
                                class="hidden sm:block sm:absolute sm:-top-5 sm:-left-10 sm:z-20 sm:h-full sm:max-h-[150px] md:max-h-[120px] md:-left-4 md:-top-[20px] md:rotate-0 lg:max-h-[150px]"
                                alt="">
                            <div class="work-div relative min-w-[150px] md:w-[350px] lg:w-[420px] parallax-container">
                                <div class="static bg-egg rounded-xl xxs:bg-transparent xxs:absolute xxs:top-0 xxs:bottom-0 xxs:left-0 xxs:right-0 m-auto flex flex-col justify-center items-center p-4"
                                    style="z-index: 10;">
                                    <p class="text-center font-bold text-[16px] leading-5">Sales Capability, PepsiCo
                                    </p>
                                    <p class="text-center leading-5">{{ __('about.work.pepsi.1') }}</p>
                                    <p class="text-center leading-5">{{ __('about.work.pepsi.2') }}</p>
                                    <p class="text-center leading-5">{{ __('about.work.pepsi.3') }}</p>
                                    <p class="text-center leading-5">2013-2019</p>
                                </div>
                                <div class="hidden xxs:block xxs:relative">
                                    <img src="{{ asset('/images/assets/blob-shadow-reversed.png') }}"
                                        class="hidden xs:block w-full max-w-[420px] absolute" style="z-index: 0;"
                                        id="shadow3">
                                    <img src="{{ asset('/images/assets/blob.png') }}"
                                        class="scale-x-[-1] relative w-full max-w-[420px]" style="z-index: 1;">
                                </div>
                            </div>
                        </div>


                        <div class="relative">
                            <img src="{{ asset('/images/assets/arrow.png') }}"
                                class="hidden sm:block sm:absolute sm:-top-5 sm:-right-10 sm:z-20 sm:h-full sm:max-h-[150px] sm:scale-x-[-1] md:max-h-[120px] md:-right-0 md:-top-[50px] lg:max-h-[150px]"
                                alt="">
                            <div class="work-div relative min-w-[150px] md:w-[350px] lg:w-[420px]">
                                <div class="static bg-egg rounded-xl xxs:bg-transparent xxs:absolute xxs:top-0 xxs:bottom-0 xxs:left-0 xxs:right-0 m-auto flex flex-col justify-center items-center p-4"
                                    style="z-index: 10;">
                                    <p class="text-center font-bold text-[16px] leading-5">
                                        {{ __('about.work.web.1') }}</p>
                                    <p class="text-center leading-5">{{ __('about.work.web.2') }}</p>
                                    <p class="text-center leading-5">2024++</p>
                                </div>
                                <div class="hidden xxs:block xxs:relative">
                                    <img src="{{ asset('/images/assets/blob-shadow.png') }}"
                                        class="hidden xs:block w-full max-w-[420px] absolute" style="z-index: 0;"
                                        id="shadow1">
                                    <img src="{{ asset('/images/assets/blob.png') }}"
                                        class="relative w-full max-w-[420px]" style="z-index: 0;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-svg.bottom-wave />
</section>
