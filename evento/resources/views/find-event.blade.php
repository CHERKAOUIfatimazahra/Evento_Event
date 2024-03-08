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
                    <button id="searchBtn"
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--saorch--}}
    <script> 
        $(document).ready(function() {
            $('#searchForm').submit(function(e) {
                e.preventDefault();
                var search_input = $('#default-search').val();
                var token = $("meta[name='csrf-token']").attr("content");
                var category = $("#category").val();
                console.log(category)
                $.ajax({
                    type: 'GET',
                    url: '/search',
                    header: {
                        'XSRF-TOKEN': token
                    },
                    data: {
                        search_input: search_input,
                        category: category
                    },
                    success: function(response) {
                        table_post_row(response.events);
                    }
                });
            });

            function table_post_row(events) {
                  $("#placeSearchResult").html("");
              if (events) {
                    events.forEach(event => {
                        $("#placeSearchResult").append(`
                <div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
                    <div class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
                        <img src="http://127.0.0.1:8000/uploads/events/${event.image}" alt="${event.name}" class="rounded-xl w-full h-48 object-cover" />
                        <div class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60"></div>
                        <button class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-dark="true">
                            <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 w-6">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="mb-3 flex items-center justify-between">
                            <h3 class="block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">${event.title}</h3>
                            <p class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="-mt-0.5 h-5 w-5 text-yellow-700">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd"></path>
                                </svg>
                                ${event.type}
                            </p>
                        </div>
                        
                        <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">${event.start_datetime}</p>
                        <P class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">${event.price}DH</p>

                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Read more</button>
                    </div>
                    <div class="p-6 pt-3">
                        <button class="block w-full select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" data-ripple-light="true">Reserve</button>
                    </div>
                </div>
                `);

                    });
                }
               else {
                $("#placeSearchResult").html(`<p>No events found</p>`);
                } 

            }

        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
