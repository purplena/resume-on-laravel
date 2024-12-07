<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script>
        const systemSettingDark = window.matchMedia("(prefers-color-scheme: dark)");

        function calculateSettingAsThemeString({
            systemSettingDark
        }) {
            if (systemSettingDark.matches) {
                return "dark";
            }

            return "light";
        }

        const url = new URL('/get-theme', window.location.origin);
        url.searchParams.append('userTheme', calculateSettingAsThemeString({
            systemSettingDark,
        }));

        fetch(url.toString(), {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                document.documentElement.classList.add(data.color);
                document.body.classList.remove("hidden");
            })
            .catch(error => {
                console.error('Error fetching theme color:', error);
            });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    <title>Elena Molano</title>
</head>


<body class="hidden">
    <div class="wrapping-div h-full relative overflow-x-hidden" id="background">
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
