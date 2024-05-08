<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="flex justify-center flex-col">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">Users</h1>
            <article class=" h-fit w-screen flex flex-wrap">
                @if ($users->isEmpty())
                    <section class="flex items-center justify-center content-center h-[200px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($users as $user)
                <section class="flex items-start justify-center h-[75px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[100%] rounded-xl shadow-lg p-4">
                        <p>{{$user->name}}</p>
                        <p>{{$user->email}}</p>
                        <form class="relative bottom-[97%] left-[88%]" method="POST" action="{{ route('delete_user', $user->id)}}"">
                            {{ csrf_field() }}
                            <button ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            </button>
                        </form>
                    </article>
                </section>
                @endforeach 
            </article>
        </div>
        <div class="flex justify-center flex-col">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">Products</h1>
            <article class=" h-fit w-screen flex flex-wrap">
                @if ($product->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($product as $product_table)
                <section class="flex items-center justify-center h-[400px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <p class="w-full h-[80%] bg-green-500 rounded-t-xl">{{ $product_table->status}}</p>
                        <div class=" h-1/6 grid grid-cols-2 m-1">
                            <h1 class="text-4xl text-amber-700">{{ $product_table->name}}</h1>
                            <p class="col-start-1 text-gray-600">{{ $product_table->location}}</p>
                            <p class=" col-start-2 justify-self-end text-gray-600  w-[200px]">{{ $product_table->availableFrom}} / {{ $product_table->availableTill}}</p> 
                        </div>
                        <form class="relative bottom-[97%] left-[88%]" method="POST" action="{{ route('delete_product', $product_table->id)}}"">
                            {{ csrf_field() }}
                            <button ><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            </button>
                        </form>
                    </article>
                </section>
                @endforeach
            </article>
        </div>
    </div>
</x-app-layout>
