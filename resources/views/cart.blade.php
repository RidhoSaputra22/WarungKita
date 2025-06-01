<x-app>
    <x-navbar></x-navbar>



    <section class="h-auto p-5 bg-gray-100 md:p-10 lg:px-32">
        @if (session('error'))
            <div class="p-3 bg-red-500 h-14">
                <p class="text-2xl">{{ session('error') }}</p>
            </div>
        @endif

        <section class="flex flex-col gap-5 lg:flex-row">
            <div class="w-full px-4 py-3 bg-white border border-gray-300 rounded-sm shadow-sm">
                <div>
                    <h1 class="mb-4 text-2xl md:text-4xl">Keranjang</h1>
                </div>

                @forelse ($datas as $data)
                    <div class="w-full py-3">
                        <div class="flex w-full gap-3 py-2">
                            <div class="h-20 bg-no-repeat bg-contain rounded-sm aspect-square md:w-32 md:h-32"
                                style="background-image: url('{{ URL::asset($data->menu['foto_222339']) }}')"></div>
                            <div class="w-full">
                                <div class="flex w-full">
                                    <div class="flex-1">
                                        <div class="text-sm font-semibold uppercase md:text-lg">
                                            {{ $data->menu['nama_222339'] }}</div>
                                        <div class="text-sm text-gray-600 md:text-lg">STOK:
                                            {{ $data->menu['stok_222339'] }}</div>
                                    </div>
                                    <div>
                                        <a href="/DestroyFormCart/{{ $data['id_carts_222339'] }}"
                                            class="flex items-center justify-center text-sm leading-none text-white bg-red-900 border rounded-sm shadow h-7 aspect-square md:text-lg">
                                            &times
                                        </a>
                                    </div>
                                </div>
                                <div class="flex w-full gap-3 my-2">
                                    <div class="text-sm font-normal grow md:text-lg">Rp.
                                        {{ number_format($data['total_222339']) }}</div>
                                    <div class="flex">
                                        <a href="/AddToCart/{{ $data->menu['nama_222339'] }}"
                                            class="flex items-center justify-center text-sm leading-none text-white bg-red-900 border rounded-sm shadow h-7 aspect-square">&#43</a>
                                        <span class="px-3">{{ $data['jumlah_222339'] }}</span>
                                        <a href="/DelFormCart/{{ $data['kode_222339'] }}"
                                            class="flex items-center justify-center text-sm leading-none text-white bg-red-900 border rounded-sm shadow h-7 aspect-square">&#8722</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h1>Tak Ada Data</h1>
                    <a href="/menu" class="underline">Silahkan Berbelanja</a>
                @endforelse


            </div>
            <div class="w-full px-4 py-3 bg-white border border-gray-300 rounded-sm shadow-sm">
                <div class="">
                    <div class="flex">
                        <span>Subtotal:</span>
                        <span class="ml-auto">Rp. {{ number_format($datas->sum('total_222339')) }}</span>
                    </div>
                    <div class="flex">
                        <span>Biaya Pengiriman:</span>
                        <span class="ml-auto">Rp. {{ $datas->sum('total_222339') == 0 ? '0' : '5,000' }}</span>
                    </div>
                    <div class="flex">
                        <span>Total:</span>
                        <span class="ml-auto">Rp.
                            {{ $datas->sum('total_222339') == 0 ? '0' : number_format($datas->sum('total_222339') + 5000) }}</span>
                    </div>

                </div>
                <div class="py-3">
                    <div class="flex flex-col gap-2">
                        <div>
                            <h1>Nama</h1>
                            <input type="text" name="nama" class="w-full p-2 mt-1 border border-black rounded"
                                value="{{ Auth::user()['nama_222339'] }}" readonly>
                        </div>
                        <div class="grow">
                            <h1>Alamat</h1>
                            <input type="text" name="alamat" value="{{ Auth::user()['alamat_222339'] }}"
                                class="w-full p-2 mt-1 border border-black rounded" readonly>
                        </div>
                        <div class="">
                            <h1>No Hp</h1>
                            <input type="text" name="hp" value="{{ Auth::user()['hp_222339'] }}"
                                class="w-full p-2 mt-1 border border-black rounded" readonly>
                        </div>

                        <button onclick="pay()"
                            class="px-3 py-1 mt-5 text-sm font-light text-white bg-red-900">Checkout</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full px-4 py-3 py-4 mt-5 bg-white border border-gray-300 rounded-sm shadow-sm">
            <div>
                <h1 class="mb-4 text-2xl md:text-4xl">Rekomendasi</h1>
                <hr>
            </div>

            <div class="grid h-auto grid-cols-1 gap-5 py-5 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($menus as $data)
                    <a href="/detail/{{ $data['nama_222339'] }}" class="p-2">
                        <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                            style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">
                            <div class="flex flex-col h-40 p-3 px-6 py-5 bg-white rounded-b rounded-t-xl">
                                <div class="flex justify-between">
                                    <span class="text-sm">{{ $data['stok_222339'] }} tersisa</span>
                                    <span
                                        class="px-4 py-1 text-sm text-white bg-red-900 rounded-sm">{{ $data->kategori['kategori_222339'] }}</span>
                                </div>
                                <span class="text-2xl font-semibold">{{ $data['nama_222339'] }}</span>
                                <span class="text-sm font-light">{{ Str::limit($data['deskripsi_222339'], 70) }}</span>
                                <span class="text-lg">Rp. {{ number_format($data['harga_222339']) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

    </section>


    <x-footter></x-footter>

    @if ($datas->isNotEmpty())
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-v8ivrdimz1oDhdI7"></script>
        <script type="text/javascript">
            function pay() {
                console.log('s');

                // SnapToken acquired from previous step
                snap.pay('{{ $snapToken }}', {
                    // Optional
                    onSuccess: function(result) {
                        console.log(result['order_id']);
                        window.location.href = '/checkout/' + result['order_id'];
                    },
                    // Optional
                    onPending: function(result) {
                        console.log('s');
                    },
                    // Optional
                    onError: function(result) {
                        console.log('s');
                    }
                });
            };
        </script>
    @endif


</x-app>
