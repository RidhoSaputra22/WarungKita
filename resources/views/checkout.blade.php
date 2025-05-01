<x-app>
    <x-navbar></x-navbar>



    <section class="h-auto p-5 md:p-10 lg:px-32 bg-gray-100">
        <div class="bg-white w-full min-h-screen rounded-xl shadow-xl flex flex-col justify-center items-center text-center px-6 py-12">
            @if ($isDriverConfirm)

            <div>
                <!-- Icon Driver -->
                <div class="mb-6">
                    <div class="flex justify-center">
                        <div class="  flex items-center justify-center text-white text-[5rem] font-bold ">
                            ✔️
                        </div>
                    </div>
                    <h1 class="mt-4 text-2xl font-semibold text-gray-800">Pesanan Telah Sampai</h1>
                </div>

                <!-- Status -->
                <div class="mb-8">
                    <p class="text-gray-600 text-lg">Pesanan Telah Sampai, Mohon Konfirmasi</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/riwayat" class="flex-1">
                        <div class="bg-white border hover:shadow-xl text-black border-red-900   py-2 px-6 rounded-lg transition duration-300">
                            Lihat Detail
                        </div>
                    </a>
                    @if ($isUserConfirm)

                    <form action="" method="get" class="flex-1">
                        @csrf
                        <button class="w-full bg-red-900 hover:shadow-xl text-white  py-2 px-6 rounded-lg transition duration-300">
                            Konfirmasi
                        </button>
                    </form>
                    @endif
                </div>

            </div>
            @else
            <div>
                <!-- Icon Driver -->
                <div class="mb-6">
                    <div class="flex justify-center">
                        <div class="  flex items-center justify-center text-white text-[5rem] font-bold ">
                            🚗
                        </div>
                    </div>
                    <h1 class="mt-4 text-2xl font-semibold text-gray-800">Driver Sedang Menuju Lokasi</h1>
                </div>

                <!-- Status -->
                <div class="mb-8">
                    <p class="text-gray-600 text-lg">Pesanan Dalam Perjalanan</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/riwayat" class="flex-1">
                        <div class="bg-white border hover:shadow-xl text-black border-red-900   py-2 px-6 rounded-lg transition duration-300">
                            Lihat Detail
                        </div>
                    </a>
                    @if ($isUserConfirm)

                    <form action="" method="get" class="flex-1">
                        @csrf
                        <button class="w-full bg-red-900 hover:shadow-xl text-white  py-2 px-6 rounded-lg transition duration-300">
                            Konfirmasi
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            @endif

        </div>
    </section>


    <x-footter></x-footter>


</x-app>
