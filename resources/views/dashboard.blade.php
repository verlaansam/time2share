<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-screen  shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] shadow-lg">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center  ">
                <div class="p-6 text-gray-900  w-2/4 bg-gray-200 p-1 m-3 rounded-xl flex justify-center flex-col">
                    <h1 class="self-center text-amber-700 text-3xl font-medium">Add Procduct</h1>
                    <form class="grid grid-cols-2" method="POST" action="{{ route('product_table')}}"">
                        {{ csrf_field() }}
                        <div>
                        <label for="name">title:</label><br>
                        <input type="text" id="name" name="name" value="spork"><br>
                        <label for="location">location:</label><br>
                        <input type="text" id="location" name="location" value="location"><br>
                        <label for="catagorie">Choose a catagorie:</label><br>
                        <select id="catagorie" name="catagorie">
                            <option value="utensils">utensils</option>
                            <option value="gardening">gardening</option>
                            <option value="travel">travel equipment</option>
                            <option value="sportsLessure">sports and lessure</option>
                        </select><br>
                        </div>
                        <div class="pl-1">
                        <label for="image">image:</label><br>
                        <input class="bg-amber-700 p-1 m-1 rounded-lg text-gray-200 hover:text-gray-400" type="file" id="image" name="image" value="image" accept="image/png, image/jpeg"><br>
                        <label for="availableFrom">availableFrom:</label><br>
                        <input type="date" id="availableFrom" name="availableFrom" value="availableFrom"><br>
                        <label for="availableTill">availableTill:</label><br>
                        <input type="date" id="availableTill" name="availableTill" value="availableTill"><br>      
                        </div>
                        <button value="Submit" class="bg-amber-700 p-1 m-1 rounded-lg text-gray-200 hover:text-gray-400 self-center col-span-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center flex-col">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">My Products</h1>
            <article class="h-fit w-screen">
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
        </div>
        <div class="flex justify-center flex-col bg-white shadow-lg shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px]">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">My Requests</h1>
            <article class="h-fit w-screen">
                <section class="flex items-center justify-center w-1/4 h-[400px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <p class="w-full h-[80%] bg-green-500 rounded-t-xl">meloen.png</p>
                        <div class=" h-1/6 grid grid-cols-2  grid-rows-2 m-1">
                            <h1 class="text-4xl text-amber-700 ">naam</h1>
                            <p class="col-start-1 row-span-2 text-gray-600">datum</p>
                            <button class=" col-start-2 row-start-1  self-center bg-amber-700 p-0.5 mb-1 rounded-lg text-gray-200 hover:text-gray-400">Accept</button>
                            <button class=" col-start-2  self-centerp-0.5 mb-1 rounded-lg text-gray-600 hover:text-gray-400 border-2 border-amber-700 ">Decline</button>
                        </div>
                    </article>
                </section>
            </article>
        </div>
        <div class="flex justify-center flex-col ">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">Hired</h1>
            <article class="h-fit w-screen">
                <section class="flex items-center justify-center w-1/4 h-[400px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <p class="w-full h-[80%] bg-green-500 rounded-t-xl">meloen.png</p>
                        <div class=" h-1/6 grid grid-cols-2  grid-rows-2 m-1">
                            <h1 class="text-4xl text-amber-700 ">naam</h1>
                            <p class="col-start-1 row-span-2 text-gray-600">datum</p>
                        </div>
                    </article>
                </section>
            </article>
        </div>
    </div>
</x-app-layout>
