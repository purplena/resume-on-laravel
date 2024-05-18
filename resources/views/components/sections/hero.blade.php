<section class="mb-12 px-4 max-w-maxScreenWidth sm:flex sm:items-center sm:mx-auto" id="home">
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
            <button
                class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end"
                id="scroll-to-projects-btn">{{ __('button.projects') }}</button>
            <button
                class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end"
                id="scroll-to-contact-btn">{{ __('button.contact') }}</button>
        </div>
    </div>
</section>
