@extends('layout.app')

@section('content')
    <section class="">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-100 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events1.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events2.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events3.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events4.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events5.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 6 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events6.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 7 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events7.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
                    data-carousel-slide-to="5"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7"
                    data-carousel-slide-to="6"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>

    <section class="bg-gray-100 py-6 p-20">
        <div class="container relative z-40 mx-auto mt-12">
            <div class="flex flex-wrap justify-center mx-auto lg:w-full md:w-5/6 xl:shadow-small-blue">

                <!-- Business Events -->
                <a href="/business" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-briefcase fa-2xl" style="color: #2f08a4;"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Business
                        </p>
                    </div>
                </a>

                <!-- Social Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="social_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Social
                        </p>
                    </div>
                </a>

                <!-- Cultural Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="cultural_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Cultural
                        </p>
                    </div>
                </a>

                <!-- Educational Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="educational_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Educational Events
                        </p>
                    </div>
                </a>

                <!-- Sporting Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="sporting_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Sporting Events
                        </p>
                    </div>
                </a>

                <!-- Charity Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="charity_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Charity Events
                        </p>
                    </div>
                </a>

                <!-- Entertainment Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="entertainment_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Entertainment Events
                        </p>
                    </div>
                </a>

                <!-- Gaming Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="gaming_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Gaming Events
                        </p>
                    </div>
                </a>

                <!-- Anime Events -->
                <a href="#" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <img src="anime_events_icon_url" class="block mx-auto">
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Anime Events
                        </p>
                    </div>
                </a>

            </div>
        </div>
    </section>

    {{-- section for filter and events carts --}}
    <section>
        {{-- start filter --}}
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            <form action="" method="GET">
                <button type="submit" name="category" value="all"
                    class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                    All categories</button>
            </form>
            <form action="" method="GET">
                <button type="submit" name="category" value="shoes"
                    class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                    Shoes</button>
            </form>
            <form action="" method="GET">
                <button type="submit" name="category" value="bags"
                    class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                    Bags</button>
            </form>
            <form action="" method="GET">
                <button type="submit" name="category" value="electronics"
                    class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                    Electronics</button>
            </form>
            <form action="" method="GET">
                <button type="submit" name="category" value="gaming"
                    class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                    Gaming</button>
            </form>
        </div>

        {{-- end filter --}}
        <div>
            <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
                <h1 class="text-center text-3xl font-bold">Find your events</h1>
                <div class="mx-auto max-w-screen-xl px-4 w-full">
                    <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
                        <div
                            class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                            <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                            </a>
                            <a href="" class="z-20 absolute h-full w-full top-0 left-0 ">&nbsp;</a>
                            <div class="h-auto overflow-hidden">
                                <div class="h-44 overflow-hidden relative">
                                    <img src="https://picsum.photos/400/400" alt="">
                                </div>
                            </div>
                            <div class="bg-white py-4 px-3">
                                <h3 class="text-xs mb-2 font-medium">Des cadeaux incroyables prêts à être utilisés dans
                                    votre prochain projet</h3>
                                <div class="flex justify-between items-center">
                                    <p class="text-xs text-gray-400">
                                        Lorem, ipsum dolor sit amet
                                    </p>
                                    <div class="relative z-40 flex items-center gap-2">
                                        <a class="text-orange-600 hover:text-blue-500" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                            </svg>
                                        </a>
                                        <a class="text-orange-600 hover:text-blue-500" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end section --}}

    <section class="relative py-32 lg:py-36 bg-white">
        <div class="mx-auto lg:max-w-7xl w-full px-5 sm:px-10 md:px-12 lg:px-5 flex flex-col lg:flex-row gap-10 lg:gap-12">
            <div class="absolute w-full lg:w-1/2 inset-y-0 lg:right-0 hidden lg:block">
                <span
                    class="absolute -left-6 md:left-4 top-24 lg:top-28 w-24 h-24 rotate-90 skew-x-12 rounded-3xl bg-orange-400 blur-xl opacity-60 lg:opacity-95 lg:block hidden"></span>
                <span class="absolute right-4 bottom-12 w-24 h-24 rounded-3xl bg-blue-600 blur-xl opacity-80"></span>
            </div>
            <span
                class="w-4/12 lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 absolute -top-5 lg:left-0 rounded-full skew-y-12 blur-2xl opacity-40 skew-x-12 rotate-90"></span>
            <div
                class="relative flex flex-col items-center text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none max-w-3xl mx-auto lg:mx-0 lg:flex-1 lg:w-1/2">
                <h1 class="text-3xl leading-tight sm:text-4xl md:text-5xl xl:text-6xl font-bold text-gray-900">
                    Events
                </h1>
                <p class="mt-8 text-gray-700">
                    "Ready to host your own event? Dive into our user-friendly platform and bring your ideas to life!
                    Whether it's a business meetup, a social gathering,
                    or a cultural showcase, create unforgettable experiences effortlessly.
                    Start planning now and make your event a reality!"
                </p>
                <div class="mt-10 w-full flex max-w-md mx-auto lg:mx-0">
                    <div class="flex sm:flex-row flex-col gap-5 w-full">
                        <a href="{{ route('register') }}"
                            class="flex text-white justify-center items-center w-max min-w-max sm:w-max px-6 h-12 rounded-full outline-none relative overflow-hidden border duration-300 ease-linear after:absolute after:inset-x-0 after:aspect-square after:scale-0 after:opacity-70 after:origin-center after:duration-300 after:ease-linear after:rounded-full after:top-0 after:left-0 after:bg-[#172554] hover:after:opacity-100 hover:after:scale-[2.5] bg-blue-600 border-transparent hover:border-[#172554]">
                            <span class="hidden sm:flex relative z-[5]">Start Creating Now</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="flex flex-1 lg:w-1/2 lg:h-auto relative lg:max-w-none lg:mx-0 mx-auto max-w-3xl">
                <img src="images/2.jpg" alt="Hero image" width="2350" height="2359"
                    class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96">
            </div>
        </div>
    </section>
@endsection
