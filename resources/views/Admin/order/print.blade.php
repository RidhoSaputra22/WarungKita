<x-app>
    <section class="p-10">
        <div>
            <a href="/admin/order/">Kembali</a>
        </div>
        <div class="py-3">
            <h1 class="text-3xl ">Laporan Order RestoKu</h1>
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
                            Tanggal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pelanggan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Menu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr class="text-center border text-black">
                        <td class="px-6 py-4">
                            {{ $data['222339_tanggal'] }}
                        </td>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->pelanggan['222339_nama'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->menu['222339_nama'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data->menu['222339_harga'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['222339_status'] }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            {{ number_format($data['222339_jumlah']) }}
                        </th>
                        <th scope="row" class="px-6 py-4  ">
                            Rp. {{ number_format($data['222339_total']) }}
                        </th>
                    </tr>
                    @endforeach


                    <tr class="text-center p-3 bg-slate-500 text-white">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">Total Keseluruhan:</td>
                        <td>{{ $datas->sum('222339_jumlah') }}</td>
                        <td>Rp.{{ number_format($datas->sum('222339_total')) }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>

    <script>
    </script>
</x-app>
