<x-app>
    <x-navbar></x-navbar>
    <section class="lg:h-screen">
        <div class="p-5 lg:px-32 lg:py-10 h-full">
            @if (session('sukses'))
                <div class="bg-green-300 p-3 my-1 w-full">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="grid grid-cols-2 lg:grid-cols-none lg:flex border-b-4 border-red-900 text-black ">
                <a href="/driver/pending/"
                    class="w-full flex justify-center items-center px-6 py-2 text-sm bg-red-900 text-white lg:w-max">Orderan
                    Baru</a>
                <a href="/driver/selesai/"
                    class="w-full flex justify-center items-center px-6 py-2 text-sm  hover:text-white hover:bg-red-900 lg:w-max">Orderan
                    Selesai</a>

            </div>
            <div class="py-3 flex flex-col gap-3 lg:flex-row h-full ">
                <div class="lg:flex-1 flex flex-col gap-3 lg:pr-3 h-full overflow-scroll">
                    @forelse ($datas as $index => $data)
                        {{-- {{dd($data->cart)}} --}}

                        <a href="?idx={{ $index }}"
                            class="flex p-5 w-full border border-red-900 hover:bg-red-900 hover:text-white {{ $request->idx == $index ? 'bg-red-900 text-white' : '' }}">
                            <div class="grow">
                                <div class="text-2xl uppercase">{{ $data->pelanggan['nama_222339'] }}</div>
                                <div class=" font-light">{{ $data['created_at'] }}</div>
                            </div>
                        </a>

                    @empty
                        <div>
                            Tak ada data
                        </div>
                    @endforelse


                </div>
                @if ($datas->count() > 0)
                    <div class="w-full lg:w-96 lg:px-5 h-full">
                        <div class="h-40 bg-center bg-cover"
                            style="background-image: url('{{ URL::asset($datas[$request->idx ?? 0]->cart->first()->menu['foto_222339'] ?? null) }}');">

                        </div>
                        <div class="pt-3 px-3 ">
                            <div class="flex flex-col gap-3 w-full text-lg ">
                                <div class="text-lg">
                                    <div>Nama</div>
                                    <div class="text-sm">
                                        {{ $datas[$request->idx ?? 0]->pelanggan['nama_222339'] ?? null }}
                                    </div>
                                </div>
                                <div class="text-lg">
                                    <div>No Hp</div>
                                    <div class="text-sm">
                                        {{ $datas[$request->idx ?? 0]->pelanggan['hp_222339'] ?? null }}
                                    </div>
                                </div>

                                <div class="text-lg">
                                    <div>Alamat</div>
                                    <div class="text-sm">
                                        {{ $datas[$request->idx ?? 0]->pelanggan['alamat_222339'] ?? null }}
                                    </div>
                                </div>

                                <div class="text-lg">
                                    <div>Tanggal</div>
                                    <div class="text-sm">{{ $datas[$request->idx ?? 0]['created_at'] ?? null }}</div>
                                </div>

                                <div class="text-lg">
                                    <div>Makanan</div>
                                    @forelse ($datas[$request->idx ?? 0]->cart as $cart)
                                        <div class="text-sm w-full flex ">
                                            <span class="flex-1">{{ $cart['jumlah_222339'] }} Porsi </span>
                                            <span class="">{{ $cart->menu['nama_222339'] ?? null }}</span>
                                        </div>

                                    @empty
                                    @endforelse
                                </div>
                                <div class="text-lg">
                                    <div>Status</div>
                                    <div class="text-sm">
                                        {{ $datas[$request->idx ?? 0]['konfirmasi_driver_222339'] ?? null }}</div>
                                </div>
                                @if ($datas->isNotEmpty())
                                    <form
                                        action="/driver/konfirmasi/{{ $datas[$request->idx ?? 0]['id_pesanan_222339'] }}"
                                        method="POST" class="flex h-full flex-col-reverse pt-5 ">
                                        @csrf
                                        <button class="px-4 py-2 bg-red-900 text-white w-full ">Konfirmasi
                                            Selesai</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                @endif
            </div>
    </section>

</x-app>
