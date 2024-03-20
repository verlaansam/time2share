<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-orange-50  ">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="flex flex-col items-center pb-20 ">
                <h1 class="text-amber-700 font-medium text-8xl mt-16">Time2Share<h1>
                <button class="w-36 h-10 rounded font-medium text-gray-200 hover:text-slate-900  bg-amber-700 text-2xl mt-2">Share Now</button>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
