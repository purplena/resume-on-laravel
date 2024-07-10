<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-6">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-6">
            {{ __('admin.illustrations.h2.add') }}
        </h2>
        <x-sections.form.upload-image-form />

        <div class="flex flex-row items-center justify-between mb-6">
            <h2 class="text-h3">{{ __('admin.illustrations.h2.table') }}</h2>

            <form action="{{ route('illustrations.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="cursor-pointer px-6 py-1 text-center border border-main-800 text-main-800 uppercase rounded-3xl hover:border hover:border-main-800  hover:bg-main-800 hover:text-white drop-shadow-lg">Delete
                    All</button>
            </form>

            <div class="flex flex-row items-center gap-2">
                <form action="{{ route('illustrations') }}" method="GET">
                    @csrf
                    <input type="hidden" name="title" value="{{ request('title') }}">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                        class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]">
                </form>
                <a class="cursor-pointer px-6 py-1 text-center border border-main-800 text-main-800 uppercase rounded-3xl hover:border hover:border-main-800  hover:bg-main-800 hover:text-white drop-shadow-lg"
                    href="{{ route('illustrations') }}">Clear</a>
            </div>
        </div>

        <form action="{{ route('illustrations.deleteSelected') }}" method="POST" class="mb-6">
            @csrf
            @method('DELETE')

            <div class="flex flex-row gap-6 mb-4 h-[34px] items-center">
                <input type="checkbox" id="selectAllIllustrationsCheckbox"
                    class="h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">
                <button id="deleteSelectedBtn"
                    class="hidden px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-center">{{ __('form.checkbox.illustrations.delete') }}</button>
            </div>

            <table class="w-full rounded-3xl drop-shadow-lg" id="illustrationTable">
                <tbody>
                    @foreach ($illustrations as $illustration)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="text-center p-2 md:px-6 md:py-4">
                                <input name="selected_illustrations[]" value="{{ $illustration->id }}" type="checkbox"
                                    class="selectedIllustrations h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">

                            </td>
                            <td class="p-2 md:px-6 md:py-4 text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $illustration->title }}

                            </td>
                            <td class="p-2 md:px-6 md:py-4text-center">
                                <img class="w-full min-w-[100px] max-w-[200px] mx-auto"
                                    src="{{ asset('storage/' . $illustration->path) }}" alt="">
                            </td>
                            <td class="p-2 md:px-6 md:py-4">
                                <div class="flex flex-col gap-2">
                                    <span
                                        class="cursor-pointer px-6 py-2 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg hidden editIllustrationBtn">
                                        Edit</span>
                                    <i class="fa-solid fa-wand-magic-sparkles hidden editIconElement"></i>
                                    <span data-action="delete" data-illustrationId={{ $illustration->id }}
                                        class="cursor-pointer px-6 py-2 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg hidden deleteIllustrationBtn">
                                        Delete
                                    </span>
                                    <i data-action="delete" data-illustrationId={{ $illustration->id }}
                                        class="fa-solid fa-trash-can hidden deleteIconElement"></i>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <div class="flex flex-row justify-center">
            {{ $illustrations->links() }}
        </div>
    </section>
</x-layout>
