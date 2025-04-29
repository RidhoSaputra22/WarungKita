<x-app>
    <x-navbar></x-navbar>
    <section class="h-screen ">
        <div class="p-32 h-full ">
            <div class="border-b-4 border-blue-900 text-black flex print:hidden">
                <a href="/dokter/pending/" class="px-6 py-2 hover:text-white hover:bg-blue-900 w-max">Jadwal Treatment </a>
                <a href="/dokter/selesai/" class="px-6 py-2 bg-blue-900 text-white w-max">Jadwal Treatment  Selesai</a>

            </div>
            <div class="py-3 flex h-full ">
                <div class="flex-1 flex flex-col gap-3 pr-3 h-full overflow-scroll print:hidden">
                    @forelse ($datas as $index => $data )

                    <a href="?jadwal={{$index}}"
                        class="flex p-5 border border-blue-900 hover:bg-blue-900 hover:text-white {{ ($request->jadwal  == $index) ? 'bg-blue-900 text-white':''}}">
                        <div class="grow">
                            <div class="text-2xl uppercase">{{$data->pasien['nama']}}</div>
                            <div class=" font-light">{{$data['tanggal']}}</div>
                        </div>
                    </a>

                    @empty

                    @endforelse

                </div>
                <div class="w-96 px-5 h-full print:block print:p-0 print:w-full print:border">
                    <div class="h-40 bg-center bg-cover print:h-0"
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
                            <div class="flex h-full flex-col-reverse pt-5 ">
                                <button onclick="print()" class="px-4 py-2 bg-blue-900 text-white w-full print:hidden">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

</x-app>