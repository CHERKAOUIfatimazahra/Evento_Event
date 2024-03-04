<nav class="relative flex items-center justify-between sm:h-10 md:justify-center py-6 px-4 mt-2 m-3">
    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="" aria-label="Home">
                <img src="images/logo.png" height="150" width="150" />
            </a>
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button" id="main-menu" aria-label="Main menu" aria-haspopup="true"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="hidden md:flex md:space-x-10">
        <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
            <li>
                <a href="/"
                    class="block py-2 pl-3 pr-4 text-white bg-black font-bold text-gray-900 rounded lg:bg-transparent lg:text-black lg:p-0">
                    Home</a>
            </li>
            <li>
                <a href="/find-event"
                    class="block py-2 pl-3 pr-4 text-white bg-black font-bold text-gray-900 rounded lg:bg-transparent lg:text-black lg:p-0">
                    Find Events</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 pl-3 pr-4 text-white bg-black font-bold text-gray-900 rounded lg:bg-transparent lg:text-black lg:p-0">
                    Create Events</a>
            </li>
            <li>
                <a href="#"
                    class="block py-2 pl-3 pr-4 text-white bg-black font-bold text-gray-900 rounded lg:bg-transparent lg:text-black lg:p-0">
                    About Us</a>
            </li>
            <li>
                <a href="/contact"
                    class="block py-2 pl-3 pr-4 text-white font-bold text-gray-900 bg-black rounded lg:bg-transparent lg:text-black lg:p-0">
                    Contact Us</a>
            </li>
        </ul>
    </div>

    <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0 gap-3">
        @guest <!-- If user is a guest (not logged in) -->
            <a class="hidden items-center justify-center rounded-xl bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 transition-all duration-150 hover:bg-gray-50 sm:inline-flex"
                href="{{ route('login') }}">Sign in</a>
            <a class="inline-flex items-center justify-center rounded-xl bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                href="{{ route('register') }}">Register</a>
        @else
            <!-- If user is authenticated -->
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="inline-flex items-center justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @endguest
    </div>
</nav>
