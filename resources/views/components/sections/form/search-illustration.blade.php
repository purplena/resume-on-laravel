<div class="flex flex-col xs:flex-row items-center gap-2 relative z-10">
    <form action="{{ route($route) }}" method="GET" class="flex flex-col xs:flex-row gap-2 items-center">
        <input type="text" name="search" placeholder="{{ __('form.placeholder.search') }}"
            value="{{ request('search') }}"
            class="block h-[27.5px] rounded-3xl border-0 bg-white py-1.5 text-main-700 ring-main-500 ring-1 focus:ring-1 focus:ring-inset focus:ring-main-500 placeholder:text-main-700 placeholder:text-[14px]"
            value="{{ old(request('search')) ? request('search') : '' }}">
        <button
            class="btn-transition-border block w-[137px] cursor-pointer py-1 text-center border border-main-500 text-main-500 
            uppercase rounded-3xl drop-shadow-lg">{{ __('form.button.search') }}</button>
    </form>
    <a class="btn-transition-border-alert w-[137px] cursor-pointer py-1 text-center border border-red-800 text-red-800 uppercase rounded-3xl drop-shadow-lg"
        href="{{ route($route) }}">{{ __('form.button.search.clear') }}</a>
</div>
