<section class="px-4 py-12" id="projects">
    <div class="max-w-maxScreenWidth mx-auto">
        <h2 class="text-h3 mb-4">My projects</h2>
        <div class="flex flex-col gap-8 md:grid md:grid-cols-3 md:gap-4">
            {{-- Illustration --}}
            <div class="relative md:col-span-1">
                <div class="absolute h-full w-full -z-50">
                    @include('components/svg')
                </div>
                <img 
                    src={{ url('/images/illustration-no-bg.png') }} 
                    alt="vector-illustration"
                    class="object-contain mx-auto w-[200px] max-w-[400px]"
                >
            </div>
    
            {{-- Swiper --}}
            <div class="swiper-container-main md:col-span-2">
                <div class="swiper-container-secondary">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide slide_1 bg-main-400 ">Slide 1</div>
                            <div class="swiper-slide slide_2 bg-egg ">Slide 2</div>
                            <div class="swiper-slide slide_3 bg-main-300 ">Slide 3</div>
                            <div class="swiper-slide slide_4 bg-pink-active">Slide 4</div>
                            <div class="swiper-slide slide_5 bg-pink-pastel ">Slide 5</div>
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
