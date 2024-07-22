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
        <div class="border border-main-800 rounded-3xl px-4 py-4 w-[300px]">
            <h2 class="text-center text-h4">{{ __('admin.h2.manage.illustrations') }}</h2>
            <div class="mt-2 mb-2 bg-main-800 h-[1px]"></div>
            <div class="flex flex-col gap-2">
                <div>
                    <div class="flex flex-row gap-1">
                        <i class='{{ $illustrationStats->illustrationsThisMonth ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationStats->illustrationsThisMonth ? '#22c55e' : '#ef4444' }}"></i>
                        <p>
                            <span class="font-bold">
                                {{ trans_choice('status.illustration', $illustrationStats->illustrationsThisMonth, ['value' => $illustrationStats->illustrationsThisMonth]) }}
                            </span>
                            {{ __('admin.preposition.in') }}
                            {{ $illustrationStats->month }}
                            {{ $illustrationStats->currentYear }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $illustrationStats->illustrationsThisMonth > $illustrationStats->illustrationsThisMonthLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationStats->illustrationsThisMonth > $illustrationStats->illustrationsThisMonthLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                        {{ $illustrationStats->monthVsMonth > 0 ? '#22c55e' : '#ef4444' }}">{{ $illustrationStats->monthVsMonth > 0 ? '+' : '' }}{{ $illustrationStats->monthVsMonth }}%</span>
                            {{ __('admin.preposition.in') }} {{ $illustrationStats->month }}
                            {{ $illustrationStats->currentYear }} vs {{ $illustrationStats->month }}
                            {{ $illustrationStats->lastYear }}
                        </p>
                    </div>

                    <div class="flex flex-row justify-end">
                        <p class="text-gray-500"><span
                                class="font-bold">{{ $illustrationStats->illustrationsThisMonth }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $illustrationStats->month }} {{ $illustrationStats->currentYear }} vs
                            <span class="font-bold">{{ $illustrationStats->illustrationsThisMonthLastYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $illustrationStats->month }} {{ $illustrationStats->lastYear }}
                        </p>
                    </div>

                </div>
                <div>
                    <div class="flex flex-row gap-1">
                        <i class='{{ $illustrationStats->illustrationsThisYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationStats->illustrationsThisYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p>
                            <span class="font-bold">
                                {{ trans_choice('status.illustration', $illustrationStats->illustrationsThisMonth, ['value' => $illustrationStats->illustrationsThisMonth]) }}
                            </span>
                            {{ __('admin.preposition.in') }} {{ $illustrationStats->currentYear }}
                        </p>
                    </div>

                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $illustrationStats->illustrationsThisYear > $illustrationStats->illustrationsLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $illustrationStats->illustrationsThisYear > $illustrationStats->illustrationsLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                    {{ $illustrationStats->yearVsYear > 0 ? '#22c55e' : '#ef4444' }}">{{ $illustrationStats->yearVsYear > 0 ? '+' : '' }}{{ $illustrationStats->yearVsYear }}%</span>
                            {{ __('admin.preposition.in') }} {{ $illustrationStats->currentYear }} vs
                            {{ $illustrationStats->lastYear }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-end">
                        <p class="text-gray-500"><span
                                class="font-bold">{{ $illustrationStats->illustrationsThisYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $illustrationStats->currentYear }} vs
                            <span class="font-bold">{{ $illustrationStats->illustrationsLastYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $illustrationStats->lastYear }}
                        </p>
                    </div>
                </div>
                <a class="block text-center px-4 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg"
                    href="{{ route('illustrations') }}">{{ __('admin.button.manage.illustrations') }}</a>
            </div>
        </div>
    </section>
</x-layout>
