<!--Main Utama pembungkus semua konten-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo-yysn.png') }}">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

    <x-navbare></x-navbare>

    <div class="mt-16 ">
        {{ $slot }}
    </div>
    <footer>
        <x-footer></x-footer>
    </footer>
</body>

</html>
