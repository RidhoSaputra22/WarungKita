<x-app>
    <x-navbar>

    </x-navbar>

    <div class="container min-h-screen px-4 py-8 mx-auto">
        <h1 class="mb-6 text-2xl font-bold text-gray-800">Riwayat Pemesanan</h1>

        <!-- Daftar Pesanan -->
        <div class="grid space-y-4 grid-col-4">
            @forelse ($datas as $data)
                <!-- Pesanan 1 -->
                <div class="p-6 bg-white rounded-lg shadow">
                    <div class="flex flex-col justify-between mb-4 md:flex-row">
                        <div>
                            <h2 class="text-lg font-semibold">#{{ $data['kode_222339'] }}</h2>
                            <p class="text-sm text-gray-600">{{ $data['tanggal_222339'] }}</p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span
                                class="px-3 py-1 text-sm text-green-800 bg-green-100 rounded-full">{{ $data['status_222339'] }}</span>
                        </div>
                    </div>
                    <div class="pt-4 border-t">
                        <div class="flex flex-col gap-4 md:flex-row">
                            <img src="{{ $data->menu['foto_222339'] }}" alt="Produk"
                                class="object-cover rounded w-14 h-14">
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $data->menu['nama_222339'] }}</h3>
                                <p class="text-sm text-gray-600">{{ $data['jumlah_222339'] }}x @ Rp
                                    {{ number_format($data->menu['harga_222339']) }}</p>
                                <p class="text-sm text-gray-600">Total: Rp
                                    {{ number_format($data->menu['total_222339']) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <a class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50"
                            href="/detail/{{ $data['id_menu_222339'] }}">Detail</a>
                        @if ($data['status_222339'] == 'selesai')
                            <a class="px-4 py-2 text-sm text-white bg-red-900 rounded-lg hover:bg-red-900"
                                href="/AddToCart/{{ $data['id_menu_222339'] }}">Beli Lagi</a>
                        @else
                            <a class="px-4 py-2 text-sm text-white bg-red-900 rounded-lg hover:bg-red-900"
                                href="/cart">Checkout</a>
                        @endif
                    </div>
                </div>

            @empty

                <h1>Tak ada data</h1>
            @endforelse
        </div>
    </div>

</x-app>
