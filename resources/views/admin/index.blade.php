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

        {{-- Necessary for now to make calculations --}}
        <div>
            <p>This month: {{ $illustrationsThisMonth }}</p>
            <p>This year: {{ $illustrationsThisYear }}</p>
            <p>Last year: {{ $illustrationsLastYear }}</p>
            <p>This month last year: {{ $illustrationsThisMonthLastYear }}</p>
        </div>
        {{-- end --}}

        <div class="border border-main-800 rounded-3xl px-4 py-4 w-[300px]">
            <h2 class="text-center text-h4">{{ __('admin.h2.manage.illustrations') }}</h2>
            <div class="mt-2 mb-2 bg-main-800 h-[1px]"></div>
            <div class="flex flex-col gap-2">
                <div>
                    <div class="flex flex-row gap-1">
                        <i class='{{ $illustrationsThisMonth ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationsThisMonth ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold">{{ $illustrationsThisMonth ?? '0' }}</span> illustrations in
                            {{ $month }}
                            {{ $currentYear }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $illustrationsThisMonth > $illustrationsThisMonthLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationsThisMonth > $illustrationsThisMonthLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                        {{ $monthVsMonth > 0 ? '#22c55e' : '#ef4444' }}">{{ $monthVsMonth > 0 ? '+' : '' }}{{ $monthVsMonth }}%</span>
                            in {{ $month }}
                            {{ $currentYear }} vs {{ $month }}
                            {{ $lastYear }}
                        </p>
                    </div>
                </div>
                <div>
                    <div class="flex flex-row gap-1">
                        <i class='{{ $illustrationsThisYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationsThisYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold">{{ $illustrationsThisYear ?? '0' }}</span> illustrations in
                            {{ $currentYear }}
                        </p>
                    </div>

                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $illustrationsThisYear > $illustrationsLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationsThisYear > $illustrationsLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                    {{ $yearVsYear > 0 ? '#22c55e' : '#ef4444' }}">{{ $yearVsYear > 0 ? '+' : '' }}{{ $yearVsYear }}%</span>
                            in {{ $currentYear }} vs
                            {{ $lastYear }}
                        </p>
                    </div>
                </div>
                <a class="block text-center px-4 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg"
                    href="{{ route('illustrations') }}">{{ __('admin.button.manage.illustrations') }}</a>
            </div>
        </div>
    </section>
</x-layout>
