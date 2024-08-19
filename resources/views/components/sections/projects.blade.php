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
            @if ($webProjects->count())
                <div class="swiper-container-main md:col-span-2 px-16">
                    <div class="h-[350px] relative">
                        <div class="swiper w-full h-full !pb-8" id="mySwiper">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < $webProjects->count(); $i++)
                                    <div
                                        class="swiper-slide relative rounded-3xl text-center !flex flex-col items-center justify-center bg-main-200 p-4">
                                        <div class="absolute">
                                            <x-svg-project :coordinates="$coordinates[$i]" />
                                        </div>
                                        <div class="z-10">
                                            <h3 class="text-[3rem]">
                                                {{ $webProjects[$i]->title }}
                                            </h3>
                                            <div class="flex flex-row items-center justify-center gap-4">
                                                <a href="{{ $webProjects[$i]->project_data['github'] }}"
                                                    class="block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">GitHub
                                                    Repo</a>
                                                <a href="{{ route('project', ['project' => $webProjects[$i]->id]) }}"
                                                    class="openModalBtn block w-full py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">See
                                                    More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="swiper-button-prev" id="page-swiper-button-prev" style="z-index: 0;"></div>
                        <div class="swiper-button-next" id="page-swiper-button-next" style="z-index: 0;"></div>
                    </div>
                </div>
            @else
                <div class="md:col-span-2 px-16">
                    <div class="h-[350px] flex justify-center items-center">
                        <h2 class="text-h2">{{ __('status.no.project') }}</h2>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
