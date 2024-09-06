<div class="flex flex-row gap-1">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <div class="w-[28px] h-[28px] bg-egg rounded-full border border-solid border-main-500 relative ">
                <span
                    class="uppercase text-h6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-main-700">{{ $available_locale }}</span>
            </div>
        @else
            <a class="social-link-transition block cursor-pointer w-[28px] h-[28px] bg-white rounded-full border border-solid border-main-500 relative text-main-500"
                href={{ route('language', ['locale' => $available_locale]) }}>
                <span class="uppercase text-h6 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    {{ $available_locale }}
                </span>
            </a>
        @endif
    @endforeach
</div>
