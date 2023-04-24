@props(['photos'])

<x-layout>
    <section class="section-admin">
        <h2>
            Welcome to your Dashboard
        </h2>

        <div class="admin-container">
            <div class="button-container">
                <a class="admin-button" href="/admin/photos/upload">Upload</a>
                <form class="logout-form" action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="admin-button logout-button">Log Out</button>
                </form>
            </div>
            <div class="table-container">
                <table>

                    @foreach ($photos as $photo)
                        <tr>
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
        </div>


    </section>
</x-layout>
