<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Место Спорта</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body class="mx-20 bg-white">
    <nav>
        <div class="border-b-2 border-black/60 w-full py-5 flex justify-between items-center px-4">
            <a class="text-xl text-black/80 font-bold" href="/">Место спорта</a>
            <form method="GET" action="/" class="w-1/2">
                <x-form-search></x-form-search>
            </form>
            <form method="POST" action="/script">
                @csrf
                <x-button-main>Обновить</x-button-main>
            </form>
        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
