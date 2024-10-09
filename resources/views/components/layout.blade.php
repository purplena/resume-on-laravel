<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    {{-- <style>
        .light {
            --white: 254, 254, 254;
            --black: 34, 34, 34;
            --main-200: 224, 218, 229;
            --egg: 253, 248, 238;
            --main-500: 179, 163, 192;
            --main-600: 143, 130, 153;
            --main-700: 107, 97, 115;
            --main-800: 71, 65, 76;
            --main-900: 42, 30, 53;
        }

        .dark {
            --white: 254, 254, 254;
            --black: 34, 34, 34;
            --egg: 253, 246, 213;
            --main-200: 71, 65, 76;
            --main-500: 179, 163, 192;
            --main-600: 224, 218, 229;
            --main-700: 107, 97, 115;
            --main-800: 71, 65, 76;
        }
    </style> --}}
    <!-- SCSS & JavaScript -->
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    <!-- @stack('scripts') -->
    <title>Elena Molano</title>
</head>

<body class="hidden">
    <div class="h-full relative overflow-x-hidden" id="background">
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
    </div>
</body>

</html>
