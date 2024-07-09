<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-6">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-6">
            {{ __('admin.illustrations.h2.add') }}
        </h2>
        <x-sections.form.upload-image-form />

        <div class="flex flex-row items-center gap-6 mb-6">
            <h2 class="text-h3">{{ __('admin.illustrations.h2.table') }}</h2>

            <form action="{{ route('illustrations.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="cursor-pointer px-6 py-1 text-center border border-main-800 text-main-800 uppercase rounded-3xl hover:border hover:border-main-800  hover:bg-main-800 hover:text-white drop-shadow-lg">Delete
                    All</button>
            </form>
        </div>

        <form action="{{ route('illustrations.deleteSelected') }}" method="POST">
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
                                <img class="w-full max-w-[200px] mx-auto"
                                    src="{{ asset('storage/' . $illustration->path) }}" alt="">
                            </td>
                            <td class="p-2 md:px-6 md:py-4">
                                <div class="flex flex-col gap-2">
                                    <span
                                        class="cursor-pointer px-6 py-2 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg">
                                        Edit</span>
                                    <span data-action="delete" data-illustrationId={{ $illustration->id }}
                                        class="cursor-pointer px-6 py-2 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg">
                                        Delete
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </section>
</x-layout>
