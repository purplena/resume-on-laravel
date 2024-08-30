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
    <!-- @stack('scripts') -->
    <title>Elena Molano</title>
</head>

<body class="h-full relative overflow-x-hidden" id="background">
    <div class="flex justify-center">
        <button id="back-to-top-btn" class="hidden fixed top-[40px] p-5" style="z-index: 5;">
            <i class="fa-solid fa-chevron-up text-[32px]" id="chevron-up-icon"></i>
        </button>
    </div>
    <div class="flex flex-col min-h-screen">
        <x-navbar />
        <div class="flex-grow">
            {{ $slot }}
        </div>
        <x-footer />
    </div>
    <x-sections.components.flashed-session />
    <x-sections.components.axios-status-message />
</body>

</html>
