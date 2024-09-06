<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-2">
            {{ __('admin.welcome') }}
        </h1>
        <div class="mb-12">
            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="text-xs px-6 py-1 border border-main-800 text-main-800 uppercase rounded-3xl hover:bg-main-800 hover:text-white drop-shadow-lg">{{ __('auth.session.logout') }}</button>
            </form>
        </div>
        <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
            @foreach ($projectsStats as $key => $value)
                @php
                    $projectsStats = $value['stats'];
                    $translationKey = $value['translationKey'];
                @endphp
                <x-sections.components.project-stats-component :projectsStats=$projectsStats :translationKey="$translationKey" />
            @endforeach
        </div>
    </section>
</x-layout>
