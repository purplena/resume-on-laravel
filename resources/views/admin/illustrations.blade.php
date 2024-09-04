@php
    use App\Models\Project;

    $category = Project::CATEGORY_WEB;
@endphp

<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-6">
            {{ $projectCategory == $category ? __('admin.projects.h1') : __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-6">
            @if ($projectCategory == $category)
                {{ $projectData['project'] ? __('admin.projects.h2.update') : __('admin.projects.h2.add') }}
            @else
                {{ $projectData['project'] ? __('admin.illustrations.h2.update') : __('admin.illustrations.h2.add') }}
            @endif
        </h2>
        <x-sections.form.upload-image-form :illustration="$projectData['project']" :projectCategory="$projectCategory" :route="$route" />

        @if ($projectData['projects']->isEmpty())
            <h2 class="text-h2">{{ __('status.no.project') }}</h2>
        @else
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h2 class="text-h3">{{ __('admin.illustrations.h2.table') }}</h2>
                <x-sections.form.search-illustration route="admin.illustrations" />
            </div>

            <form
                action="{{ $projectCategory == $category ? route('projects.destroySelected') : route('illustrations.destroySelected') }}"
                method="POST" class="mb-6">
                @csrf
                @method('DELETE')

                <table class="w-full drop-shadow-lg" id="illustrationTable">
                    <div
                        class="bg-gray-50 flex flex-row gap-6 h-[40px] items-center border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600 drop-shadow-lg">
                        <input type="checkbox" id="selectAllIllustrationsCheckbox"
                            class="ml-4 h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">
                        <button id="deleteSelectedBtn"
                            class="hidden px-10 py-1 border border-red-800 text-red-800 uppercase rounded-3xl hover:border hover:border-red-800  hover:bg-red-800 hover:text-white drop-shadow-lg">{{ __('form.illustrations.delete') }}</button>
                    </div>

                    <tbody>

                        @foreach ($projectData['projects'] as $illustration)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4 md:py-4">
                                    <input name="selected_medias[]" value="{{ $illustration->id }}" type="checkbox"
                                        class="selectedIllustrations h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">

                                </td>
                                <td class="p-2 md:px-6 md:py-4 text-gray-900 dark:text-white text-center">
                                    {{ $illustration->title }}
                                </td>
                                <td class="p-2 md:px-6 md:py-4 text-center">
                                    <div class="flex flex-col lg:flex-row gap-2 justify-center mx-auto">
                                        @foreach ($illustration->medias as $media)
                                            <img class="object-contain w-[100%] max-w-[200px]"
                                                src="{{ asset('storage/' . $media->path) }}" alt="">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="p-2 md:px-6 md:py-4 text-center">
                                    <a class="cursor-pointer px-6 py-1 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg  hidden editIllustrationBtn"
                                        href="{{ $projectCategory == $category ? route('admin.projects', ['id' => $illustration->id]) : route('admin.illustrations', ['id' => $illustration->id]) }}">{{ __('form.illustrations.edit') }}</a>
                                    <a data-action="edit" class="hidden editIconElement"
                                        href="{{ $projectCategory == $category ? route('admin.projects', ['id' => $illustration->id]) : route('admin.illustrations', ['id' => $illustration->id]) }}">
                                        <i class="fa-solid fa-wand-magic-sparkles cursor-pointer hover:text-main-800 text-main-600"
                                            data-illustrationId={{ $illustration->id }}></i>
                                    </a>
                                </td>
                                <td class="p-2 md:px-6 md:py-4 text-center">
                                    <span data-action="delete" data-illustrationId={{ $illustration->id }}
                                        class="cursor-pointer px-6 py-1 text-center border border-red-800 text-red-800 uppercase rounded-3xl hover:border hover:border-red-800  hover:bg-red-800 hover:text-white drop-shadow-lg hidden deleteIllustrationBtn">
                                        {{ __('form.illustrations.delete') }}
                                    </span>
                                    <i data-action="delete" data-illustrationId={{ $illustration->id }}
                                        class="fa-solid fa-trash-can cursor-pointer hidden deleteIconElement text-red-600 hover:text-red-800 "></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
            <div class="flex flex-row justify-center mb-14">
                {{ $projectData['projects']->links() }}
            </div>


            <h2 class="text-h3 mb-6">{{ __('admin.illustrations.h2.delete.all') }}</h2>
            <form
                action="{{ $projectCategory == $category ? route('projects.destroyAll') : route('illustrations.destroyAll') }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="cursor-pointer px-6 py-1 text-center border border-red-800 text-red-800 uppercase rounded-3xl hover:border hover:border-red-800  hover:bg-red-800 hover:text-white drop-shadow-lg">{{ __('form.illustrations.delete.all') }}</button>
            </form>
        @endif
    </section>
</x-layout>
