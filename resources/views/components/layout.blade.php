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
    <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
    <nav
        class="relative bg-green-500 after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
        <div class="mx-auto max-w-7xl px-2 md:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" command="--toggle" commandfor="mobile-menu"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center md:items-stretch md:justify-start">
                    <div class="flex shrink-0 items-center">
                        <a href="/" class="mr-5 flex items-center"><img
                                src="{{ Vite::asset('resources/images/icon.png') }}" class="w-[40px]"
                                alt="logo"><span class="ml-1 font-bold text-2xl text-black">OXPIRANT</span></a>

                    </div>
                    <div class="hidden md:ml-6 md:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                            <x-navlink href="/" :active="request()->is('/')" class="text-white flex items-center "><span>Home</span> <x-icon name="home" /></x-navlink>
                            <x-navlink href="/jobs" :active="request()->is('jobs')" class="text-gray-300 hover:bg-white/5 hover:text-white flex items-center "><span>Jobs</span> <x-icon name="briefcase" /></x-navlink>
                            <x-navlink href="/about" :active="request()->is('about')" class="text-gray-300 hover:bg-white/5 hover:text-white flex items-center"><span>About</span> <x-icon name="info" /></x-navlink>
                            <x-navlink href="/contact" :active="request()->is('contact')" class="text-gray-300 hover:bg-white/5 hover:text-white flex items-center"><span>Contact</span> <x-icon name="phone" /></x-navlink>
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 md:static md:inset-auto md:ml-6 md:pr-0">
                    <button type="button"
                        class="relative rounded-full p-1 text-white focus:outline-2 focus:outline-offset-2 focus:outline-black-500">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                            data-slot="icon" aria-hidden="true" class="size-6">
                            <path
                                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <!-- Profile dropdown -->
                    <el-dropdown class="relative ml-3">
                        <button
                            class="relative flex rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white-500">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt=""
                                class="size-8 rounded-full bg-gray-800 outline -outline-offset-1 outline-white/10" />
                        </button>

                        <el-menu anchor="bottom end" popover
                            class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline -outline-offset-1 outline-white transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                            <a href="#"
                                class="block px-4 py-2 text-md text-gray-300 focus:bg-white/5 focus:outline-hidden">Your
                                profile</a>
                            <a href="#"
                                class="block px-4 py-2 text-md text-gray-300 focus:bg-white/5 focus:outline-hidden">Settings</a>
                            <a href="#"
                                class="block px-4 py-2 text-md text-gray-300 focus:bg-white/5 focus:outline-hidden">Sign
                                out</a>
                        </el-menu>
                    </el-dropdown>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden
            class="fixed top-16 left-0 w-full z-50 block md:hidden bg-gray-800/95 backdrop-blur-sm transition-all duration-300 ease-in-out">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                {{-- <a href="#" aria-current="page" class="block rounded-md bg-gray-950/50 px-3 py-2 text-base font-medium text-white">Dashboard</a> --}}
                <x-navlink href="/" :active="request()->is('/')">Home</x-navlink>
                <x-navlink href="/jobs" :active="request()->is('jobs')">Jobs</x-navlink>
                <x-navlink href="/about" :active="request()->is('about')">About</x-navlink>
                <x-navlink href="/contact" :active="request()->is('contact')">Contact</x-navlink>
            </div>
        </el-disclosure>
    </nav>
    <header class="bg-white shadow w-full py-6 px-4 md:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            {{ $header }}
        </h1>
    </header>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
