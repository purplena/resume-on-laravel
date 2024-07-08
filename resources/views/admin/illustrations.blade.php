<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-4">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-4">
            {{ __('admin.illustrations.h2.add') }}
        </h2>


        <x-sections.form.upload-image-form />

        {{-- <div class="table-container">
            <table>
                @foreach ($photos as $photo)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="">
                        </td>
                        <td>
                            {{ $photo->title }}
                        </td>

                        <td>
                            <form action="/admin/photos/{{ $photo->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div> --}}

        {{-- <div class="mb-10 mt-4">
            <form action="{{ route('illustrations.destroyAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete All</button>
            </form>
        </div> --}}

        <form action="{{ route('illustrations.destroySelected') }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="flex flex-row gap-6 mb-4">

                <input type="checkbox" name="selected_illustrations[]" id="selectAll"
                    class="h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">
                <button>Delete Selected</button>
            </div>

            <table class="w-full rounded-3xl drop-shadow-lg">
                {{-- <tbody> --}}
                @foreach ($illustrations as $illustration)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="text-center p-2 md:px-6 md:py-4">
                            <input id="selectAllIllustrations" name="selected_illustrations[]"
                                value="{{ $illustration->id }}" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-main-500 focus:ring-main-500">

                        </td>
                        <td class="p-2 md:px-6 md:py-4 text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $illustration->title }}

                        </td>
                        <td class="px-6 py-4 text-center">
                            <img class="w-full max-w-[200px] mx-auto"
                                src="{{ asset('storage/' . $illustration->path) }}" alt="">
                        </td>

                        <td>
                            <span
                                class="px-10 py-2 text-center bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg">
                                Edit</span>
                            <form action="{{ route('illustration.destroy', ['illustration' => $illustration->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                {{-- </tbody> --}}
            </table>
        </form>

        {{-- <div id="myModal" class="modal">
            <!-- Modal Content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Modal Content goes here...</p>
            </div>
        </div> --}}




    </section>
</x-layout>
