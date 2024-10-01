<x-layout>
    <div class="mt-navbarMargin">
        <section class="pt-12 px-4 max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mb-4 md:mt-0">
                {{ $project->title }}
            </h1>
            {{-- Galery --}}
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @foreach ($project->medias as $media)
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center">
                                <img class="border border-main-500 max-h-[500px]"
                                    src="{{ asset('storage/' . $media->path) }}" />
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($project->medias->count() > 1)
                    <div class="mt-8">
                        <div class="swiper-pagination" id="swiper2-paginate"></div>
                    </div>
                    <div class="swiper-button-prev" id="swiper2-prev"></div>
                    <div class="swiper-button-next" id="swiper2-next"></div>
                @endif
            </div>
            <div class="hidden xxs:block">
                @if ($project->medias->count() > 1)
                    <div thumbSlider="" class="swiper mySwiper mt-4 w-[60vw] max-w-[700px]">
                        <div class="swiper-wrapper ">
                            @foreach ($project->medias as $media)
                                <div class="swiper-slide cursor-pointer">
                                    <div class="flex flex-row items-center justify-center">
                                        <img class="xxs:h-[30px] sm:h-[50px] md:h-[92px] object-cover"
                                            src="{{ asset('storage/' . $media->path) }}" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="opacity-screen flex flex-col gap-4 md:flex-row md:gap-6 md:justify-between">
                {{-- Description --}}
                <div>
                    <h2 class="text-h2 mt-4 xxs:mt-8 mb-4">{{ __('project.description') }}</h2>
                    <div class="flex flex-col text-justify md:max-w-[600px]">
                        {!! $project->project_data['description'] !!}
                    </div>
                </div>
                <div>
                    {{-- Languages --}}
                    <div>
                        <h2 class="text-h2 mt-8 mb-4">Languages</h2>
                        <div class="flex flex-row flex-wrap gap-2 lg:gap-4">
                            @foreach ($languages as $language)
                                {!! Blade::render($language->svg) !!}
                            @endforeach
                        </div>
                    </div>

                    {{-- Links --}}
                    <div>
                        <h2 class="text-h2 mt-8 mb-4">{{ __('project.check.work') }}</h2>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ $project->project_data['github'] }}"
                                class="btn-transition  block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl drop-shadow-lg xs:w-[130px]">{{ __('project.repo') }}</a>
                            @if (isset($project->project_data['link']))
                                <a href="{{ $project->project_data['link'] }}"
                                    class="btn-transition  block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl drop-shadow-lg xs:w-[130px]">{{ __('project.visit.me') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</x-layout>
