<div id="myModal" class="modal">
    <div class="modal-content flex flex-col gap-2">
        <span id="closBtn" class="text-right">&times;</span>
        <form method="POST" class="bg-egg drop-shadow-sm hover:drop-shadow-lg px-8 py-6 rounded-3xl mb-14"
            id="editIllustrationForm" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2">
                <div class="sm:col-span-4">
                    <label for="titleEdit"
                        class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.title') }}</label>
                    @error('title')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="mt-2">
                        <input type="text" name="titleEdit" id="titleEdit"
                            class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 placeholder:text-gray-400 placeholder:text-[14px] focus:ring-gray-300"
                            placeholder="{{ __('form.input.title') }}">
                        <input type="hidden" name="title" id="titleEditHidden">
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="path"
                        class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.illustration') }}</label>
                    @error('path')
                        <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <div id="dragAndDropAreaEdit"
                        class="mt-2 flex justify-center rounded-lg bg-white border-gray-900/25 px-6 py-10 ring-1  ring-gray-300">
                        <div class="text-center">
                            <img id="previewImageEdit" src="" class="w-full max-w-[200px]" alt="Preview Image">

                            <div class="mt-4 flex flex-col justify-center text-sm leading-6 text-gray-600 ">
                                <label for="pathEdit"
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-main-500 focus-within:outline-none focus-within:ring-main-600 focus-within:ring-offset-2 hover:text-main-700">
                                    <span>{{ __('form.label.illustration.upload') }}</span>
                                    <input id="pathEdit" name="pathEdit" type="file" class="sr-only"
                                        accept="image/*">
                                </label>
                                <p class="pl-1">{{ __('form.label.illustration.drag') }}</p>
                            </div>
                            <p class="text-xs leading-5 text-gray-600">
                                {{ __('form.label.illustration.formats') }}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-center">{{ __('button.send') }}</button>
            </div>
        </form>
    </div>
</div>
