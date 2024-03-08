<header class='shadow-md py-2 px-2 sm:px-10 bg-white font-[sans-serif] min-h-[70px]'>
    <div class='flex flex-wrap items-center justify-between gap-5 relative'>
        <a href="/">
            <img src="images/evento.png" alt="logo" class='w-20 h-20 p-5' />
        </a>
        <div class='flex lg:order-1 max-sm:ml-auto'>
            @guest
                <a href="{{ route('login') }}"
                    class='px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff]'>
                    Login</a>
                <a href="{{ route('register') }}"
                    class='px-4 py-2 text-sm rounded-full font-bold text-white border-2 border-[#007bff] bg-[#007bff] transition-all ease-in-out duration-300 hover:bg-transparent hover:text-[#007bff] ml-3'>
                    Sign up</a>
            @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="inline-flex items-center justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm transition-all duration-150 hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
                <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg" alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown">
                    <div class="py-3 px-4">
                        <span class="block text-sm font-semibold text-gray-900 dark:text-white">{{auth()->user()->name}}</span>
                        <span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{auth()->user()->email}}</span>
                    </div>
                    <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                        
                        <li>
                            <a href="/profile" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                                My profile</a>
                        </li>
                        @if(auth()->user()->hasRole('admin'))
                        <li>
                            <a href="{{ route('events.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                                Events</a>
                        </li>
                        @endif
                        @if(auth()->user()->hasRole('organizer'))
                        <a href="{{ route('events.index') }}" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                            My Events</a>
                        @endif
                        @if(auth()->user()->hasRole('spectator'))
                        <a href="{{ route('user.reservations', ['userId' => auth()->user()->id]) }}" class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                            My reservations</a>
                        @endif
                    </ul>
                    
                    <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                        <li>
                            <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                             class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                        </li>
                    </ul>
                </div>
            @endguest
            <button id="toggle" class='lg:hidden ml-7'>
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <ul id="collapseMenu" class='lg:!flex lg:space-x-5 max-lg:space-y-2 max-lg:hidden max-lg:py-4 max-lg:w-full'>
            <li class='max-lg:border-b max-lg:bg-[#007bff] max-lg:py-2 px-3 max-lg:rounded'>
                <a href='/'
                    class='lg:hover:text-[#007bff] text-[#007bff] max-lg:text-white block font-semibold text-[15px]'>Home</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='/find-event'
                    class='lg:hover:text-[#007bff] text-gray-500 block font-semibold text-[15px]'>Find Events</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                    class='lg:hover:text-[#007bff] text-gray-500 block font-semibold text-[15px]'>Create Events</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='javascript:void(0)'
                    class='lg:hover:text-[#007bff] text-gray-500 block font-semibold text-[15px]'>About Us</a>
            </li>
            <li class='max-lg:border-b max-lg:py-2 px-3 max-lg:rounded'><a href='/contact'
                    class='lg:hover:text-[#007bff] text-gray-500 block font-semibold text-[15px]'>Contact Us</a>
            </li>

        </ul>
        
    </div>
</header>
