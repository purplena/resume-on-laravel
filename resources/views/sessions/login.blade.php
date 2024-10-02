<x-layout>
    <section class="login-section mt-navbarMargin py-12 px-4">
        <main class="max-w-lg mx-auto mt-10 bg-main-200 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center text-h3">{{ __('auth.session.login') }}</h1>
            <form method="POST" class="mt-4 relative" action="{{ route('session.store') }}" id="loginForm">
                @csrf
                <div class="flex flex-col gap-2">
                    <div class="sm:col-span-4 text-red-500 font-bold hidden" id="authErrorDiv">
                    </div>
                    <x-sections.form.label-input inputName="email" type="email" />
                    <x-sections.form.label-input inputName="password" type="password" />
                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end">{{ __('button.send') }}</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
