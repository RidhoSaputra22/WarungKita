<x-app>
    <x-navbar></x-navbar>


    <section class="h-auto p-5 md:p-14 w-screen">

        @if (session('error'))
            <div class="h-14 bg-red-500 p-3">
                <p class="text-2xl">{{ session('error') }}</p>
            </div>
        @endif

        <div>
            <h1 class="text-2xl md:text-4xl mb-4">Keranjang</h1>
            <hr>
        </div>

        @forelse ($datas as $data)
            <div class="py-3 w-full">
                <div class="p-2 w-full flex  gap-3">
                    <div class=" h-20 rounded-sm aspect-square md:w-32 md:h-32 bg-contain bg-no-repeat"
                        style="background-image: url('{{ URL::asset($data->menu['222339_foto']) }}')"></div>
                    <div class="w-full">
                        <div class="w-full flex">
                            <div class="flex-1">
                                <div class="text-sm md:text-lg font-semibold uppercase">{{ $data->menu['222339_nama'] }}</div>
                                <div class="text-sm md:text-lg text-gray-600">STOK: {{ $data->menu['222339_stok'] }}</div>
                            </div>
                            <div>
                                <a href="/DestroyFormCart/{{ $data['222339_id_carts'] }}" class="px-3 py-1 leading-none text-sm md:text-lg rounded-sm bg-white shadow border">x</a>
                            </div>
                        </div>
                        <div class="w-full my-2 flex gap-3">
                            <div class="grow text-sm md:text-lg  font-normal">Rp. {{ number_format($data['222339_total']) }}</div>
                            <div class="flex">
                                <a href="/AddToCart/{{$data->menu['222339_id_menu']}}" class="px-3 py-1 leading-none text-sm rounded-sm bg-white shadow border">+</a>
                                <span class="px-3">{{$data['222339_jumlah']}}</span>
                                <a href="/DelFormCart/{{$data['222339_id_carts']}}" class="px-3 py-1 leading-none text-sm rounded-sm bg-white shadow border">-</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h1>Tak Ada Data</h1>
            <a href="/menu" class="underline">Silahkan Berbelanja</a>
        @endforelse

        <div class="">
            <div class="flex">
                <span>Total:</span>
                <span class="ml-auto">Rp. {{ number_format($datas->sum('222339_total')) }}</span>
            </div>
            <div class="flex">
                <span>Biaya Pengiriman:</span>
                <span class="ml-auto">Rp. 0</span>
            </div>
            <button onclick="pay()" class="mt-5 px-3 py-1 bg-red-900 text-white text-sm font-light">Checkout</button>
        </div>

        <section class="py-4">
            <div>
                <h1 class="text-2xl md:text-4xl mb-4">Rekomendasi</h1>
                <hr>
            </div>

            <div class="py-5 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 h-auto gap-5">
                @foreach ($menus as $data)
                <a href="/detail/{{ $data['222339_id_menu'] }}" class="p-2">
                    <div class="  shadow-lg w-full h-[300px] bg-bottom bg-cover bg-no-repeat  rounded flex flex-col justify-end rounded-xl"
                        style="background-image: url('{{ URL::asset($data['222339_foto']) }}');">
                        <div class="py-5 px-6 h-40 rounded-t-xl rounded-b bg-white p-3 flex flex-col">
                            <div class="flex justify-between">
                                <span class="text-sm">{{ $data['222339_stok'] }} tersisa</span>
                                <span class="text-sm px-4 py-1 bg-red-900 text-white rounded-sm">{{ $data->kategori['222339_kategori'] }}</span>
                            </div>
                            <span class="text-2xl font-semibold">{{ $data['222339_nama'] }}</span>
                            <span
                                class="text-sm font-light">{{ Str::limit($data['222339_deskripsi'], 70) }}</span>
                            <span class="text-lg">Rp. {{ number_format($data['222339_harga']) }}</span>
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
