<section class="mb-12 px-4 max-w-maxScreenWidth sm:flex sm:items-center sm:mx-auto">
    <div>
        <img src="{{ asset('storage/photo-of-me-purple-small.png') }}" alt="image of Lena" class="max-h-heroImage" />
    </div>
    <div>
        <h1 class="text-h1 mb-4 mt-4 sm:mt-0">{{ __('hero.welcome') }}</h1>
        <div class="flex flex-col gap-2 mb-4">
            <p>
                {{ __('hero.p1') }}
            </p>
            <p>
                {{ __('hero.p2') }}
            </p>
            <p>
                {{ __('hero.p3') }}
            </p>
            <p>
                {{ __('hero.p4') }}
            </p>
        </div>
        <div class="flex flex-row gap-4">
            <x-button-href text="{{ __('button.projects') }}" />
            <x-button-href text="{{ __('button.skills') }}" />
        </div>
    </div>
</section>
