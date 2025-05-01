<x-app>
    <x-navbar>

    </x-navbar>

    <div class="container mx-auto px-4 py-8 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Pemesanan</h1>

        <!-- Daftar Pesanan -->
        <div class="space-y-4 grid grid-col-4" >
            @forelse ($datas as $data )
                 <!-- Pesanan 1 -->
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex flex-col md:flex-row justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold">#{{ $data['kode_222339'] }}</h2>
                        <p class="text-sm text-gray-600">{{ $data['tanggal_222339'] }}</p>
                    </div>
                    <div class="mt-2 md:mt-0">
                        <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">{{ $data['status_222339'] }}</span>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <img src="{{ $data->menu['foto_222339'] }}" alt="Produk" class="w-14 h-14 object-cover rounded">
                        <div class="flex-1">
                            <h3 class="font-medium">{{ $data->menu['nama_222339'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $data['jumlah_222339'] }}x @ Rp {{ number_format($data->menu['harga_222339']) }}</p>
                            <p class="text-sm text-gray-600">Total: Rp {{ number_format($data->menu['total_222339']) }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end gap-3">
                    <a class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50" href="/detail/{{ $data['id_menu_222339'] }}" >Detail</a>
                    @if ($data['status_222339'] == "selesai")
                        <a class="px-4 py-2 text-sm bg-red-900 text-white rounded-lg hover:bg-red-900" href="/AddToCart/{{ $data['id_menu_222339'] }}">Beli Lagi</a>
                    @else
                        <a class="px-4 py-2 text-sm bg-red-900 text-white rounded-lg hover:bg-red-900" href="/cart">Checkout</a>

                    @endif
                </div>
            </div>

            @empty

            <h1>Tak ada data</h1>

            @endforelse
        </div>
    </div>

    <x-footter>

    </x-footter>
</x-app>
