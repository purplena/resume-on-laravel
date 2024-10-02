<div class="sm:col-span-4">
    <label for="{{ $inputName }}" class="block text-sm font-bold leading-6">{{ __("form.label.$inputName") }}</label>
    <div data-inputName="{{ $inputName }}"></div>
    <div class="mt-2">
        <input type="{{ $type }}" name="{{ $inputName }}" id="{{ $inputName }}"
            class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
            placeholder="{{ __("form.input.$inputName") }}" value="{{ old($inputName) }}">
    </div>
</div>
