<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-4">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3">
            {{ __('admin.illustrations.h2.add') }}
        </h2>

        <form method="POST" class="mt-4 relative" action="{{ route('illustrations.store') }}" id="addIllustrationForm"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2">
                <x-sections.form.label-input inputName="title" type="text" />

                <div class="col-span-full">
                    <label for="path" class="block text-sm font-medium leading-6 text-gray-900">Cover
                        photo</label>
                    <div id="dragAndDropArea"
                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                        <div class="text-center">
                            <img id="previewImage" src="" class="hidden" alt="Preview Image">
                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" id="dragAndDropSvg"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                <label for="path"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="path" name="path" type="file" class="sr-only"
                                        accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end">{{ __('button.send') }}</button>
            </div>
        </form>

        <div class="table-container">
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
        </div>




    </section>
</x-layout>
