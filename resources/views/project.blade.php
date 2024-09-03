<x-layout>
    <div class="mt-navbarMargin">
        <section class="pt-12 px-4 max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mt-12 mb-4 md:mt-0">
                {{ $project->title }}
            </h1>
            {{-- Galery --}}
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @foreach ($project->medias as $media)
                        <div class="swiper-slide">
                            <div class="flex items-center justify-center">
                                <img class="max-h-[500px]" src="{{ asset('storage/' . $media->path) }}" />
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
            @if ($project->medias->count() > 1)
                <div thumbSlider="" class="swiper mySwiper mt-4 w-[60vw] max-w-[700px]">
                    <div class="swiper-wrapper ">
                        @foreach ($project->medias as $media)
                            <div class="swiper-slide cursor-pointer">
                                <div class="flex flex-row items-center justify-center">
                                    <img class="h-[30px] sm:h-[50px] md:h-[92px]"
                                        src="{{ asset('storage/' . $media->path) }}" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            {{-- Description --}}
            <div>
                <h2 class="text-h2 mt-12 mb-4">Description</h2>
                <div class="flex flex-col md:flex-row md:justify-between gap-4">
                    <p class="max-w-[580px]">{{ $project->project_data['description'] }}</p>
                </div>
            </div>
            {{-- Links --}}
            <div>
                <h2 class="text-h2 mt-12 mb-4">Check Out My Work</h2>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ $project->project_data['github'] }}"
                        class="block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">{{ __('project.repo') }}</a>
                    @if (isset($project->project_data['link']))
                        <a href="{{ $project->project_data['link'] }}"
                            class="block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">{{ __('project.visit.me') }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    </div>
</x-layout>
