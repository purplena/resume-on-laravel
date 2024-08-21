@php
    $mediaCount = $project->medias->count();
    $widthClass = $mediaCount <= 3 ? 'w-[20vw]' : 'w-[40vw]';
@endphp

<x-layout>
    <div class="mt-navbarMargin">
        <section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mt-12 mb-4 md:mt-0">
                {{ $project->title }}
            </h1>
            {{-- Galery --}}
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    @foreach ($project->medias as $media)
                        <div class="swiper-slide">
                            <img class="h-[250px]cursor-pointer block" src="{{ asset('storage/' . $media->path) }}" />
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            @if ($project->medias->count() > 1)
                <div thumbSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($project->medias as $media)
                            <div class="swiper-slide">
                                <img class="h-[50px] md:h-[92px] cursor-pointer block"
                                    src="{{ asset('storage/' . $media->path) }}" />
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
                    <div class="flex flex-col gap-4">
                        <a href="{{ $project->project_data['github'] }}"
                            class="block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">{{ __('project.repo') }}</a>
                        @if (isset($project->project_data['link']))
                            <a href="{{ $project->project_data['link'] }}"
                                class="block w-full py-2 bg-main-500 text-center text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg xs:w-[130px]">{{ __('project.visit.me') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layout>
