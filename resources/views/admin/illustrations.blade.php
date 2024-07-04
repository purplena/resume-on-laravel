<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-2">
            Illustrations
        </h1>
        <form method="POST" action="{{ route('illustrations.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">
                    Title
                </label>
                <input type="text" name="title" id="title" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="path">
                    Picture
                </label>
                <input type="file" name="path" id="path" required>
            </div>
            <button class="admin-button" type="submit">Upload</button>
        </form>

        <div class="table-container">
            <table>

                @foreach ($photos as $photo)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="">
                        </td>
                        <td>
                            {{ $photo->title }}
                        </td>

                        <td>
                            <form action="/admin/photos/{{ $photo->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>




    </section>
</x-layout>
