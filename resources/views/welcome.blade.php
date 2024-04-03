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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

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
        <article class="shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] h-fit w-screen flex flex-wrap">
            @if ($product->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
            @endif
            @foreach ($product as $product_table)
            <section class="flex items-center justify-center w-[350px] h-[400px]">
                <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                    <p class="w-full h-[80%] bg-green-500 rounded-t-xl">{{ $product_table->image}}</p>
                    <div class=" h-1/6 grid grid-cols-2 m-1">
                        <h1 class="text-4xl text-amber-700">{{ $product_table->name}}</h1>
                        <p class="col-start-1 text-gray-600">{{ $product_table->location}}</p>
                        <form class=" col-start-2 row-start-1  self-center bg-amber-700 p-0.5 mb-1 rounded-lg text-gray-200 hover:text-gray-400 flex justify-center" method="POST" action="{{ route('rent_product', $product_table->id)}}"">
                            {{ csrf_field() }}
                            <button >Rent me</button>
                        </form>
                            <p class=" col-start-2 justify-self-end text-gray-600 w-[200px]">{{ $product_table->availableFrom}} - {{ $product_table->availableTill}}</p>
                    </div>
                </article>
            </section>
            @endforeach 
        </article>
    
    </body>
</html>
