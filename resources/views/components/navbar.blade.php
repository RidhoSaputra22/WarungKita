<div class=" h-14 flex gap-1 p-4 px-14 font-light shadow-xl opacity-90 backdrop-blur-[0%]  text-white">
    <div>
        <a class=" cursor-pointer" href="/"><strong>Warung Kita</strong></a>
    </div>
    <div class="flex grow flex-row-reverse gap-3">
        <div class="flex gap-10  ">
            <a class="hover:underline cursor-pointer" href="/"><strong>Home</strong></a>
            <a class="hover:underline cursor-pointer" href="/menu"><strong>Menu</strong></a>
            @if (Auth::check())
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="normal-case text-black bg-blue-900 hover:bg-blue-50 transition duration-300  rounded-sm py-1 px-5 text-white inline-flex items-center"
                    type="button">{{ ucfirst(Auth::user()['nama_212396']) }} <svg class="w-2.5 h-2.5 ms-3"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="/profile"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                        </li>
                        <li>
                            <a href="/logout"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
            @else
                <a href="/login" class=""><span
                        class="rounded-sm bg-red-800 transition duration-300 py-1 px-5 text-white">Login</span></a>
            @endif

        </div>
    </div>

</div>
