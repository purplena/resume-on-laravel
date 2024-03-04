<x-layout>
    <section class="section-admin">
        <h2>
            Welcome to your Dashboard
        </h2>
        <form method="POST" action="/admin/photos" enctype="multipart/form-data">
            @csrf

            <div>
                <label class="admin-label" for="title">
                    Title
                </label>
                <input type="text" class="admin-input" name="title" id="title" value="{{ old('name') }}"
                    required>
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="admin-label" for="path">
                    Picture
                </label>
                <input type="file" class="admin-input" name="path" id="path" value="{{ old('name') }}"
                    required>
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <button class="admin-button" type="sublmit">Upload</button>
        </form>
    </section>
</x-layout>
