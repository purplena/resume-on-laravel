<article class="bg-egg rounded-3xl px-4 py-6 flex flex-col gap-2 items-center shadow-sm hover:shadow-md">
    <h3 class="text-h4 text-center text-main-600">{{ $header }}</h3>
    <i class="{{ $icon }}"></i>
    <div class="flex flex-col gap-2">
        {{ $slot }}
    </div>
</article>
