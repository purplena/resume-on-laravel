<div class="flex flex-row gap-1">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <div class="flex flex-row gap-2 cursor-pointer h-5">
                <span class="uppercase text-egg">{{ $available_locale }}</span>
            </div>
        @else
            <div class="cursor-pointer h-5">
                <a class="flex flex-row gap-2" href={{ route('language', ['locale' => $available_locale]) }}>
                    <span class="uppercase">{{ $available_locale }}</span>
                </a>
            </div>
        @endif
    @endforeach
</div>
