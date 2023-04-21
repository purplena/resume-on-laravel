<x-layout>
    <section class="section-3">
        <h2>
            Welcome to your Dashboard
        </h2>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    </section>
</x-layout>
