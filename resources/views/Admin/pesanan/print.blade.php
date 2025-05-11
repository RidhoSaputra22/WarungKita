<x-app>
    <section class="p-10">
        <div>
            <a href="/admin/pesanan/">Kembali</a>
        </div>
        <div class="py-3">
            <h1 class="text-3xl ">Laporan Pesanan RestoKu</h1>
            <h1 class="text-sm pb-3">Tanggal: {{now()->toString()}}</h1>
        </div>

        <form class="py-2 flex gap-3 items-center print:hidden">
            <div>
                <h1>Pilihan</h1>
                <select name="pilihan" id="" class="p-2 border">
                    <option value="1" {{ $request->pilihan == "1" ? 'selected' : '' }}>Harian</option>
                    <option value="2" {{ $request->pilihan == "2" ? 'selected' : '' }}>Mingguan</option>
                    <option value="3" {{ $request->pilihan == "3" ? 'selected' : '' }}>Bulanan</option>
                </select>
            </div>
            <div>
                <h1>Hari</h1>
                <input type="number" name="hari" id="" min="0" value="{{$request->hari ?? 0}}" class="p-2 border">
            </div>


            <div>
                <h1>Bulan</h1>
                <select name="bulan" id="" class="p-2 border">
                    <option value="1" {{ $request->bulan == "1" ? 'selected' : '' }}>January</option>
                    <option value="2" {{ $request->bulan == "2" ? 'selected' : '' }}>February</option>
                    <option value="3" {{ $request->bulan == "3" ? 'selected' : '' }}>Maret</option>
                    <option value="4" {{ $request->bulan == "4" ? 'selected' : '' }}>April</option>
                    <option value="5" {{ $request->bulan == "5" ? 'selected' : '' }}>Mei</option>
                    <option value="6" {{ $request->bulan == "6" ? 'selected' : '' }}>Juni</option>
                    <option value="7" {{ $request->bulan == "7" ? 'selected' : '' }}>Juli</option>
                    <option value="8" {{ $request->bulan == "8" ? 'selected' : '' }}>Agustus</option>
                    <option value="9" {{ $request->bulan == "9" ? 'selected' : '' }}>September</option>
                    <option value="10" {{ $request->bulan == "10" ? 'selected' : '' }}>Oktober</option>
                    <option value="11" {{ $request->bulan == "11" ? 'selected' : '' }}>November</option>
                    <option value="12" {{ $request->bulan == "12" ? 'selected' : '' }}>Desember</option>
                </select>
            </div>
            <div>
                <h1>Tahun</h1>
                <select name="tahun" id="" class="p-2 border">
                    <option value="2020" {{ $request->tahun == "2020" ? 'selected' : '' }}>2020</option>
                    <option value="2021" {{ $request->tahun == "2021" ? 'selected' : '' }}>2021</option>
                    <option value="2022" {{ $request->tahun == "2022" ? 'selected' : '' }}>2022</option>
                    <option value="2023" {{ $request->tahun == "2023" ? 'selected' : '' }}>2023</option>
                    <option value="2024" {{ $request->tahun == "2024" ? 'selected' : '' }}>2024</option>
                </select>
            </div>

            <div id="aksi">
                <div>Aksi</div>
                <button class="p-2 border">Submit</button>
                <button type="button" onclick="print()" class="p-2 border">Print</button>
            </div>
        </form>

        <div class=" ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">
                            Kode Pesanan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kurir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Konfirmasi Kurir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Konfirmasi Pelanggan
                        </th>


                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Tanggal

                            </div>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr class="text-center border text-black">
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['kode_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->cart[0]->pelanggan['nama_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->driver['nama_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['konfirmasi_driver_222339'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['konfirmasi_pelanggan_222339'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data['created_at'] }}

                        </td>
                    </tr>
                    @endforeach




                </tbody>
            </table>
        </div>

    </section>

    <script>
    </script>
</x-app>
