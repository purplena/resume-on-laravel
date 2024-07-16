<div class="flex flex-row items-center gap-2">
    <form action="{{ route('illustrations') }}" method="GET" class="flex flex-row gap-2">
        <input type="text" name="search" placeholder="{{ __('form.placeholder.search') }}"
            value="{{ request('search') }}"
            class="block w-full h-[27.5px] rounded-3xl border-0 bg-white py-1.5 text-main-600 ring-main-500 ring-1 focus:ring-1 focus:ring-inset focus:ring-main-500 placeholder:text-main-600 placeholder:text-[14px]"
            value="{{ old(request('search')) ? request('search') : '' }}">
        <button
            class="inline cursor-pointer px-6 py-1 text-center border border-main-500 text-main-500 uppercase rounded-3xl hover:border hover:border-main-500  hover:bg-main-500 hover:text-white drop-shadow-lg">{{ __('form.button.search') }}</button>
    </form>
    <a class="cursor-pointer px-6 py-1 text-center border border-red-800 text-red-800 uppercase rounded-3xl hover:border hover:border-red-800  hover:bg-red-800 hover:text-white drop-shadow-lg"
        href="{{ route('illustrations') }}">{{ __('form.button.search.clear') }}</a>
</div>
