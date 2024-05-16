<section class="w-full bg-main-200 rounded-3xl px-4 py-12 mt-navbarMargin" id="contact">
    <div class="md:flex md:gap-x-8 max-w-5xl mr-auto ml-auto">
        <div class="w-full md:w-1/2 flex flex-col gap-2 mb-4 md:mb-0">
            <h1 class="text-h1 mb-4">{{ __('contact.h2') }}</h1>
            <p>
                {{ __('contact.p1') }}
            </p>
            <p>
                {{ __('contact.p2') }}
                <span class="text-main-600 font-bold hover:text-main-700">elena.molano14@gmail.com</span>
            </p>
        </div>
        <div class="w-full md:w-1/2  bg-egg drop-shadow-sm hover:drop-shadow-lg px-8 py-6 rounded-3xl">
            <h2 class="text-h3">{{ __('contact.contact.me') }}</h2>
            <div class="mt-4 font-bold text-main-700 text-[16px]" id="success-message"></div>
            <form method="POST" class="mt-4" action="{{ route('contact.us.store') }}" id="contactUSForm">
                @csrf
                <div class="flex flex-col gap-2">
                    <div class="sm:col-span-4">
                        <label for="name"
                            class="block text-sm font-bold leading-6 text-gray-900">{{ __('contact.label.name') }}</label>
                        <div data-inputName="name"></div>
                        <div class="mt-2">
                            <input type="text" name="name" id="name"
                                class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-gray-300 ring-1 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                placeholder="{{ __('contact.input.name') }}" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email"
                            class="block text-sm font-bold leading-6 text-gray-900">{{ __('contact.label.email') }}</label>
                        <div data-inputName="email"></div>
                        <div class="mt-2">
                            <input type="email" name="email" id="email"
                                class="block w-full rounded border-0 bg-white py-1.5 text-gray-900 ring-1 ring-gray-300 focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                placeholder="{{ __('contact.input.email') }}" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="message"
                            class="block text-sm font-bold leading-6 text-gray-900">{{ __('contact.label.message') }}</label>
                        <div data-inputName="message"></div>
                        <div class="mt-2">
                            <textarea id="message" type="text" name="message" rows=3
                                class="block w-full rounded border-0 py-1.5 text-gray-900 ring-1 ring-gray-300 focus:ring-purple-600  placeholder:text-gray-400 placeholder:text-[14px] "
                                placeholder="{{ __('contact.input.message') }}" style="resize: none;">{{ old('message') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <x-button-classic text="{{ __('button.send') }}" />
                </div>
            </form>
        </div>
</section>
