<x-layout>
    <section class="login-section">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl">Log in!</h1>
            
            <form method="POST" class="mt-4 relative" action="{{ route('session.store') }}" id="loginForm">
                @csrf
                <div class="flex flex-col gap-2">
                    <div class="sm:col-span-4">
                        <label for="email"
                            class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.email') }}</label>
                        {{-- <div data-inputName="email"></div> --}}
                        <div class="mt-2">
                            <input type="email" name="email" id="email"
                                class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                placeholder="{{ __('form.input.email') }}" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="password"
                            class="block text-sm font-bold leading-6 text-gray-900">{{ __('form.label.password') }}</label>
                        {{-- <div data-inputName="password"></div> --}}
                        <div class="mt-2">
                            <input type="password" name="password" id="password"
                                class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-1 ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                placeholder="{{ __('form.input.password') }}">
                        </div>
                    </div>

                </div>
                <div class="flex justify-end mt-4">
                    <button
                        class="px-10 py-2 bg-main-500 text-white uppercase rounded-3xl hover:bg-main-700 drop-shadow-lg text-end"
                        >{{ __('button.send') }}</button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
