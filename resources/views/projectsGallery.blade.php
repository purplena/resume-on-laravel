@php
    use App\Models\Project;
    $projectCategoryWeb = Project::CATEGORY_WEB;
@endphp

<x-layout>
    <section class="mt-navbarMargin pt-12 ">
        <div>
            <div class="mx-auto max-w-maxScreenWidth px-4">
                <h1 class="text-h1 mb-6">{{ $category == $projectCategoryWeb ? __('nav.projects') : __('nav.gallery') }}
                </h1>
                <x-sections.form.search-illustration
                    route="{{ $category == $projectCategoryWeb ? 'projects' : 'gallery' }}" />
            </div>
            <x-svg.top-wave fill='#efecf2' />
            <div class="bg-main-100 px-4 pt-4 w-full -mt-[5px] -mb-[1px]">
                <div class="max-w-maxScreenWidth mx-auto  grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($projects as $project)
                        @php
                            $projectCategory = $project->category;
                        @endphp
                        <div class="flex flex-col gap-2 items-center">
                            <div class="{{ $projectCategory == 1 ? 'relative' : '' }}">
                                @if ($projectCategory == 1)
                                    <a data-projectId={{ $project->id }}
                                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-20 block w-[130px] py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg text-center project-btn"
                                        href="{{ route('project', ['project' => $project->id]) }}">{{ __('button.see.more') }}</a>
                                @endif
                                <img class="w-[100%] min-w-[100px] max-w-[400px] gallery-img"
                                    src="{{ asset('storage/' . $project->medias->first()->path) }}"
                                    alt="art project: {{ $project->title }}">
                            </div>
                            <div class="flex flex-col items-center">
                                <p id="project-id-{{ $project->id }}" class="project-title">{{ $project->title }}</p>
                                <p class="text-gray-500 text-xs">
                                    {{ $project->createdAtMonth() }} {{ $project->createdAtYear() }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-row justify-center mt-6">
                    {{ $projects->links() }}
                </div>
            </div>
            <x-svg.bottom-wave fill='#efecf2' />
        </div>

    </section>
</x-layout>
