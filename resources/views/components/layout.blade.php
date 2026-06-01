@props(['header' => 'Default Header'])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Oxpirant Studio">
    <meta name="description" content="A job record application built with Laravel.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $header }}</title>
</head>

<body>
     <header class="shadow w-full py-6 px-4 flex items-center justify-center md:px-6 lg:px-8 bg-amber-400">
        <div class="w-full max-w-[90rem] bg-white">
        <h1 class="text-3xl font-bold text-gray-900">
            {{ $header }}
        </h1>
        </div>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
