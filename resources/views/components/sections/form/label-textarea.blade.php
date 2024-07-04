<div class="col-span-full">
    <label for="{{ $inputName }}"
        class="block text-sm font-bold leading-6 text-gray-900">{{ __("form.label.$inputName") }}</label>
    <div data-inputName="{{ $inputName }}"></div>
    <div class="mt-2">
        <textarea id="{{ $inputName }}" type="text" name="{{ $inputName }}" rows=3
            class="block w-full rounded border-0 py-1.5 text-gray-900 ring-1 ring-gray-300 focus:ring-purple-600  placeholder:text-gray-400 placeholder:text-[14px] "
            placeholder="{{ __("form.input.$inputName") }}" style="resize: none;">{{ old($inputName) }}</textarea>
    </div>
</div>
