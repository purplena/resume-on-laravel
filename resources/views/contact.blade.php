<x-page-layout>
    <!-- Contact Section - Section 6 -->
    <section class="section-6" id="contact" style="margin-top: 62px;">
        <div class="section-6-container">
            <div class="section-6-text section-6-flex">
                <h1>Let's work together</h1>
                <p>
                    Whether you are looking to make a website for your company, build
                    your brand identity, or want to discuss your web strategy, I am here
                    to help you. Use this form or email me at
                    <span class="section-6-span">elena.molano14@gmail.com</span>
                </p>
            </div>
            <div class="section-6-form section-6-flex">
                <h3>contact me</h3>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        @error('name')
                            <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                        <label class="form-text-intro">Name</label>
                        <input type="text" placeholder="Your name" class="form-control" name="name" />
                        @error('email')
                            <p class="text-red-500 bottom-2">{{ $message }}</p>
                        @enderror
                        <label class="form-text-intro">Email</label>
                        <input type="email" placeholder="How can I contact you?" class="form-control"
                            name="email" />
                        @error('message')
                            <div class="alert alert-danger text-red-500">{{ $message }}</div>
                        @enderror
                        <label class="form-text-intro">I need help with...</label>
                        <textarea type="text" name="message" placeholder="How can I help you?" class="form-control" rows="5"></textarea>
                    </div>
                    <!-- button -->
                    <button type="submit" class="classic-button">send</button>
                </form>
            </div>
        </div>
    </section>
</x-page-layout>
