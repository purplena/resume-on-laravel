<x-layout>
    <div class="mt-navbarMargin">
        <section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mt-8 mb-4 md:mt-0">
                {{ $project->title }}
            </h1>

            <div class="flex flex-col gap-4">
                <div class="img-container">
                    <img id="mainGalleryImg" src="{{ asset('storage/' . $project->medias->first()->path) }}"
                        data-galleryImgId="{{ $project->medias->first()->id }}" />
                </div>
                <div class="product-small-img flex flex-row gap-4 justify-center">
                    <button class="prevBtn">PREV</button>
                    <div class="flex flex-row gap-4" style="width:50vw; overflow: hidden; scroll-behavior: smooth;">
                        @foreach ($project->medias as $media)
                            <img class="galleryImgs h-[92px] cursor-pointer block"
                                data-galleryImgId="{{ $media->id }}" src="{{ asset('storage/' . $media->path) }}" />
                        @endforeach
                    </div>
                    <button class="nextBtn">NEXT</button>
                </div>
            </div>

            <div>
                <h2 class="text-h2 mt-8 mb-4">Description</h2>
                <p>{{ $project->project_data['description'] }}</p>
            </div>
        </section>
    </div>
</x-layout>
