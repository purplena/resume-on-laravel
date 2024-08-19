<x-layout>
    <div class="mt-navbarMargin">
        <section class="mb-12 pt-12 px-4 max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mt-8 mb-4 md:mt-0">
                {{ $project->title }}
            </h1>
            <div class="product">
                <div class="product-small-img">
                    @foreach ($project->medias as $media)
                        <img class="galleryImgs" data-galleryImgId="{{ $media->id }}"
                            src="{{ asset('storage/' . $media->path) }}" />
                    @endforeach
                </div>
                <div class="img-container">
                    <img id="mainGalleryImg" src="{{ asset('storage/' . $project->medias->first()->path) }}" />
                </div>
            </div>
        </section>
    </div>
</x-layout>
