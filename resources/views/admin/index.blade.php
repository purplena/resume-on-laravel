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

        <div>
            @foreach ($illustrationsThisMonth as $illustartion)
                <p>{{ $illustartion->created_at }}</p>
            @endforeach
        </div>

        <div class="border border-main-800 rounded-3xl px-4 py-4 w-[300px]">
            <h2 class="text-center text-h4">{{ __('admin.h2.manage.illustrations') }}</h2>
            <div class="mt-2 mb-2 bg-main-800 h-[1px]"></div>
            <div class="flex flex-col gap-2">
                <div>
                    <i class="fa-solid fa-chart-line" style="color: #22c55e;"></i>
                    <i class="fa-regular fa-face-sad-tear" style="color: #ef4444;"></i>
                    <p>+30 illustrations in the last 30 days</p>
                </div>
                <div>
                    <i class="fa-solid fa-chart-line" style="color: #22c55e;"></i>
                    <i class="fa-regular fa-face-sad-tear" style="color: #ef4444;"></i>
                    <p>+100% vs month year</p>
                </div>
                <a class="block text-center px-4 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg"
                    href="{{ route('illustrations') }}">{{ __('admin.button.manage.illustrations') }}</a>
            </div>
        </div>
    </section>
</x-layout>
