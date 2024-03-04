@props(['photos'])

<x-page-layout>
    <!-- Watercolor gallery ----Section 3 -->
    <section class="section-3" id="artworks">
        <h2>my art works</h2>

        <div class="section-3-container">
            @foreach ($photos as $photo)
                <article class="article-watercolor">
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->title }}">
                </article>
            @endforeach
        </div>

    </section>
</x-page-layout>
