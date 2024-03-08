@extends('layout.app')

@section('content')
    <section>
        <div class="w-full">
            <div class="flex bg-white" style="height:600px;">
                <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Build Your New <span
                                class="text-indigo-600">Event</span></h2>
                        <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur
                            adipisicing
                            elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi,
                            quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p>
                        <div class="flex justify-center lg:justify-start mt-6">
                            <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                                href="/register">Get Started</a>
                            <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400"
                                href="/about">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                    <div class="h-full object-cover" style="background-image: url('images/events1.jpg')">
                        <div class="h-full bg-black opacity-25"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-2xl mx-auto p-3">
            <form id="searchForm">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <input type="search" id="default-search"
                        class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500"
                        placeholder="Search Mockups, Logos..." required>
                    <button type="submit" id="searchBtn"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category
                    Name</label>
                <select id="category" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                     
                    <option value="0" selected>All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>

        </div>
        <div id="placeSearchResult">
            <div>
                <h1 class="text-center text-3xl font-bold">Find your events</h1>
                <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
                    <div class="flex flex-wrap justify-center">
                        @foreach ($publishedEvents as $event)
                            <div class="m-3">
                                <x-events-cards :event="$event"></x-events-cards>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            $('#searchForm').submit(function(e) {
                e.preventDefault();
                var search_input = $('#default-search').val();
                var token = $("meta[name='csrf-token']").attr("content");
                var category = $("#category").val();
                $.ajax({
                    type: 'GET',
                    url: '/search',
                    header: {
                        'XSRF-TOKEN': token
                    },
                    data: {
                        search_input: search_input
                        ,
                        category: category
                    },
                    success: function(response) {
                        table_post_row(response.events);
                    }
                });
            });
        });

        function table_post_row(events) {
            let htmlView = '';
            if (events.length <= 0) {
                htmlView += `<p>No events found</p>`;
            } else {
                $("#placeSearchResult").html("");
                events.forEach(event => {
                    $("#placeSearchResult").append(`
            <div>
    <div class="relative flex justify-center overflow-hidden bg-gray-200 py-6 sm:py-12">
        <div class="flex flex-wrap justify-center">
            <div class="m-3 max-w-xs md:max-w-2xl border border-white bg-white rounded-xl shadow-lg p-6">
                <div class="md:flex md:space-x-5 space-y-3 md:space-y-0">
                    <div class="md:w-1/3">
                        <img src="http://127.0.0.1:8000/uploads/events/${event.image}" alt="${event.name}"
                            class="rounded-xl w-full h-48 object-cover">
                    </div>
                    <div class="md:w-2/3 flex flex-col space-y-2 p-3">
                        <div class="flex justify-between item-center">
                            <p class="text-gray-500 font-medium hidden md:block">${event.category_id}</p>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <p class="text-gray-600 font-bold text-sm ml-1">
                                    ${event.type}
                                    <span class="text-gray-500 font-normal">(76 reviews)</span>
                                </p>
                            </div>
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div
                                class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                                ${event.type}
                            </div>
                        </div>
                        <h3 class="font-black text-gray-800 md:text-3xl text-xl">${event.name}</h3>
                        <p class="md:text-lg text-gray-500 text-base h-16 overflow-hidden">${event.description}</p>
                        <p class="text-xl font-black text-gray-800">
                            ${event.price}
                            <span class="font-normal text-gray-600 text-base">/night</span>
                        </p>
                        <div class="flex justify-center mt-4">
                            <form action="/events/${event.id}/reserve" method="POST">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Reserve Now
                                </button>
                            </form>
                            <form action="/single_page/${event}" method="GET">
                                @csrf
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                    Read more
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                `);


                });
            }

        }
    </script>
@endsection
