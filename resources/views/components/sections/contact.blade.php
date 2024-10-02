<section class="relative ">
    <x-svg.shadow-wave-2 />
    <x-svg.top-wave />
    <div class="bg-main-200 -mt-[5px] -mb-[1px]">
        <div class="px-4 py-12 md:flex md:gap-x-8 max-w-5xl mr-auto ml-auto">
            <div class="w-full md:w-1/2 flex flex-col gap-2 mb-4 md:mb-0">
                <h1 class="text-h1 mb-4">{{ __('contact.h2') }}</h1>
                <p>
                    {{ __('contact.p1') }}
                </p>
            </div>
            <div
                class="contact-form-container w-full md:w-1/2 drop-shadow-sm hover:drop-shadow-lg px-8 py-6 rounded-3xl">
                <h2 class="text-h3">{{ __('contact.contact.me') }}</h2>
                <div class="mt-4 font-bold text-main-700 text-[16px]" id="success-message"></div>
                <form method="POST" class="mt-4 relative" action="{{ route('contact.us.store') }}" id="contactUSForm">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <x-sections.form.label-input inputName="name" type="text" />
                        <x-sections.form.label-input inputName="email" type="email" />
                        <x-sections.form.label-textarea inputName="message" />
                    </div>
                    <div class="flex justify-end mt-4">
                        <button
                            class="btn-transition-contact px-10 py-2 bg-main-500 text-white uppercase rounded-3xl drop-shadow-lg text-end"
                            id="submitButton">{{ __('button.send') }}</button>
                    </div>
                </form>
                <div id="overlay"
                    class="hidden absolute inset-0 bg-black bg-opacity-10 transition-opacity duration-300 ease-in-out rounded-3xl">
                    <div class="flex justify-center items-center h-full ">
                        <span class="loader"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-svg.bottom-wave />
</section>
