<x-app>
    <section class="p-10">
        <div class="py-3">
            <h1 class="text-3xl ">Laporan Menu</h1>
            <h1 class="text-sm pb-3">Tanggal: {{now()->toString()}}</h1>
        </div>

        <form class="py-2 flex gap-3 items-center"  >
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

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Menu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Harga
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Stok
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                kategori
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Created_at
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)

                    <tr class=" border text-black">
                        <th scope="row" class="px-6 py-4  ">
                            {{ $data['nama_222339'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data['harga_222339'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data['stok_222339'] }}
                        </td>
                        <td class="px-6 py-4">
                            <p class="px-3 py-1 ">
                                {{ $data->kategori['kategori_222339'] }}
                            </p>
                        </td>
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
