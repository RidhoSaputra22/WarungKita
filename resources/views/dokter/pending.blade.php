<x-app>
    <x-navbar></x-navbar>
    <section class="h-screen">
        <div class="p-32 h-full">
            @if (session('sukses'))
                <div class="bg-green-300 p-3 my-1 w-full">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="border-b-4 border-blue-900 text-black flex">
                <a href="/dokter/pending/" class="px-6 py-2 bg-blue-900 text-white w-max">Jadwal Treatment</a>
                <a href="/dokter/selesai/" class="px-6 py-2 hover:text-white hover:bg-blue-900 w-max">Jadwal Treatment Selesai </a>

            </div>
            <div class="py-3 flex h-full ">
                <div class="flex-1 flex flex-col gap-3 pr-3 h-full overflow-scroll">
                    @forelse ($datas as $index => $data )

                    <a href="?jadwal={{$index}}"
                        class="flex p-5 border border-blue-900 hover:bg-blue-900 hover:text-white {{ ($request->jadwal  == $index) ? 'bg-blue-900 text-white':''}}">
                        <div class="grow">
                            <div class="text-2xl uppercase">{{$data->pasien['nama']}}</div>
                            <div class=" font-light">{{$data['tanggal']}}</div>
                        </div>
                    </a>

                    @empty
                        <div>
                            Tak ada data
                        </div>
                    @endforelse


                </div>
                <div class="w-96 px-5 h-full">
                    <div class="h-40 bg-center bg-cover"
                        style="background-image: url('{{ URL::asset($datas[$request->jadwal ?? 0]->treatment['foto'] ?? null) }}');">

                    </div>
                    <div class="pt-3 px-3 ">
                        <div class="flex flex-col gap-3 w-full text-lg ">
                            <div class="text-2xl">{{$datas[$request->jadwal ?? 0]->pasien['nama'] ?? null}}</div>
                            <div class="text-lg">
                                <div>No Hp</div>
                                <div class="text-sm">{{$datas[$request->jadwal ?? 0]->pasien['hp'] ?? null}}</div>
                            </div>
                          
                            <div class="text-lg">
                                <div>Alamat</div>
                                <div class="text-sm">{{$datas[$request->jadwal ?? 0]->pasien['alamat'] ?? null}}</div>
                            </div>
                          
                            <div class="text-lg">
                                <div>Tanggal</div>
                                <div class="text-sm">{{$datas[$request->jadwal ?? 0]['tanggal'] ?? null}}</div>
                            </div>
                          
                            <div class="text-lg">
                                <div>Jenis Treatment</div>
                                <div class="text-sm">{{$datas[$request->jadwal ?? 0]->treatment['nama'] ?? null}}</div>
                            </div>
                            <div class="text-lg">
                                <div>Status</div>
                                <div class="text-sm">{{$datas[$request->jadwal ?? 0]['status'] ?? null}}</div>
                            </div>
                            @if ($datas->isNotEmpty())
                            
                            <form action="/dokter/konfirmasi/{{$data['id_jadwal']}}" method="POST" class="flex h-full flex-col-reverse pt-5 ">
                                @csrf
                                <button class="px-4 py-2 bg-blue-900 text-white w-full ">Konfirmasi Selesai</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </section>

</x-app>