<div class="flex flex-col gap-1" id="language-switch">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <div class="flex flex-row gap-2 cursor-pointer" id="current-language">
                <img class="w-[32px]" src="{{ asset('images/flags/' . $locale_name . '-flag.png') }}"
                    alt={{ $locale_name . ' flag' }} />
                <span class="font-bold uppercase">{{ $available_locale }}</span>
            </div>
        @else
            <div class="cursor-pointer hidden hidden-language">
                <a class="flex flex-row gap-2 " href={{ url('language/') . '/' . $available_locale }}>
                    <img class="w-[32px]" src="{{ asset('images/flags/' . $locale_name . '-flag.png') }}"
                        alt={{ $locale_name . ' flag' }} />
                    <span class="uppercase">{{ $available_locale }}</span>
                </a>
            </div>
        @endif
    @endforeach
</div>
