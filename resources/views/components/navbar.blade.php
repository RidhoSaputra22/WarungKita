<div class=" bg-red-900 text-white  h-14 w-full flex gap-1 py-4 px-9 sm:px-14 font-light shadow-xl opacity-90 backdrop-blur-[0%] ">
    <div>
        <a class=" cursor-pointer" href="/"><strong>Warung Kita</strong></a>
    </div>
    <div class="flex grow flex-row-reverse gap-3">
        <div class="flex gap-10  ">
            <a class="hidden sm:block hover:underline cursor-pointer" href="/"><strong>Home</strong></a>
            <a class="hidden sm:block hover:underline cursor-pointer" href="/menu"><strong>Menu</strong></a>
            @if (Auth::check())
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="normal-case bg-red-900 hover:bg-blue-50 transition duration-300  rounded-sm py-1 px-5 text-white inline-flex items-center"
                    type="button">{{ ucfirst(Auth::user()['nama_222339']) }} <svg class="w-2.5 h-2.5 ms-3"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden divide-y divide-red-900 rounded-lg shadow-sm w-44 dark:bg-red-900">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="/riwayat"
                                class="block px-4 py-2 hover:bg-red-900 dark:hover:bg-red-900 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="/signout"
                                class="block px-4 py-2 hover:bg-red-900 dark:hover:bg-red-900 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class=""><span
                        class="rounded-sm transition duration-300 py-1 px-5 text-white">Login</span></a>
            @endif

        </div>
    </div>

</div>
