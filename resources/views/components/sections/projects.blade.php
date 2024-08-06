<section class="px-4 py-12" id="projects">
    <div class="max-w-maxScreenWidth mx-auto">
        <h2 class="text-h3 mb-4">My projects</h2>


        <div class="flex flex-col gap-8 md:grid md:grid-cols-3 md:gap-4">
            {{-- Illustration --}}
            <div class="relative md:col-span-1">
                <div class="absolute h-full w-full -z-50">
                    @include('components/svg')
                </div>
                <img src={{ asset('/images/assets/illustration-no-bg.png') }} alt="vector-illustration"
                    class="object-contain mx-auto w-[200px] max-w-[400px]">
            </div>

            {{-- Swiper --}}
            <div class="swiper-container-main md:col-span-2 px-16">
                <div class="h-[350px] relative">
                    <div class="swiper mySwiper w-full h-full !pb-8">
                        <div class="swiper-wrapper">
                            @for ($i = 0; $i < $webProjects->count(); $i++)
                                <div
                                    class="swiper-slide relative rounded-3xl text-center !flex flex-col items-center justify-center bg-main-200 ">
                                    <div class="absolute">
                                        <x-svg-project :coordinates="$coordinates[$i]" />
                                    </div>
                                    <div class="z-10">
                                        <h3 class="text-[3rem]">
                                            {{ $webProjects[$i]->title }}
                                        </h3>
                                        <div class="flex flex-row items-center justify-center gap-4">
                                            <a href="{{ $webProjects[$i]->project_data['github'] }}"
                                                class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]">GitHub
                                                Repo</a>
                                            <a href=""
                                                class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[170px]">See
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-button-prev" style="z-index: 0;"></div>
                    <div class="swiper-button-next" style="z-index: 0;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
