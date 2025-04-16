

<x-app>
    <div class="h-screen flex">
        <section id="sidebar" class="h-full w-96 flex-1 bg-[#363062]">
            <a href="">
                <h1 class="text-4xl p-4 text-white">Dashboard</h1>
            </a>
            <ul class="ml-3 pt-10 text-white">
                <li class="p-3 hover:bg-white hover:text-black {{ request()->is('admin/laporan*') ? 'bg-white text-black' : '' }}">
                    <a href="/admin/laporan">Laporan</a>
                </li>
                <li class="p-3 hover:bg-white hover:text-black {{ request()->is('admin/menu*') ? 'bg-white text-black' : '' }}">
                    <a href="/admin/menu">Menu</a>
                </li>
                <li class="p-3 hover:bg-white hover:text-black {{ request()->is('admin/order*') ? 'bg-white text-black' : '' }}">
                    <a href="/admin/order">Order</a>
                </li>
                <li class="p-3 hover:bg-white hover:text-black {{ request()->is('admin/kategori*') ? 'bg-white text-black' : '' }}">
                    <a href="/admin/kategori">Kategori</a>
                </li>
                <li class="p-3 hover:bg-white hover:text-black {{ request()->is('admin/pelanggan*') ? 'bg-white text-black' : '' }}">
                    <a href="/admin/pelanggan">Data Pelanggan</a>
                </li>
            </ul>
        </section>

        <section id="main" class="h-full w-full flex flex-col">
            <section id="navbar" class="h-14 bg-[#F99417] text-blue p-2 flex items-center">
                <h1 class="text-3xl ml-3 grow">Admin RestoKu</h1>
                <div class="text-xl mr-3 p-2">
                    <a class="hover:underline cursor-pointer" href="{{ route('signout') }}">Logout</a>
                </div>
            </section>
            <section id="contents" class="flex-grow p-8 overflow-auto">
                {{ $slot }}
            </section>
        </section>
    </div>
</x-app>
