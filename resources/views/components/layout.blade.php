<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- SCSS & JavaScript -->
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    @stack('scripts')
    <title>Elena Molano</title>
</head>

<body class="h-full">

    {{-- <x-navbar /> --}}

    {{ $slot }}

    {{-- <x-flash /> --}}

    {{-- <x-footer /> --}}

    <script src="./js/app.js"></script>
    @push('scripts')
        <script src="./js/app.js"></script>
    @endpush
</body>

</html>
