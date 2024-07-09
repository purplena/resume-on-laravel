<form method="POST" class="bg-egg drop-shadow-sm hover:drop-shadow-lg px-8 py-6 rounded-3xl mb-6"
    action="{{ route('illustration.store') }}" id="addIllustrationForm" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col gap-2">
        <div class="sm:col-span-4">
            <label for="title"
                class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.title') }}</label>
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="mt-2">
                <input type="text" name="title" id="title"
                    class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 placeholder:text-gray-400 placeholder:text-[14px] focus:ring-gray-300"
                    placeholder="{{ __('form.input.title') }}" value="{{ old('title') }}">
            </div>
        </div>

        <div class="col-span-full">
            <label for="path"
                class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.illustration') }}</label>
            @error('path')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div id="dragAndDropArea"
                class="mt-2 flex justify-center rounded-lg bg-white border-gray-900/25 px-6 py-10 ring-1  ring-gray-300">
                <div class="text-center">
                    <img id="previewImage" src="" class="hidden w-full max-w-[500px]" alt="Preview Image">
                    <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" id="dragAndDropSvg"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex flex-col justify-center text-sm leading-6 text-gray-600 ">
                        <label for="path"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-main-500 focus-within:outline-none focus-within:ring-main-600 focus-within:ring-offset-2 hover:text-main-700">
                            <span>{{ __('form.label.illustration.upload') }}</span>
                            <input id="path" name="path" type="file" class="sr-only" accept="image/*">
                        </label>
                        <p class="pl-1">{{ __('form.label.illustration.drag') }}</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">{{ __('form.label.illustration.formats') }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="flex justify-end mt-4">
        <button type="submit"
            class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-center">{{ __('button.send') }}</button>
    </div>
</form>
