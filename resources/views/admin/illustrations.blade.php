<x-layout>
    <section class="mt-navbarMargin py-12 px-4 max-w-maxScreenWidth mx-auto">
        <h1 class="text-h1 mb-4">
            {{ __('admin.illustrations.h1') }}
        </h1>
        <h2 class="text-h3 mb-4">
            {{ __('admin.illustrations.h2.add') }}
        </h2>


        <x-sections.form.upload-image-form />

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
        <div id="myModal" class="modal">
            <!-- Modal Content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Modal Content goes here...</p>
            </div>
        </div>




    </section>
</x-layout>
