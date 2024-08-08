@php
    use App\Models\Project;

    $category = Project::CATEGORY_WEB;
@endphp

<form method='POST' class="bg-egg drop-shadow-sm hover:drop-shadow-lg px-8 py-6 rounded-3xl mb-14"
    action="{{ $illustration ? route($route . '.update', ['project' => $illustration->id]) : route($route . '.store') }}"
    id="addIllustrationForm" enctype="multipart/form-data">
    @csrf
    @if ($illustration)
        @method('PATCH')
    @endif
    <input type="hidden" name="projectCategory" id="projectCategory" value="{{ $projectCategory }}">
    <div class="flex flex-col gap-2">
        <div class="sm:col-span-4">
            <label for="title"
                class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.title') }}</label>
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="mt-2">
                <input type="text" name="title" id="title"
                    class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 ring-inset placeholder:text-gray-400 placeholder:text-[14px] focus:ring-gray-300"
                    placeholder="{{ __('form.input.title') }}" value="{{ old('title', $illustration->title ?? '') }}">
            </div>
        </div>

        @if ($projectCategory == $category)
            <div class="col-span-full">
                <label for="description"
                    class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.description') }}</label>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <textarea id="description" name="description" rows="3"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400  focus:ring-gray-300 sm:text-sm sm:leading-6">{{ old('description', $illustration->project_data['description'] ?? '') }}</textarea>
                </div>
                <p class="mt-2 text-xs leading-6 text-gray-600">{{ __('form.input.description') }}</p>
            </div>


            <div class="sm:col-span-4">
                <label for="github"
                    class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.github') }}</label>
                @error('github')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <input type="text" name="github" id="github"
                        class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 ring-inset placeholder:text-gray-400 placeholder:text-[14px] focus:ring-gray-300"
                        placeholder="{{ __('form.input.github') }}"
                        value="{{ old('github', $illustration->project_data['github'] ?? '') }}">
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="link"
                    class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.link') }}</label>
                <div class="mt-2">
                    <input type="text" name="link" id="link"
                        class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 ring-inset placeholder:text-gray-400 placeholder:text-[14px] focus:ring-gray-300"
                        placeholder="{{ __('form.input.link') }}"
                        value="{{ old('link', $illustration->project_data['link'] ?? '') }}">
                </div>
            </div>
        @endif

        <div class="col-span-full">
            <label for="path"
                class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.image') }}</label>
            @error('path')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div id="dragAndDropArea"
                class="mt-2 flex justify-center rounded-lg bg-white border-gray-900/25 px-6 py-10 ring-1 ring-inset ring-gray-300">
                <div class="text-center">
                    <div class="flex flex-row gap-4">
                        <div id="previewContainer" class="flex flex-row gap-4">
                        </div>
                        @if ($illustration)
                            <div id="existingIllustrationsContainer">
                                <div class="flex flex-wrap gap-4">
                                    @foreach ($illustration->medias()->get() as $img)
                                        <div class="relative" data-mediaId="{{ $img->id }}">
                                            <div class="absolute -right-2 -top-2 cursor-pointer"
                                                data-action="deleteProjectMedia">
                                                <div
                                                    class="w-[36px] h-[36px] relative border border-bg-main-600 bg-white rounded-full hover:bg-egg">
                                                    <i
                                                        class="fa-solid fa-xmark absolute top-0 left-[50%] -translate-x-2/4 text-main-600 text-[18px] 
                                                p-2"></i>
                                                </div>
                                            </div>

                                            <img src="{{ $illustration ? asset('storage/' . $img->path) : '' }}"
                                                class=" object-contain w-[100%] max-w-[200px]">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>


                    <svg class="{{ $illustration ? 'hidden' : '' }} mx-auto h-12 w-12 text-gray-300"
                        viewBox="0 0 24 24" id="dragAndDropSvg" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="mt-4 flex flex-col justify-center text-sm leading-6 text-gray-600 ">
                        <label for="path"
                            class="relative cursor-pointer rounded-md bg-white font-semibold text-main-500 focus-within:outline-none focus-within:ring-main-600 focus-within:ring-offset-2 hover:text-main-700">
                            <span>{{ __('form.label.image.upload') }}</span>
                            @if ($projectCategory == $category)
                                <input id="path" name="path[]" type="file" class="sr-only" accept="image/*"
                                    multiple>
                            @else
                                <input id="path" name="path" type="file" class="sr-only" accept="image/*">
                            @endif
                        </label>
                        <p class="pl-1">{{ __('form.label.image.drag') }}</p>
                    </div>
                    <p class="text-xs leading-5 text-gray-600">{{ __('form.label.image.formats') }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="flex justify-end mt-4 gap-4">
        @if ($illustration)
            <a href="{{ $illustration->category == $category ? route('projects') : route('illustrations') }}"
                class="px-10 py-2 border border-gray-400 text-gray-400 uppercase rounded-3xl hover:bg-gray-400 hover:text-white drop-shadow-lg text-center">{{ __('button.cancel') }}</a>
        @endif
        <button type="submit"
            class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-center">{{ __('button.send') }}</button>
    </div>
</form>
