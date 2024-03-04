<x-page-layout>
    <section class="w-full mt-16 bg-purple-100 px-6 py-10 " id="contact">
        <div class="md:flex md:gap-x-8 max-w-5xl mr-auto ml-auto">
            <div class="w-full md:w-1/2 flex flex-col gap-2 mb-4 md:mb-0">
                <h1 class="text-h1 mb-4">Let's work together</h1>
                <p>
                    Whether you are looking to make a website for your company, build
                    your brand identity, or want to discuss your web strategy, I am here
                    to help you.
                </p>
                <p>
                    Use this form or email me at:
                    <span class="text-purple-600 font-bold hover:text-purple-800">elena.molano14@gmail.com</span>
                </p>
            </div>
            <div class="w-full md:w-1/2 bg-white drop-shadow-md hover:drop-shadow-xl px-8 py-6 rounded">
                <h2 class="text-h3">contact me</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" class="mt-4" action="{{ route('contact.us.store') }}" id="contactUSForm">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <div class="sm:col-span-4">
                            <label for="name" class="block text-sm font-bold leading-6 text-gray-900">Name</label>
                            @error('name')
                                <div class="text-rose-500">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <input type="text" name="name" id="name"
                                    class="block w-full rounded border-0 bg-transparent py-1.5 text-gray-900  ring-1 {{ $errors->has('name') ? 'ring-rose-500' : 'ring-gray-300' }} focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                    placeholder="Your name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="sm:col-span-4">
                            <label for="email" class="block text-sm font-bold leading-6 text-gray-900">Email</label>
                            @error('email')
                                <div class="text-rose-500">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <input type="email" name="email" id="email"
                                    class="block w-full rounded border-0 bg-transparent py-1.5 text-gray-900 ring-1 {{ $errors->has('email') ? 'ring-rose-500' : 'ring-gray-300' }} focus:ring-1 focus:ring-inset focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                    placeholder="Your email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="about" class="block text-sm font-bold leading-6 text-gray-900">How can I help
                                you?</label>
                            @error('message')
                                <div class="text-rose-500">{{ $message }}
                                </div>
                            @enderror
                            <div class="mt-2">
                                <textarea id="about" type="text" name="message" rows="3"
                                    class="block w-full rounded border-0 py-1.5 text-gray-900 ring-1 {{ $errors->has('message') ? 'ring-rose-500' : 'ring-gray-300' }} focus:ring-purple-600 placeholder:text-gray-400 placeholder:text-[14px]"
                                    placeholder="Your message">{{ old('message') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button
                            class="px-10 py-2 bg-purple-500 text-white uppercase rounded hover:bg-purple-800 drop-shadow-lg text-end">send</button>
                    </div>

                </form>

            </div>
    </section>
</x-page-layout>
