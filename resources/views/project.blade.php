<x-layout>
    <div class="mt-navbarMargin">
        <section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto" id="home">
            <h1 class="text-h1 mt-8 mb-4 md:mt-0">

                {{ $project->title }}

            </h1>
            <?php dd($project); ?>

            <div id="swiper2" class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($project->medias as $media)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $media) }}" />
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

                <!-- If we need navigation buttons -->
            </div>
        </section>
    </div>
</x-layout>
