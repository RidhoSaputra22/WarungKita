<x-app>
    <x-navbar></x-navbar>



    <section class=" h-auto p-5 md:p-10 lg:px-32 bg-gray-100 ">
        @if (session('error'))
            <div class="h-14 bg-red-500 p-3">
                <p class="text-2xl">{{ session('error') }}</p>
            </div>
        @endif

        <section class=" flex flex-col lg:flex-row gap-5">
            <div class="w-full bg-white px-4 py-3 border border-gray-300 rounded-sm shadow-sm">
                <div>
                    <h1 class="text-2xl md:text-4xl mb-4">Keranjang</h1>
                </div>

                @forelse ($datas as $data)
                    <div class="py-3 w-full">
                        <div class="py-2 w-full flex  gap-3">
                            <div class=" h-20 rounded-sm aspect-square md:w-32 md:h-32 bg-contain bg-no-repeat"
                                style="background-image: url('{{ URL::asset($data->menu['foto_222339']) }}')"></div>
                            <div class="w-full">
                                <div class="w-full flex">
                                    <div class="flex-1">
                                        <div class="text-sm md:text-lg font-semibold uppercase">
                                            {{ $data->menu['nama_222339'] }}</div>
                                        <div class="text-sm md:text-lg text-gray-600">STOK:
                                            {{ $data->menu['stok_222339'] }}</div>
                                    </div>
                                    <div>
                                        <a href="/DestroyFormCart/{{ $data['id_carts_222339'] }}"
                                            class="h-7 aspect-square flex justify-center items-center leading-none text-sm md:text-lg rounded-sm bg-red-900 text-white shadow border">
                                            &times
                                        </a>
                                    </div>
                                </div>
                                <div class="w-full my-2 flex gap-3">
                                    <div class="grow text-sm md:text-lg  font-normal">Rp.
                                        {{ number_format($data['total_222339']) }}</div>
                                    <div class="flex">
                                        <a href="/AddToCart/{{ $data->menu['id_menu_222339'] }}"
                                            class="h-7 aspect-square flex justify-center items-center leading-none text-sm rounded-sm bg-red-900 text-white shadow border">&#43</a>
                                        <span class="px-3">{{ $data['jumlah_222339'] }}</span>
                                        <a href="/DelFormCart/{{ $data['id_carts_222339'] }}"
                                            class="h-7 aspect-square flex justify-center items-center leading-none text-sm rounded-sm bg-red-900 text-white shadow border">&#8722</a>
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
            <div class="w-full  bg-white px-4 py-3 border border-gray-300 rounded-sm shadow-sm">
                <div class="">
                    <div class="flex">
                        <span>Subtotal:</span>
                        <span class="ml-auto">Rp. {{ number_format($datas->sum('total_222339')) }}</span>
                    </div>
                    <div class="flex">
                        <span>Biaya Pengiriman:</span>
                        <span class="ml-auto">Rp. {{$datas->sum('total_222339') == 0 ? "0" : "5,000"}}</span>
                    </div>
                    <div class="flex">
                        <span>Total:</span>
                        <span class="ml-auto">Rp. {{ $datas->sum('total_222339') == 0 ? "0" :  number_format($datas->sum('total_222339') + 5000) }}</span>
                    </div>

                </div>
                <div class="py-3">
                    <div class="flex flex-col  gap-2">
                    <div>
                        <h1>Nama</h1>
                        <input type="text" name="nama" class="mt-1 border rounded border-black p-2 w-full" value="{{ Auth::user()['nama_222339'] }}" readonly>
                    </div>
                        <div class="grow">
                            <h1>Alamat</h1>
                            <input type="text" name="alamat" value="{{ Auth::user()['alamat_222339'] }}"
                                class="mt-1 border rounded border-black p-2 w-full" readonly>
                        </div>
                        <div class="">
                            <h1>No Hp</h1>
                            <input type="text" name="hp" value="{{ Auth::user()['hp_222339'] }}"
                                class="mt-1 border rounded border-black p-2 w-full" readonly>
                        </div>

                        <button onclick="pay()"
                        class="mt-5 px-3 py-1 bg-red-900 text-white text-sm font-light">Checkout</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4 w-full  bg-white px-4 py-3 border border-gray-300 rounded-sm shadow-sm mt-5">
            <div>
                <h1 class="text-2xl md:text-4xl mb-4">Rekomendasi</h1>
                <hr>
            </div>

            <div class="py-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 h-auto gap-5">
                @foreach ($menus as $data)
                    <a href="/detail/{{ $data['id_menu_222339'] }}" class="p-2">
                        <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                            style="background-image: url('{{ URL::asset($data['foto_222339']) }}');">
                            <div class="py-5 px-6 h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                                <div class="flex justify-between">
                                    <span class="text-sm">{{ $data['stok_222339'] }} tersisa</span>
                                    <span
                                        class="text-sm px-4 py-1 bg-red-900 text-white rounded-sm">{{ $data->kategori['kategori_222339'] }}</span>
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
