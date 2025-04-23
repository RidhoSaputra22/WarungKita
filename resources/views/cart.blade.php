<x-app>
    <x-navbar></x-navbar>


    <section class="h-auto p-14">

        @if (session('error'))
            <div class="h-14 bg-red-500 p-3">
                <p class="text-2xl">{{ session('error') }}</p>
            </div>
        @endif

        <div>
            <h1 class="text-4xl mb-4">Keranjang</h1>
            <hr>
        </div>

        @forelse ( $datas as $data )
        <div class="p-3">
            <div class="p-2 flex gap-3">
                <div class="w-32 h-32 bg-contain bg-no-repeat" style="background-image: url('{{URL::asset( $data->menu['222339_foto']) }}')"></div>
                <div class="grow">
                    <div class="text-xl">{{ $data->menu['222339_nama'] }}</div>
                    <div class="text-lg">Rp. {{ number_format($data->menu['222339_harga']) }}</div>
                    <div class="text-lg">Qty. {{ number_format($data->menu['222339_stok']) }}</div>
                    <div class="text-lg py-3">
                        <form action="/AddToCart/{{$data->menu['222339_id_menu']}}" method="GET" >
                            Jumlah: <input type="number" name="jumlah" value="{{ $data['jumlah_222339'] }}" min="1" max="{{$data->menu['222339_stok'] - 1}}" class=" px-2">
                            <button class="px-3 bg-orange-300">Submit</button>
                        </form>
                    </div>
                    <div class="text-xl font-semibold">Total: Rp. {{ number_format($data['total_222339']) }}</div>


                    <div class="my-2 flex gap-3">
                        <a href="/AddToCart/{{$data->menu['222339_id_menu']}}" class="px-3 bg-green-300">+</a>
                        <a href="/DelFormCart/{{$data['id_carts_222339']}}" class="px-3 bg-red-300">-</a>
                    </div>
                </div>
                <div>
                    <a href="/DestroyFormCart/{{$data['id_carts_222339']}}" class="px-3 bg-red-300">X</a>
                </div>
            </div>
            <hr>

        </div>
        @empty
            <h1>Tak Ada Data</h1>
            <a href="/menu" class="underline">Silahkan Berbelanja</a>
        @endforelse
        <div class="text-end font-semibold">
            <div class="text-2xl mb-2">
                Total: Rp. {{number_format($datas->sum('total_222339'))}}
            </div>
            <button onclick="pay()" class="px-3 py-1 bg-green-500 font-light">Checkout</button>
        </div>

        <section class="py-4">
            <div>
                <h1 class="text-4xl mb-4">Rekomendasi</h1>
                <hr>
            </div>

            <div class="grid grid-cols-5 h-auto">
                @foreach ($menus as $data)
                    <x-card id="{{$data['222339_id_menu']}}" nama="{{$data['222339_nama']}}" harga="{{$data['222339_harga']}}" image="{{$data['222339_foto']}}"></x-card>

                @endforeach
            </div>
        </section>

    </section>


    <x-footter></x-footter>

    @if ($datas->isNotEmpty())
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-v8ivrdimz1oDhdI7"></script>
        <script type="text/javascript">
          function pay(){
            console.log('s');

            // SnapToken acquired from previous step
            snap.pay('{{$snapToken}}', {
              // Optional
                onSuccess: function(result){
                    console.log(result['order_id']);
                    window.location.href = '/checkout/'+result['order_id'];
                },
                // Optional
                onPending: function(result){
                    console.log('s');
                },
                // Optional
                onError: function(result){
                    console.log('s');
                }
            });
          };
    </script>
    @endif


</x-app>
