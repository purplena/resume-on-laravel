<div class="flex flex-row gap-1">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
                <div class="w-[28px] h-[28px] bg-egg rounded-full border border-solid border-main-500 relative ">
                    <span class="uppercase absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-base leading-none text-main-700 font-headers">{{ $available_locale }}</span>
                </div>
        @else
            <div class="cursor-pointer w-[28px] h-[28px] bg-white rounded-full border border-solid border-main-500 relative hover:bg-egg hover:border-main-700 hover:text-main-700 text-base text-main-500 font-headers leading-none">
                <a class="uppercase absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" href={{ route('language', ['locale' => $available_locale]) }}>
                    {{ $available_locale }}
                </a>
            </div>
        @endif
    @endforeach
</div>
