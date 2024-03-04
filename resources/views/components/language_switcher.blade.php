<div class="flex flex-col gap-1" x-data="{ open: false }">
    @foreach ($available_locales as $locale_name => $available_locale)
        @if ($available_locale === $current_locale)
            <div x-on:click="open = ! open" class="w-[32px] flex flex-row gap-2" data-value="{{ $available_locale }}">
                <img src="{{ asset('images/flags/' . $locale_name . '-flag.png') }}" alt={{ $locale_name . ' flag' }} />
                <span class="font-bold uppercase">{{ $available_locale }}</span>
            </div>
        @else
            <div x-show="open" @click.outside="open = false" class="w-[32px] flex flex-row gap-2 cursor-pointer"
                data-value="{{ $available_locale }}" onclick="changeLanguage(this.getAttribute('data-value'))">
                <img src="{{ asset('images/flags/' . $locale_name . '-flag.png') }}" alt={{ $locale_name . ' flag' }} />
                <span class="uppercase">{{ $available_locale }}</span>
            </div>
        @endif
    @endforeach
</div>


<script>
    function changeLanguage(lang) {
        window.location = '{{ url('language/') }}/' + lang;
    }
</script>
