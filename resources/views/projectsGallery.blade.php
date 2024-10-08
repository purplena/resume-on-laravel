@php
    use App\Models\Project;
    use App\Models\Genre;

    $projectCategoryWeb = Project::CATEGORY_WEB;

    $urlPath = request()->path();
    $segments = explode('/', $urlPath);
    $genreInUrl = end($segments);
@endphp

<x-layout>
    <section class="mt-navbarMargin pt-12 ">
        <div>
            <div class="mx-auto max-w-maxScreenWidth px-4">
                <h1 class="text-h1 mb-6">{{ $category == $projectCategoryWeb ? __('nav.projects') : __('nav.gallery') }}
                </h1>
                @if ($category == $projectCategoryWeb)
                    <x-sections.form.search-illustration
                        route="{{ $category == $projectCategoryWeb ? 'projects' : 'gallery' }}" />
                @else
                    <p class="mb-4">{{ __('gallery.p1') }}</p>
                    <div class="flex flex-row gap-2 flex-wrap">
                        <a class="px-4 py-1 border-[1px] rounded-2xl border-main-600 hover:bg-main-600 hover:text-white {{ $genreInUrl == 'illustrations' ? 'genre-active' : '' }}"
                            href="{{ route('gallery') }}">#{{ __('all') }}</a>
                        @foreach ($genres as $genre)
                            <a class="px-4 py-1 border-[1px] rounded-2xl border-main-600 hover:bg-main-600 hover:text-white {{ $genreInUrl == $genre['name'] ? 'genre-active' : '' }}"
                                href="{{ route('filter.illustrations', ['genre' => $genre['name']]) }}">#{{ $genre['name'] }}</a>
                        @endforeach
                    </div>
                @endif

            </div>
            <x-svg.top-wave fill='#efecf2' />
            <div class="bg-main-200 px-4 pt-4 w-full -mt-[5px] -mb-[1px]">
                <div
                    class="illustrationSection max-w-maxScreenWidth mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @if ($projects->count())
                        @foreach ($projects as $project)
                            @php
                                $projectCategory = $project->category;
                            @endphp
                            <div data-project-id={{ $project->id }} class="flex flex-col gap-2 items-center">
                                <div class="{{ $projectCategory == 1 ? 'relative' : '' }}">
                                    @if ($projectCategory == 1)
                                        <a data-projectId={{ $project->id }}
                                            class="btn-transition absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 block w-[130px] py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg text-center project-btn"
                                            href="{{ route('project', ['project' => $project->id]) }}">{{ __('button.see.more') }}</a>
                                    @endif
                                    <img class="w-[100%] min-w-[100px] max-w-[400px] gallery-img"
                                        src="{{ asset('storage/' . $project->medias->first()->path) }}"
                                        alt="art project: {{ $project->title }}">
                                </div>
                                <div class="flex flex-col items-center">
                                    <p id="project-id-{{ $project->id }}" class="project-title title-transform">
                                        {{ $project->title }}</p>
                                    <p class="text-gray-500 text-xs">
                                        {{ $project->createdAtMonth() }} {{ $project->createdAtYear() }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-full" style="height: 30vh;">
                            <h2 class="text-h2">{{ __('section.empty') }}</h2>
                        </div>
                    @endif
                </div>
                <div class="links-element flex flex-row justify-center mt-6">
                    {{ $projects->links() }}
                </div>
            </div>
            <x-svg.bottom-wave fill='#efecf2' />
        </div>

    </section>
</x-layout>
