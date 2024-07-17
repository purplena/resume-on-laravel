<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-6">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-6">
            {{ $illustration ? __('admin.illustrations.h2.update') : __('admin.illustrations.h2.add') }}
        </h2>


        <x-sections.form.upload-image-form :illustration="$illustration" />

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h2 class="text-h3">{{ __('admin.illustrations.h2.table') }}</h2>
            <x-sections.form.search-illustration />
        </div>

        <form action="{{ route('illustrations.deleteSelected') }}" method="POST" class="mb-6">
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
                    @foreach ($illustrations as $illustration)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 md:py-4">
                                <input name="selected_illustrations[]" value="{{ $illustration->id }}" type="checkbox"
                                    class="selectedIllustrations h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">

                            </td>
                            <td class="p-2 md:px-6 md:py-4 text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $illustration->title }}

                            </td>
                            <td class="p-2 md:px-6 md:py-4 text-center">
                                <img class="w-full min-w-[100px] max-w-[200px] mx-auto"
                                    src="{{ asset('storage/' . $illustration->path) }}" alt="">
                            </td>
                            <td class="p-2 md:px-6 md:py-4 text-center">
                                <a class="cursor-pointer px-6 py-1 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg  hidden editIllustrationBtn"
                                    href="{{ route('illustrations', ['id' => $illustration->id]) }}">{{ __('form.illustrations.edit') }}</a>
                                <a data-action="edit" class="hidden editIconElement"
                                    href="{{ route('illustrations', ['id' => $illustration->id]) }}">
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
            {{ $illustrations->links() }}
        </div>


        <h2 class="text-h3 mb-6">{{ __('admin.illustrations.h2.delete.all') }}</h2>
        <form action="{{ route('illustrations.destroyAll') }}" method="POST">
            @csrf
            @method('DELETE')
            <button
                class="cursor-pointer px-6 py-1 text-center border border-red-800 text-red-800 uppercase rounded-3xl hover:border hover:border-red-800  hover:bg-red-800 hover:text-white drop-shadow-lg">{{ __('form.illustrations.delete.all') }}</button>
        </form>

        <x-sections.components.editIllustrationModal />

    </section>
</x-layout>
