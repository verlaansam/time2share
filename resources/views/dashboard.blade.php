<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="w-screen  shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] shadow-lg"> 
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex justify-center p-6  ">
                <div class="p-6 text-gray-900  w-2/4 bg-gray-200 p-1 m-3 rounded-xl flex justify-center flex-col ">
                    <h1 class="self-center text-amber-700 text-3xl font-medium">Add Product</h1>
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
                        <button value="Submit" id="submit" class="bg-amber-700 p-1 m-1 rounded-lg text-gray-200 hover:text-gray-400 self-center col-span-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center flex-col  bg-white shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] ">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">My reviews</h1>
            <article class="w-screen flex flex-wrap">
                @if ($review->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($review as $review_table)
                <section class="flex items-center justify-center h-[250px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[80%] rounded-xl shadow-lg">
                        <p class="w-full h-full  p-2 rounded-t-xl flex justify-center items-center">{{ $review_table->review}}</p>
                    </article>
                </section>
                @endforeach
            </article>
        </div>
        <div class="flex justify-center flex-col">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">For Rent</h1>
            <article class=" h-fit w-screen flex flex-wrap">
                @if ($product->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($product as $product_table)
                <section class="flex items-center justify-center h-[400px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <img class="w-full h-[80%] bg-green-500 rounded-t-xl" src="{{ route('image_show', ['imageName' => $product_table->name]) }}" alt="Your Image">
                        <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file_upload">
                            <button type="submit">Upload</button>
                        </form>
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
        <div class="flex justify-center flex-col bg-white shadow-lg shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] ">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">My Requests</h1>
            <article class="h-fit w-screen flex flex-wrap">
                @if ($product_request->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($product_request as $product_table)
                <section class="flex items-center justify-center h-[400px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <img class="w-full h-[80%] bg-green-500 rounded-t-xl" src="{{ route('image_show', ['imageName' => 'spork.jpg']) }}" alt="Your Image">
                        <div class=" h-1/6 grid grid-cols-2 m-1">
                            <h1 class="text-4xl text-amber-700">{{ $product_table->name}}</h1>
                            <p class="col-start-1 text-gray-600">{{ $product_table->location}}</p>
                            <p class=" col-start-2 justify-self-end text-gray-600  w-[200px]">{{ $product_table->availableFrom}} / {{ $product_table->availableTill}}</p> 
                        </div>
                        <form class=" relative bottom-[16%] left-[34%] self-center bg-amber-700 p-0.5 mb-1 rounded-lg text-gray-200 hover:text-gray-400 w-[100px] flex justify-center" method="POST" action="{{ route('accept_product', $product_table->id)}}"">
                            {{ csrf_field() }}
                            <button>Accept</button>
                        </form>
                        <form class=" relative bottom-[25.5%] left-[67%]  box-border self-center p-0.5 mb-1 rounded-lg text-gray-600 hover:text-gray-400 border-2 border-amber-700 w-[100px] flex justify-center" method="POST" action="{{ route('decline_product', $product_table->id)}}"">
                            {{ csrf_field() }}    
                            <button>Decline</button>
                        </form>
                        </div>
                    </article>
                </section>
                @endforeach 
            </article>
        </div>
        <div class="flex justify-center flex-col ">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">Rented out</h1>
            <article class=" h-fit w-screen flex flex-wrap">
                @if ($product_rented_out->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($product_rented_out as $product_table)
                <section class="flex items-center justify-center h-[400px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <img class="w-full h-[80%] bg-green-500 rounded-t-xl" src="{{ route('image_show', ['imageName' => 'spork.jpg']) }}" alt="Your Image">
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
        <div class="flex justify-center flex-col bg-white shadow-lg shadow-[rgba(0,0,0,0.1)_10px_-10px_4px_0px] ">
            <h1 class="text-amber-700 text-3xl font-medium pl-5 pt-3">I Rent</h1>
            <article class=" h-fit w-screen flex flex-wrap">
                @if ($product_rented->isEmpty())
                    <section class="flex items-center justify-center content-center h-[400px] w-screen">
                        <h1 class="text-orange-200 text-3xl">Looks like no one's home :(</h1>
                    </section> 
                @endif
                @foreach ($product_rented as $product_table)
                <section class="flex items-center justify-center h-[400px] w-[350px]">
                    <article class="bg-gray-200 w-[90%] h-[90%] rounded-xl shadow-lg">
                        <img class="w-full h-[80%] bg-green-500 rounded-t-xl" src="{{ route('image_show', ['imageName' => 'spork.jpg']) }}" alt="Your Image">
                        <div class=" h-1/6 grid grid-cols-2 m-1">
                            <h1 class="text-4xl text-amber-700">{{ $product_table->name}}</h1>
                            <p class="col-start-1 text-gray-600">{{ $product_table->location}}</p>
                            <p class=" col-start-2 justify-self-end text-gray-600  w-[200px]">{{ $product_table->availableFrom}} / {{ $product_table->availableTill}}</p> 
                            <button class="relative bottom-[57px] left-[135px] bg-amber-700 p-1 self-center rounded-lg text-gray-200 hover:text-gray-400" onclick="openModal('modelConfirm')">
                                <p>leave a review</p>
                            </button>
                             <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                                <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md p-4">
                                   <form method="POST" action="{{ route('review_table')}}">
                                        {{ csrf_field() }}
                                        <label for="userId" style="display: none">userId:</label><br>
                                        <input type="text" id="userId" name="userId" value="{{$product_table->userId}}" style="display: none"><br>
                                        <label for="review">Write your review</label><br>
                                        <textarea name="review" id="review" cols="30" rows="4"></textarea>
                                        <br>
                                        <button value="Submit" id="submit" class=" bg-amber-700 p-1 self-center rounded-lg text-gray-200 hover:text-gray-400">
                                            <p>submit</p>
                                        </button>
                                    </form>
                                    
                                </div>
                            </div>
                            
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
<script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
