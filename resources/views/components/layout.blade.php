@props(['header'=> 'Default Header'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Author" content="Oxpirant Studio">
    <meta name="description" content="A job record application built with Laravel.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    <title>{{ $header }}</title>
</head>
<body>
  <nav class="bg-green-500 text-white flex items-center justify-between px-4 py-3">
    <div class="flex space-x-4">
      <a href="/" class="mr-15"><img src="{{ Vite::asset('resources/images/icon.png') }}" class="w-[40px]" alt="logo"></a>
      <x-navlink href="/" :active="request()->is('/')">Home</x-navlink>
      <x-navlink href="/jobs" :active="request()->is('jobs')">Jobs</x-navlink>
      <x-navlink href="/about" :active="request()->is('about')">About</x-navlink>
      <x-navlink href="/contact" :active="request()->is('contact')">Contact</x-navlink>
    </div>
    <div class="flex space-x-4">
      <x-navlink href="/login" :active="request()->is('login')">Login</x-navlink>
      <x-navlink href="/register" :active="request()->is('register')">Register</x-navlink>
    </div>
  </nav>
  <header class="bg-white shadow w-full py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
          {{ $header }}
      </h1>
  </header>
  <main>
      {{ $slot }}
  </main>
</body>
</html>