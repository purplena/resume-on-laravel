<x-layout>
    <section class="mt-navbarMargin pt-12 px-4">
        <div class="max-w-maxScreenWidth mx-auto">
            <h1 class="text-h1 mb-6">Gallery</h1>
            <x-sections.form.search-illustration route="gallery" />
            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                    <div class="flex flex-col gap-2 items-center">
                        <img class="w-full min-w-[100px] max-w-[400px] mx-auto"
                            src="{{ asset('storage/' . $project->medias->first()->path) }}"
                            alt="art project: {{ $project->title }}">
                        <div class="flex flex-col items-center">
                            <p>{{ $project->title }}</p>
                            <p class="text-gray-500 text-xs">
                                {{ $project->createdAtMonth() }} {{ $project->createdAtYear() }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex flex-row justify-center mt-6 mb-6">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
</x-layout>
