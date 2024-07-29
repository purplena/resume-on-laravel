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
                        <i class='{{ $projectsStats->projectsThisMonth ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $projectsStats->projectsThisMonth ? '#22c55e' : '#ef4444' }}"></i>
                        <p>
                            <span class="font-bold">
                                {{ trans_choice('status.illustration', $projectsStats->projectsThisMonth, ['value' => $projectsStats->projectsThisMonth]) }}
                            </span>
                            {{ __('admin.preposition.in') }}
                            {{ $projectsStats->month }}
                            {{ $projectsStats->currentYear }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $projectsStats->projectsThisMonth > $projectsStats->projectsThisMonthLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $projectsStats->projectsThisMonth > $projectsStats->projectsThisMonthLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                        {{ $projectsStats->monthVsMonth > 0 ? '#22c55e' : '#ef4444' }}">{{ $projectsStats->monthVsMonth > 0 ? '+' : '' }}{{ $projectsStats->monthVsMonth }}%</span>
                            {{ __('admin.preposition.in') }} {{ $projectsStats->month }}
                            {{ $projectsStats->currentYear }} vs {{ $projectsStats->month }}
                            {{ $projectsStats->lastYear }}
                        </p>
                    </div>

                    <div class="flex flex-row justify-end">
                        <p class="text-gray-500"><span class="font-bold">{{ $projectsStats->projectsThisMonth }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $projectsStats->month }} {{ $projectsStats->currentYear }} vs
                            <span class="font-bold">{{ $projectsStats->projectsThisMonthLastYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $projectsStats->month }} {{ $projectsStats->lastYear }}
                        </p>
                    </div>

                </div>
                <div>
                    <div class="flex flex-row gap-1">
                        <i class='{{ $projectsStats->projectsThisYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $projectsStats->projectsThisYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p>
                            <span class="font-bold">
                                {{ trans_choice('status.illustration', $projectsStats->projectsThisMonth, ['value' => $projectsStats->projectsThisMonth]) }}
                            </span>
                            {{ __('admin.preposition.in') }} {{ $projectsStats->currentYear }}
                        </p>
                    </div>

                    <div class="flex flex-row justify-end gap-1 text-gray-500">
                        <i class='{{ $projectsStats->projectsThisYear > $projectsStats->projectsLastYear ? 'fa-solid fa-chart-line' : 'fa-regular fa-face-sad-tear' }}'
                            style="color:
                        {{ $projectsStats->projectsThisYear > $projectsStats->projectsLastYear ? '#22c55e' : '#ef4444' }}"></i>
                        <p><span class="font-bold"
                                style="color:
                    {{ $projectsStats->yearVsYear > 0 ? '#22c55e' : '#ef4444' }}">{{ $projectsStats->yearVsYear > 0 ? '+' : '' }}{{ $projectsStats->yearVsYear }}%</span>
                            {{ __('admin.preposition.in') }} {{ $projectsStats->currentYear }} vs
                            {{ $projectsStats->lastYear }}
                        </p>
                    </div>
                    <div class="flex flex-row justify-end">
                        <p class="text-gray-500"><span class="font-bold">{{ $projectsStats->projectsThisYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $projectsStats->currentYear }} vs
                            <span class="font-bold">{{ $projectsStats->projectsLastYear }}</span>
                            {{ __('admin.preposition.in') }}
                            {{ $projectsStats->lastYear }}
                        </p>
                    </div>
                </div>
                <a class="block text-center px-4 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 hover:text-egg drop-shadow-lg"
                    href="{{ route('illustrations') }}">{{ __('admin.button.manage.illustrations') }}</a>
            </div>
        </div>
    </section>
</x-layout>
