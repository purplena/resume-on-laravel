<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- SCSS & JavaScript -->
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    @stack('scripts')
    <title>Elena Molano</title>
</head>

<body class="h-full">
    <button id="backToTopBtn" class="hidden fixed top-20 left-1/2 z-10" style="transform: translateX(-50%, -50%);">
        <i class="fa-solid fa-chevron-up text-[32px]" id="chevronUpIcon"></i>
    </button>
    {{ $slot }}

    <script src="./js/app.js"></script>
    @push('scripts')
        <script src="./js/app.js"></script>
    @endpush
</body>

</html>
