<section class="px-4 py-12" id="projects">
    <div class="max-w-maxScreenWidth mx-auto">
        <h2 class="text-h3 mb-4">My projects</h2>


        <div class="flex flex-col gap-8 md:grid md:grid-cols-3 md:gap-4">
            {{-- Illustration --}}
            <div class="relative md:col-span-1 z-0">
                <div class="absolute h-full w-full -z-1">
                    @include('components/svg')
                </div>
                <img src={{ asset('/images/assets/illustration-no-bg.png') }} alt="vector-illustration"
                    class="object-contain mx-auto w-[200px] max-w-[400px] relative z-1">
            </div>

            {{-- Swiper --}}
            @if ($webProjects->count())
                <div class="swiper-container-main w-[100%] md:col-span-2 xs:px-16">
                    <div class="h-full w-full relative">
                        <div class="swiper w-full h-full !pb-8 mySwiperInit">
                            <div class="swiper-wrapper">
                                @for ($i = 0; $i < $webProjects->count(); $i++)
                                    <div
                                        class="swiper-from-main-page swiper-slide relative rounded-3xl text-center !flex flex-col items-center justify-center px-4 py-6">
                                        <div class="blob-div-projects absolute h-[99%]">
                                            <x-svg-project :coordinates="$coordinates[$i]" />
                                        </div>
                                        <div class="z-10 flex flex-col gap-2 items-center justify-center">
                                            <h3 class="text-h3 md:text-h2">
                                                {{ $webProjects[$i]->title }}
                                            </h3>
                                            <div class="project-hero-img">
                                                <img class="h-[75px] xs:h-[100px] block"
                                                    src="{{ asset('storage/' . $webProjects[$i]->medias->first()->path) }}"
                                                    alt="projects's image" />
                                            </div>
                                            <div
                                                class="flex flex-col md:flex-row items-center justify-center gap-2 md:gap-4">
                                                <a href="{{ $webProjects[$i]->project_data['github'] }}"
                                                    class="btn-transition-swiper block w-[130px] py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg">{{ __('project.repo') }}</a>
                                                <a href="{{ route('project', ['project' => $webProjects[$i]->id]) }}"
                                                    class="btn-transition-swiper block w-[130px] py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg">{{ __('project.see.more') }}
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
