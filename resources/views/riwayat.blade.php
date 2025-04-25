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
                        <h2 class="text-lg font-semibold">#{{ $data['222339_kode'] }}</h2>
                        <p class="text-sm text-gray-600">{{ $data['222339_tanggal'] }}</p>
                    </div>
                    <div class="mt-2 md:mt-0">
                        <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-800">{{ $data['222339_status'] }}</span>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex flex-col md:flex-row gap-4">
                        <img src="{{ $data->menu['222339_foto'] }}" alt="Produk" class="w-14 h-14 object-cover rounded">
                        <div class="flex-1">
                            <h3 class="font-medium">{{ $data->menu['222339_nama'] }}</h3>
                            <p class="text-sm text-gray-600">{{ $data['222339_jumlah'] }}x @ Rp {{ number_format($data->menu['222339_harga']) }}</p>
                            <p class="text-sm text-gray-600">Total: Rp {{ number_format($data->menu['222339_total']) }}</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end gap-3">
                    <a class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50" href="/detail/{{ $data['222339_id_menu'] }}" >Detail</a>
                    @if ($data['222339_status'] == "sukses")
                        <a class="px-4 py-2 text-sm bg-red-900 text-white rounded-lg hover:bg-red-900" href="/AddToCart/{{ $data['222339_id_menu'] }}">Beli Lagi</a>
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
