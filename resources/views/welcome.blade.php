<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased bg-orange-50 h-screen">
        <nav class="flex items-center justify-center h-14 w-screen m-2 shadow-lg ">
            @if (Route::has('login'))
                <div class="">
                    <a class=" font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Products</a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class=" ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </nav>
        <header class="flex flex-col items-center pb-20 ">
            <h1 class="text-amber-700 font-medium text-8xl mt-16">Time2Share<h1>
            <button class="w-36 h-10 rounded font-medium text-gray-200 hover:text-slate-900  bg-amber-700 text-2xl mt-2">Share Now</button>
            </header>
        <!-- product  -->
        <article class="shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] h-fit">
            <section class="flex items-center justify-center w-1/4 h-[400px]">
                <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                    <p class="w-full h-[80%] bg-green-500 rounded-t-xl">meloen.png</p>
                    <div class=" h-1/6 grid grid-cols-2 m-1">
                        <h1 class="text-4xl text-amber-700">naam</h1>
                        <p class="col-start-1 text-gray-600">locatie</p>
                        <p class=" col-start-2 justify-self-end text-gray-600">datum</p>
                    </div>
                </article>
            </section>
        </article>
    
    </body>
</html>
