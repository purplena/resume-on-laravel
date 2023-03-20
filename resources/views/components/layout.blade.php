<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <!-- SCSS & JavaScript -->
    @vite(['resources/css/main.scss', 'resources/js/app.js'])
    <title>Elena Molano</title>
</head>

<body>

    @include('/components.navbar')

    {{ $slot }}

    @include('components.footer')

    <script src="./js/app.js"></script>
</body>

</html>
