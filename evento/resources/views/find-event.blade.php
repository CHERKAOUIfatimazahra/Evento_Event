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
            <form>
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
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>
        </div>
        <div>
            <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
                <h1 class="text-3xl font-bold p-6">Find your events</h1>
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
            <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
                <h1 class="text-3xl font-bold p-6">Find your events</h1>
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
            <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
                <h1 class="text-3xl font-bold p-6">Find your events</h1>
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
@endsection
